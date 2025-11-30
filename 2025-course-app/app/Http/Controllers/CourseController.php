<?php
namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facade\Storage;



class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // gets the content from the search box and tells the database to get the titles that are similar to the phrase typed in or displays all the courses if nothing is there
        $search = $request->input("search");



        if($search){
            $courses = Course::where("title", "like", "%" . $search . "%")->get() ;
        }else {
            // checks if the root has any additional information attached to it and if it does it will then put all the courses in the course array in the order specified by what is sent with the route
            if($request->has('namesAsc')){
                $courses = Course::orderBy('title')->get();
            } elseif ($request->has('namesDesc')){
                $courses = Course::orderBy('title', 'desc')->get();
            } elseif ($request->has('pointsAsc')){
                $courses = Course::orderBy('points')->get();
            } elseif ($request->has('pointsDesc')){
                $courses = Course::orderBy('points', 'desc')->get();
            } else {
                $courses = Course::all();
            }
        }

        return view("courses.index", compact("courses"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // if the current users role is not admin it will send them back to the index page
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('courses.index')->with('error', 'Access denied.');
        }
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validates input
        $request->validate([
            // required makes sure that there is an input in the field.
            'courseCode' => 'required|max:5',
            'title' => 'required',
            'description' => 'required',
            'points' => 'required|integer|max:2048',
            'years' => 'required|integer|max:8',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // checks if an image is uploaded then gets the current time and extension of the image(jpg/png/etc.) and puts them together to make a unique name for the image
        if ($request->hasFile('image')) {
            $imageName = time().".".$request->image->extension();
            // gets the image and moves it to the specified public folder with the image name generated
            $request->image->move(public_path("images/courses"), $imageName);
        }

        // gets the information entered into the form and sends it off into the database to get added in
        Course::create([
            'courseCode' => $request->courseCode,
            'title' => $request->title,
            'description' => $request->description,
            'points' => $request->points,
            'years' => $request->years,
            'image' => $imageName
        ]);

        // returns to index with a pop up letting you know its created

        return to_route("courses.index")->with('success', 'Course created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course, Student $students)
    {
        // loads and gets all students connected to the currently shown course through the database to show all students in the course

        $course->load('students');
        $students = Student::all();
        return view('courses.show', compact('course'), compact('students'));

        // return view('courses.show')->with('course', $course);
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
        // mostly does the same thing as create
        $request->validate([
            'courseCode' => 'required|max:5',
            'title' => 'required',
            'description' => 'required',
            'points' => 'required|integer|max:2048',
            'years' => 'required|integer|max:8',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

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
