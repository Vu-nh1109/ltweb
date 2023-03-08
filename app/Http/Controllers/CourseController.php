<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'course_id' => 'required|unique:courses',
            'name' => 'required|max:255',
            'credit' => 'required|numeric|min:1|max:10',
        ]);

        $course = new Course();
        $course->course_id = $validatedData['course_id'];
        $course->name = $validatedData['name'];
        $course->credit = $validatedData['credit'];
        $course->save();

        return redirect('/courses')->with('success', 'Course has been created');
    }

    public function edit($id)
    {
        $course = Course::where('course_id',$id)->firstOrFail();
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'course_id' => 'required',
            'name' => 'required|max:255',
            'credit' => 'required|numeric|min:1|max:10',
        ]);

        $course = Course::where('course_id',$id)->delete();
        $course = new Course;
        $course->course_id = $validatedData['course_id'];
        $course->name = $validatedData['name'];
        $course->credit = $validatedData['credit'];
        $course->save();

        return redirect('/courses')->with('success', 'Course has been updated');
    }

    public function destroy($id)
    {
        $course = Course::where('course_id',$id);
        $course->delete();

        return redirect('/courses')->with('success', 'Course has been deleted');
    }
}
