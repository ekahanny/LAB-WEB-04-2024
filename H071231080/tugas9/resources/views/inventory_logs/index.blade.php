<!-- resources/views/inventory_logs/index.blade.php -->
@extends('layouts.app')

@section('title', 'Inventory Log List')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="d-flex align-items-center" style="margin: 0 auto; font-family: 'Poppins', sans-serif; margin-top:100px;">
        <h1>Baking Logs</h1>
    </div>
</div>


<table class="table table-light table-striped" style="width: 70%; border-radius: 10px; overflow: hidden; margin: 0 auto; font-family: 'Poppins', sans-serif;">
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


<div class="d-flex justify-content-end mt-4" style="width: 70%; margin: 0 auto;">
<a href="{{ route('inventory-logs.create') }}" class="btn btn-primary" style="background-color: burlywood; color:black; font-family: 'Poppins', sans-serif;">Add Inventory Log</a>
</div>

@endsection