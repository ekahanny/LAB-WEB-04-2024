<!-- resources/views/inventory_logs/create.blade.php -->
@extends('layouts.app')

@section('title', 'Add Inventory Log')

@section('content')
<h1>Add Inventory Log</h1>

<form action="{{ route('inventory-logs.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="product_id" class="form-label">Product</label>
        <select name="product_id" class="form-select" required>
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <select name="type" class="form-select" required>
            <option value="restock">Restock</option>
            <option value="sold">Sold</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" name="quantity" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Log</button>
</form>
@endsection
