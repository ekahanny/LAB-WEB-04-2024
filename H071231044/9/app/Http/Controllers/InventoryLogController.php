<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\InventoryLog;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class InventoryLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = InventoryLog::query();

    if ($request->has('type')) {
        $query->where('type', $request->type);
    }

    $product = Product::all();

    $log = $query->with('product')->paginate(10);

    return view('log', compact('log', 'product'));
}
    
    public function destroy(InventoryLog $inventorylog)
    {
        try {
            $inventorylog->delete();
    
            return redirect()->route('inventorylog.index')->with('success', 'Log inventory berhasil dihapus.');
    
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat menghapus log: ' . $e->getMessage());
        }
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'product_id' => 'required|exists:product,id',
        'type' => 'required|in:Restock,Sold',
        'quantity' => 'required|integer|min:1' // Pastikan quantity minimal 1
    ], [
        'quantity.required' => 'Quantitas dari produk harus diisi.',
        'quantity.min' => 'Quantitas dari barang tidak boleh kurang dari 1, silakan input ulang quantitasnya.',
    ]);

    // Menggunakan transaction untuk memastikan atomicity
    DB::beginTransaction();

    try {
        // Ambil produk yang akan diperbarui
        $product = Product::findOrFail($request->product_id);

        // Hitung stok baru berdasarkan tipe
        if ($request->type == 'Restock') {
            $product->stock += $request->quantity; // Tambahkan stok
        } elseif ($request->type == 'Sold') {
            // Cek apakah stok cukup untuk penjualan
            if ($product->stock < $request->quantity) {
                // Kembalikan error jika stok tidak mencukupi
                return redirect()->back()->with('error', 'Stok produk gagal dikurangi, karena stok memang cuma ada 0');
            } else {
                $product->stock -= $request->quantity; // Kurangi stok jika cukup
            }
        }

        // Simpan perubahan ke database
        $product->save();

        // Commit transaksi
        DB::commit();

        return redirect()->back()->with('success', 'Stok produk berhasil diperbarui!');
    } catch (\Exception $e) {
        // Rollback transaksi jika ada kesalahan
        DB::rollBack();
        return back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui stok.'])->withInput();
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
}
