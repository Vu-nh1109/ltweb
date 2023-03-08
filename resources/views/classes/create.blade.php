@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Create Class</h1>
            <hr>
            <form method="POST" action="{{ route('classes.store') }}">
                @csrf
                <div class="form-group">
                    <label for="class_id">Class ID</label>
                    <input type="text" class="form-control @error('class_id') is-invalid @enderror" id="class_id" name="class_id" value="{{ old('class_id') }}" required autofocus>
                    @error('class_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="course_id">Course ID</label>
                    <input type="text" class="form-control @error('course_id') is-invalid @enderror" id="course_id" name="course_id" value="{{ old('course_id') }}" required autofocus>
                    @error('course_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="attached_class_id">Attached Class ID</label>
                    <input type="text" class="form-control @error('attached_class_id') is-invalid @enderror" id="attached_class_id" name="attached_class_id" value="{{ old('attached_class_id') }}">
                    @error('attached_class_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="max_students">Max Students</label>
                    <input type="number" class="form-control @error('max_students') is-invalid @enderror" id="max_students" name="max_students" value="{{ old('max_students') }}" min="1" max="50" required>
                    @error('max_students')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <hr>
                <h3>Class Schedules</h3>
                <div id="class-schedules">
                    <div class="form-row mb-3">
                        <div class="col-md-3">
                            <label for="day_of_week">Day of Week</label>
                            <select class="form-control @error('class_schedule.day_of_week') is-invalid @enderror" id="day_of_week" name="class_schedule[day_of_week]" required>
                                <option value="">Select a day</option>
                                <option value="Monday" {{ old('class_schedule.day_of_week') == 'Monday' ? 'selected' : '' }}>Monday</option>
                                <option value="Tuesday" {{ old('class_schedule.day_of_week') == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                                <option value="Wednesday" {{ old('class_schedule.day_of_week') == 'Wednesday' ? 'selected' : '' }}> Wednesday</option>
                                <option value="Thursday" {{ old('class_schedule.day_of_week') == 'Thursday' ? 'selected' : '' }}> Thursday</option>
                                <option value="Friday" {{ old('class_schedule.day_of_week') == 'Friday' ? 'selected' : '' }}> Friday</option>
                                <option value="Saturday" {{ old('class_schedule.day_of_week') == 'Saturday' ? 'selected' : '' }}> Saturday</option>
                                <option value="Sunday" {{ old('class_schedule.day_of_week') == 'Sunday' ? 'selected' : '' }}> Sunday</option>
                            </select>
                            @error('class_schedule.day_of_week')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="start_time">Start Time</label>
                            <input type="time" class="form-control @error('class_schedule.start_time') is-invalid @enderror" id="start_at" name="class_schedule[start_at]" value="{{ old('class_schedule.start_at') }}" required>
                            @error('class_schedule.start_at')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="end_time">End Time</label>
                            <input type="time" class="form-control @error('class_schedule.end_time') is-invalid @enderror" id="end_time" name="class_schedule[end_at]" value="{{ old('class_schedule.end_at') }}" required>
                            @error('class_schedule.end_at')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="room">Location</label>
                            <input type="text" class="form-control @error('class_schedule.room') is-invalid @enderror" id="room" name="class_schedule[location]" value="{{ old('class_schedule.location') }}" required>
                            @error('class_schedule.location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{ route('classes.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

@endsection