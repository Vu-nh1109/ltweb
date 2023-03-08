@extends('layouts.app')

@section('content')
    <h1>All Courses</h1>
    <a href="{{ route('courses.create') }}" class="btn btn-success mb-2">Create New Course</a>
    @if(count($courses) > 0)
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Course ID</th>
                    <th>Name</th>
                    <th>Credit</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td>{{ $course->course_id }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->credit }}</td>
                        <td>
                            <a href="{{ route('courses.edit', $course->course_id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('courses.destroy', $course->course_id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No courses found</p>
    @endif
@endsection
