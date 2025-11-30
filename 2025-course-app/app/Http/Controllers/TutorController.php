<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input("search");
        if($search){
            $tutors = Tutor::where("title", "like", "%" . $search . "%")->get() ;
        }else {
            $tutors = Tutor::all();
        }

        $tutors = Tutor::with('courses')->get();

        return view("tutors.index", compact("tutors"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if (auth()->user()->role !== 'admin') {
            return redirect()->route('tutors.index')->with('error', 'Access denied.');
        }

        // loads all the courses in the create so that it can display them all when adding courses to tutors
        $courses = Course::all();
        return view('tutors.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (auth()->user()->role !== 'admin') {
            return redirect()->route('tutors.index')->with('error', 'Access denied.');
        }

        $validated = $request->validate([
            'tutor_name' => 'required|string|max:255',
            'tutor_email' => 'required|string|max:255',
            'age' => 'required|integer|max:100',
            'years_of_experience' => 'required|integer|max:100',
            'courses' => 'array'
        ]);

        $tutor = Tutor::create($validated);

        // if the tutor has any courses selected it will then connect them through the pivot table in the database automatically for however many that have been selected
        if ($request->has('courses')) {
            $tutor->courses()->attach($request->courses);
        }

        return redirect()->route('tutors.index')->with('success', 'Tutor created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tutor $tutor)
    {
        // $tutor->load('courses');
        return (view('tutors.show', compact('tutor')));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tutor $tutor)
    {
        $courses = Course::all();
        // if the tutor has any courses selected it will get the id from the courses and put the into tutorCourses where the creation form can know what courses have already been selected
        $tutorCourses = $tutor->courses->pluck('id')->toArray();
        return view('tutors.edit', compact('tutor', 'courses', 'tutorCourses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tutor $tutor)
    {
        $request->validate([
            'tutor_name' => 'required|string|max:255',
            'tutor_email' => 'required|string|max:255',
            'age' => 'required|integer|max:100',
            'years_of_experience' => 'required|integer|max:100',
            'courses' => 'array'
        ]);

        $tutor->update([
            'tutor_name' => $request->tutor_name,
            'tutor_email' => $request->tutor_email,
            'age' => $request->age,
            'years_of_experience' => $request->years_of_experience,
        ]);

        // if the tutor has any courses selected it will update the pivot table to add any new selected courses
        if ($request->has('courses')) {
            $tutor->courses()->sync($request->courses);
        }

        return redirect()->route('tutors.index')->with('success', 'Tutor created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tutor $tutor)
    {
        // detaches all the courses connected to the tutor in the pivot table before deletine so there isnt a lot of unnecessary data in the pivot table

        $tutor->courses()->detach();
        $tutor->delete();

        return redirect()->route('tutors.index')->with('success', 'Tutor deleted');
    }
}
