<!-- resources/views/categories/create.blade.php -->
@extends('layouts.app')

@section('title', 'Add Category')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="d-flex align-items-center" style="margin: 0 auto; font-family: 'Poppins', sans-serif;">
        <h1>Add Category</h1>
    </div>
</div>


<form action="{{ route('categories.store') }}" method="POST" class="bg-dark-primary p-4 rounded"  style="width: 70%; border-radius: 10px; overflow: hidden; margin: 0 auto; font-family: 'Poppins', sans-serif;">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>

    
    {{-- <div class="d-flex justify-content-end mt-4" style="width: 70%; margin: 0 auto;">
        <a href="{{ route('categories.create') }}" class="btn" style="background-color: burlywood;color:black; font-family: 'Poppins', sans-serif;">Add Category</a>
    </div> --}}
    
    <button type="submit" class="btn btn-primary mb-4" style="background-color: burlywood;color:black; font-family: 'Poppins', sans-serif;">Add Category</button>
</form>

@endsection