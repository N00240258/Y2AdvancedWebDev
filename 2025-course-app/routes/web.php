<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // whenever you are redirected to "/course" the course controller will get the index fucntion to show all the courses on the screen.
    // this is then named as "courses.index" so whenever a redirect button is created you can name it as that or another name to specify where the redirect will bring you
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

    Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');

//    Route::resource('students', StudentController::class)->except('students.create');

    Route::get('/students/create/{course}', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students/{course}', [StudentController::class, 'store'])->name('students.store');
    // Route::post('courses/{course}/students', [StudentController::class, 'store'])->name('students.store');
});

require __DIR__.'/auth.php';
