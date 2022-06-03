<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;


use Auth, PDF;


class GradeController extends Controller
{
    public function index()
    {
        if (Auth::user()->user_type == "admin") {
            $search = request()->query('search');
            if ($search) {
                $grades = Grade::where('studentNumber', 'LIKE', "%{$search}%")
                    ->orWhere('course', 'LIKE', "%{$search}%")
                    ->orWhere('gwa', 'LIKE', "%{$search}%")
                    ->orWhere('prelim', 'LIKE', "%{$search}%")
                    ->orWhere('midterm', 'LIKE', "%{$search}%")
                    ->orWhere('final', 'LIKE', "%{$search}%")
                    ->paginate(10);
            } else {
                $grades = DB::table('grades')->orderBy('created_at', 'asc')->paginate('10');
            }
            return view('grades.index', compact('grades'));
        } else {
            return redirect('login');
        }
    }
    public function show($id)
    {
        if (Auth::user()->user_type == "admin") {
            $grade = Grade::find($id);
            return view('grades.show', compact('grade'));
        } else {
            return redirect('login');
        }
    }
    public function create()
    {
        if (Auth::user()->user_type == "admin") {
            $users = User::all();
            $courses = Course::all();
            return view('grades.create', compact('users', 'courses'));
        } else {
            return redirect('login');
        }
    }
    public function store(Request $request)
    {
        if (Auth::user()->user_type == "admin") {
            $request->validate([
                'studentNumber' => 'required|exists:users,studentNumber',
                'course' => 'required|exists:courses,courseTitle',
                'prelim' => 'required|numeric|min:45|max:100',
                'midterm' => 'required|numeric|min:45|max:100',
                'final' => 'required|numeric|min:45|max:100'
            ]);
            $grade = new Grade();
            $grade->studentNumber = $request->studentNumber;
            $grade->course = $request->course;
            $grade->prelim = $request->prelim;
            $grade->midterm = $request->midterm;
            $grade->final = $request->final;
            $grade->gwa = ($request->prelim + $request->midterm + $request->final) / 3;
            $grade->save();
            return back()->with('success', '');
        } else {
            return redirect('login');
        }
    }
    public function edit($id)
    {
        if (Auth::user()->user_type == "admin") {
            $users = User::all();
            $courses = Course::all();
            $grade = Grade::find($id);
            return view('grades.edit', compact('grade', 'users', 'courses'));
        } else {
            return redirect('login');
        }
    }
    public function update(Request $request, $id)
    {
        if (Auth::user()->user_type == "admin") {
            $request->validate([
                'studentNumber' => 'required|exists:users,studentNumber',
                'course' => 'required|exists:courses,courseTitle',
                'prelim' => 'required|numeric|min:45|max:100',
                'midterm' => 'required|numeric|min:45|max:100',
                'final' => 'required|numeric|min:45|max:100'
            ]);
            $grade = Grade::find($id);
            $grade->studentNumber = $request->studentNumber;
            $grade->course = $request->course;
            $grade->prelim = $request->prelim;
            $grade->midterm = $request->midterm;
            $grade->final = $request->final;
            $grade->gwa = ($request->prelim + $request->midterm + $request->final) / 3;
            $grade->save();
            return back()->with('success', '');
        } else {
            return redirect('login');
        }
    }
    public function destroy($id)
    {
        if (Auth::user()->user_type == "admin") {
            $grade = Grade::find($id);
            $grade->delete();
            return back()->with('deleted', '');
        } else {
            return redirect('login');
        }
    }
    // for users
    public function showGrades()
    {
        $studentNumber = Auth::user()->studentNumber;
        if (Auth::user()->user_type == "user") {
            $search = request()->query('search');
            if ($search) {
                $grades = Grade::where('course', 'LIKE', "%{$search}%")
                    ->orWhere('prelim', 'LIKE', "%{$search}%")
                    ->orWhere('midterm', 'LIKE', "%{$search}%")
                    ->orWhere('final', 'LIKE', "%{$search}%")
                    ->orWhere('gwa', 'LIKE', "%{$search}%")
                    ->paginate(10);
            } else {
                $grades = Grade::where('studentNumber', $studentNumber)->paginate('10');
            }
            return view('my-grades.index', compact('grades'));
        } else {
            return redirect('login');
        }
    }
    public function exportGrades()
    {
        if (Auth::user()->user_type == "admin") {
            $grades = Grade::all();
            $pdf = PDF::loadView('grades.pdf', compact('grades'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->download('Academic Records.pdf');
        } else {
            return redirect('login');
        }
    }
    public function printGradeSlip()
    {
        if (Auth::user()->user_type == "user") {
            $studentNumber = Auth::user()->studentNumber;
            $grades = Grade::where('studentNumber', $studentNumber)->get();
            $pdf = PDF::loadView('my-grades.pdf', compact('grades'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->download($studentNumber . '.pdf');
        } else {
            return redirect('login');
        }
    }
}
