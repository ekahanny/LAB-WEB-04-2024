<?php


namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\InventoryLog;
use Illuminate\Http\Request;


class InventoryLogController extends Controller
{
    public function index()
    {
        $inventoryLogs = InventoryLog::with('product')->get();
        return view('inventory_logs.index', compact('inventoryLogs'));
    }

    
    public function create()
    {
        $products = Product::all();
        return view('inventory_logs.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|string|in:restock,sold',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::find($request->product_id);

        if ($request->type === 'sold' && $product->stock < $request->quantity) {
            return redirect()->back()->withErrors(['quantity' => 'Produk tidak cukup untuk penjualan ini.']);
        }


        // Simpan log inventory
        InventoryLog::create($request->all());

        if ($request->type === 'restock') {
            $product->stock += $request->quantity;
        } elseif ($request->type === 'sold') {
            $product->stock -= $request->quantity;
        }

        $product->save();

        return redirect()->route('inventory-logs.index')->with('success', 'Log inventaris berhasil dibuat.');
    }

    public function destroy(InventoryLog $inventoryLog)
    {
        $product = $inventoryLog->product;

        $product->save();

        $inventoryLog->delete();

        return redirect()->route('inventory-logs.index')->with('success','Log inventaris berhasil dihapus.');
    }
}