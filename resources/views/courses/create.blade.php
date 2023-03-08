@extends('layouts.app')

@section('content')
    <h1>Create New Course</h1>
    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" name="course_id" id="course_id" class="form-control @error('course_id') is-invalid @enderror" value="{{ old('course_id') }}" required>
            @error('course_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="credit">Credit</label>
            <input type="number" name="credit" id="credit" class="form-control @error('credit') is-invalid @enderror" value="{{ old('credit') }}" required>
            @error('credit')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Create Course</button>
    </form>
@endsection
