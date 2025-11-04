<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facade\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {


        if (auth()->user()->role !== 'admin') {
            return redirect()->route('courses.index')->with('error', 'Access denied.');
        }
        return view('students.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {
        $request->validate([
            'student_name' => 'required|max:512',
            'student_email' => 'required|string|max:256',
            'age' => 'required|integer|min:18|max:100',
            'year' => 'required|min:1|max:4',
            'average_grade' => 'required|decimal:1|max:4'
        ]);

        $course->students()->create([
            'course_id' => $course->id,
            'student_name' => $request->input('student_name'),
            'student_email' => $request->input('student_email'),
            'age' => $request->input('age'),
            'year' => $request->input('year'),
            'average_grade' => $request->input('average_grade'),

        ]);


        // Student::create([
        //     'student_name' => $request->student_name,
        //     'student_email' => $request->student_email,
        //     'age' => $request->age,
        //     'year' => $request->year,
        //     'average_grade' => $request->average_grade,
        //     'course_id' => $course->id
        // ]);


        return redirect()->route('courses.show', $course)->with('success', 'Student enrolled successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
