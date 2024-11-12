<!-- resources/views/inventory_logs/create.blade.php -->
@extends('layouts.app')

@section('title', 'Add Inventory Log')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">


<div class="container" style="width: 50%; margin: 0 auto;font-family: 'Poppins', sans-serif;">
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
        <button type="submit" class="btn btn-primary" style="background-color: burlywood; color:black;">Add Log</button>
    </form>



</div>
@endsection