@extends('layouts.app')

@section('title', 'Category List')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">


<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="d-flex align-items-center" style="margin: 0 auto; font-family: 'Poppins', sans-serif; margin-top:100px;">
        <h1>Flavors & Types</h1>
    </div>
</div>

<table class="table table-light table-striped" style="width: 70%; border-radius: 10px; overflow: hidden; margin: 0 auto;color:black; font-family: 'Poppins', sans-serif;">
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
                    <a href="{{ route('products.index', ['category' => $category->id]) }}" class="text-dark">
                        {{ $category->name }}
                    </a>
                </td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm" style="width: 60px;">Edit</a>
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

<div class="d-flex justify-content-end mt-4 mb-4" style="width: 70%; margin: 0 auto;">
    <a href="{{ route('categories.create') }}" class="btn" style="background-color: burlywood;color:black; font-family: 'Poppins', sans-serif;">Add Category</a>
</div>
@endsection