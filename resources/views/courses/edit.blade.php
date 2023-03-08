@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Course</h1>

        <form action="{{ route('courses.update', $course->course_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="course_id">Course ID</label>
                <input type="text" class="form-control" id="course_id" name="course_id" value="{{ old('course_id', $course->course_id) }}" required>
                @error('course_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $course->name) }}" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="credit">Credit</label>
                <input type="number" class="form-control" id="credit" name="credit" value="{{ old('credit', $course->credit) }}" min="1" max="10" required>
                @error('credit')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
