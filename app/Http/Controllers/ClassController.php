<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\ClassModel;
use App\Models\ClassSchedule;

class ClassController extends Controller
{
    public function index()
    {
        $classes = ClassModel::with('classSchedules')->get();
        $courses = Course::all();
        return view('classes.index', compact('classes','courses'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'class_id' => 'required|unique:class_models',
            'course_id' => 'required|exists:courses,course_id',
            'attached_class_id' => 'nullable|exists:class_models,class_id',
            'max_students' => 'required|numeric|min:1|max:50',
            'class_schedule.day_of_week' => 'required',
            'class_schedule.start_at' => 'required',
            'class_schedule.end_at' => 'required|after:class_schedule.start_at',
            'class_schedule.location' => 'required|max:255',
        ]);
        // dd($validatedData);
        $class = new ClassModel();
        $class->class_id = $validatedData['class_id'];
        $class->course_id = $validatedData['course_id'];
        $class->attached_class_id = $validatedData['attached_class_id'];
        $class->max_students = $validatedData['max_students'];
        $class->save();

        $classSchedule = new ClassSchedule();
        $classSchedule->class_id = $class->class_id;
        $classSchedule->day_of_week = $validatedData['class_schedule']['day_of_week'];
        $classSchedule->start_at = $validatedData['class_schedule']['start_at'];
        $classSchedule->end_at = $validatedData['class_schedule']['end_at'];
        $classSchedule->location = $validatedData['class_schedule']['location'];
        $classSchedule->save();

        return redirect()->route('classes.index')->with('success', 'Class created successfully.');
    }

    public function edit($id)
    {
        $class = ClassModel::where('class_id',$id)->firstOrFail();
        return view('classes.edit', compact('class'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'class_id' => 'required',
            'course_id' => 'required|exists:courses,course_id',
            'attached_class_id' => 'nullable|exists:class_models,class_id',
            'max_students' => 'required|numeric|min:1|max:50',
            'class_schedule.day_of_week' => 'required',
            'class_schedule.start_at' => 'required',
            'class_schedule.end_at' => 'required|after:class_schedule.start_at',
            'class_schedule.location' => 'required|max:255',
        ]);

        ClassModel::where('class_id',$id)->delete();

        $class = new ClassModel();
        $class->class_id = $validatedData['class_id'];
        $class->course_id = $validatedData['course_id'];
        $class->attached_class_id = $validatedData['attached_class_id'];
        $class->max_students = $validatedData['max_students'];
        $class->save();

        ClassSchedule::where('class_id', $id)->delete();

        $classSchedule = new ClassSchedule();
        $classSchedule->class_id = $class->class_id;
        $classSchedule->day_of_week = $validatedData['day_of_week'];
        $classSchedule->start_at = $validatedData['start_at'];
        $classSchedule->end_at = $validatedData['end_at'];
        $classSchedule->location = $validatedData['location'];
        $classSchedule->save();

        return redirect()->route('classes.index')->with('success', 'Class updated successfully.');
    }

    public function destroy($id)
    {
        $class = ClassModel::where('class_id',$id)->firstOrFail();
        $class->classSchedules()->delete();
        $class->delete();

        return redirect()->route('classes.index')->with('success', 'Class deleted successfully.');
    }
}
