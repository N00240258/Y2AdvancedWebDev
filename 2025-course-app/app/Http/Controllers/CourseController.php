<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facade\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view("courses.index", compact("courses"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validates input
        $request->validate([
            'courseCode' => 'required|max:5',
            'title' => 'required',
            'description' => 'required',
            'points' => 'required|integer|max:2048',
            'years' => 'required|integer|max:8',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // checks if the image is uploaded then puts the current time on the name to make it unique from other images
        if ($request->hasFile('image')) {
            $imageName = time().".".$request->image->extension();
            $request->image->move(public_path("images/courses"), $imageName);
        }

        Course::create([
            'courseCode' => $request->courseCode,
            'title' => $request->title,
            'description' => $request->description,
            'points' => $request->points,
            'years' => $request->years,
            'image' => $imageName
        ]);

        return to_route("courses.index")->with('success', 'Course created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('courses.show')->with('course', $course);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses.edit')->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //validates input
        $request->validate([
            'courseCode' => 'required|max:5',
            'title' => 'required',
            'description' => 'required',
            'points' => 'required|integer|max:2048',
            'years' => 'required|integer|max:8',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // checks if the image is uploaded then puts the current time on the name to make it unique from other images
        if ($request->hasFile('image')) {
            $imageName = time().".".$request->image->extension();
            $request->image->move(public_path("images/courses"), $imageName);
            $course->image = $imageName;
        }

        $course->update([
            'courseCode' => $request->courseCode,
            'title' => $request->title,
            'description' => $request->description,
            'points' => $request->points,
            'years' => $request->years,
            'image' => $course->image
        ]);

        return to_route("courses.index")->with('success', 'Course updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return to_route("courses.index")->with('success', 'Course deleted.');
    }
}
