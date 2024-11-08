@extends('layouts.app')

@section('title', 'Category List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Category List</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
</div>

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <a href="{{ route('products.index', ['category' => $category->id]) }}" class="text-light">
                        {{ $category->name }}
                    </a>
                </td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
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
