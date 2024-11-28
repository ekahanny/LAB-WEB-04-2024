<!-- resources/views/category.blade.php -->
@extends('layout.master')

@section('title', 'Category Management')
@section('header', 'Category Management')

@section('content')
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Error Message -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Tabel Kategori -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($category as $categor)
                <tr>
                    <td>{{ $categor->id }}</td>
                    <td>{{ $categor->name }}</td>
                    <td>{{ $categor->description }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editCategoryModal{{ $categor->id }}">Edit</button>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal{{ $categor->id }}">Delete</button>
                    </td>
                </tr>
                @include('modals.edit_category', ['category' => $categor])
                @include('modals.delete_category', ['category' => $categor])
            @endforeach
        </tbody>
    </table>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add Category</button>

    <div class="d-flex justify-content-center">
        {{ $category->links() }}
    </div>

    @include('modals.add_category')
@endsection
