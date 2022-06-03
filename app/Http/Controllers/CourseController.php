<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;

class CourseController extends Controller
{
    public function index()
    {
        if (Auth::user()->user_type == "admin") {
            $search = request()->query('search');
            if ($search) {
                $courses = Course::where('courseCode', 'LIKE', "%{$search}%")
                    ->orWhere('courseTitle', 'LIKE', "%{$search}%")
                    ->orWhere('teacher', 'LIKE', "%{$search}%")
                    ->orWhere('id', 'LIKE', "%{$search}%")
                    ->paginate(10);
            } else {
                $courses = DB::table('courses')->orderBy('created_at', 'asc')->paginate('10');
            }
            return view('courses.index', compact('courses'));
        } else {
            return redirect('login');
        }
    }
    public function create()
    {
        if (Auth::user()->user_type == "admin") {
            $teachers = Teacher::all();
            return view('courses.create', compact('teachers'));
        } else {
            return redirect('login');
        }
    }
    public function store(Request $request)
    {
        if (Auth::user()->user_type == "admin") {
            $request->validate([
                'courseCode' => 'required|unique:courses|max:10',
                'courseTitle' => 'required|unique:courses|max:50',
                'teacher' => 'required|exists:teachers,teacherName',
            ], []);
            $course = new Course();
            $course->courseCode = $request->courseCode;
            $course->courseTitle = $request->courseTitle;
            $course->teacher = $request->teacher;
            $course->save();
            return back()->with('success', '');
        } else {
            return redirect('login');
        }
    }
    public function show($id)
    {
        if (Auth::user()->user_type == "admin") {
            $course = Course::find($id);
            return view('courses.show', compact('course'));
        } else {
            return redirect('login');
        }
    }
    public function edit($id)
    {
        if (Auth::user()->user_type == "admin") {
            $course = Course::find($id);
            $teachers = Teacher::all();
            return view('courses.edit', compact('course', 'teachers'));
        } else {
            return redirect('login');
        }
    }
    public function update(Request $request, $id)
    {
        if (Auth::user()->user_type == "admin") {
            $request->validate([
                'courseCode' => "required|max:10|unique:courses,courseCode,$id",
                'courseTitle' => "required|max:50|unique:courses,courseTitle,$id",
                'teacher' => 'required|exists:teachers,teacherName',
            ], []);
            $course = Course::find($id);
            $course->courseCode = $request->courseCode;
            $course->courseTitle = $request->courseTitle;
            $course->teacher = $request->teacher;
            $course->save();
            return back()->with('success', '');
        } else {
            return redirect('login');
        }
    }
    public function destroy($id)
    {
        if (Auth::user()->user_type == "admin") {
            $course = Course::find($id);
            $course->delete();
            return back()->with('deleted', '');
        } else {
            return redirect('login');
        }
    }
    public function exportCourses()
    {
        if (Auth::user()->user_type == "admin") {
            $courses = Course::all();
            $pdf = PDF::loadView('courses.pdf', compact('courses'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->download('Course List.pdf');
        } else {
            return redirect('login');
        }
    }
}
