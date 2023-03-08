@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Classes</h1>
            <a class="btn btn-success" href="{{ route('classes.create') }}">Create Class</a>
            <hr>
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Class ID</th>
                        <th class="text-center">Course Name</th>
                        <th class="text-center">Attached Class ID</th>
                        <th class="text-center">Max Students</th>
                        <th class="text-center">Schedules</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $class)
                    <tr>
                        <td class="text-center">{{ $class->class_id }}</td>
                        <td class="text-center">{{ $class->course->name }}</td>
                        <td class="text-center">{{ $class->attached_class_id }}</td>
                        <td class="text-center">{{ $class->max_students }}</td>
                        <td class="text-center">
                            <ul>
                                @foreach ($class->classSchedules as $schedule)
                                <li> {{ $schedule->day_of_week }} {{ $schedule->start_at }}-{{ $schedule->end_at }} {{ $schedule->location }} </li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-primary" href="{{ route('classes.edit', $class->class_id) }}">Edit</a>
                            <form style="display: inline-block" method="POST" action="{{ route('classes.destroy', $class->class_id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection