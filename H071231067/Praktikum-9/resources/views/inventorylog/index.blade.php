<!-- resources/views/inventory_logs/index.blade.php -->
@extends('layouts.app')

@section('title', 'Inventory Log List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Inventory Log List</h1>
    <a href="{{ route('inventory-logs.create') }}" class="btn btn-primary">Add Inventory Log</a>
</div>

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Product</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($inventoryLogs as $log)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $log->product->name }}</td>
                <td>{{ ucfirst($log->type) }}</td>
                <td>{{ $log->quantity }}</td>
                <td>{{ $log->created_at->format('Y-m-d') }}</td>
                <td>
                    <form action="{{ route('inventory-logs.destroy', $log) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
