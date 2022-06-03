<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Auth, PDF;


class TeacherController extends Controller
{
    public function index()
    {
        if (Auth::user()->user_type == "admin") {
            $search = request()->query('search');
            if ($search) {
                $teachers = Teacher::where('teacherName', 'LIKE', "%{$search}%")
                    ->orWhere('specialization', 'LIKE', "%{$search}%")
                    ->orWhere('id', 'LIKE', "%{$search}%")
                    ->paginate(10);
            } else {
                $teachers = DB::table('teachers')->orderBy('created_at', 'asc')->paginate('10');
            }
            return view('teachers.index', compact('teachers'));
        } else {
            return redirect('login');
        }
    }
    public function show($id)
    {
        if (Auth::user()->user_type == "admin") {
            $teacher = Teacher::find($id);
            return view('teachers.show', compact('teacher'));
        } else {
            return redirect('login');
        }
    }
    public function create()
    {
        if (Auth::user()->user_type == "admin") {
            return view('teachers.create');
        } else {
            return redirect('login');
        }
    }
    public function store(Request $request)
    {
        if (Auth::user()->user_type == "admin") {
            $request->validate([
                'teacherName' => 'required|unique:teachers|max:100',
                'specialization' => 'required|in:IT,Engineering,Entrepreneurship,Arts,Humanities,Language',
                'salary' => 'required|numeric|min:25000|max:100000'
            ], []);
            $teacher = new Teacher();
            $teacher->teacherName = $request->teacherName;
            $teacher->specialization = $request->specialization;
            $teacher->salary = Crypt::encryptString($request->salary);
            $teacher->save();
            return back()->with('success', '');
        } else {
            return redirect('login');
        }
    }
    public function edit($id)
    {
        if (Auth::user()->user_type == "admin") {
            $teacher = Teacher::find($id);
            return view('teachers.edit', compact('teacher'));
        } else {
            return redirect('login');
        }
    }
    public function update(Request $request, $id)
    {
        if (Auth::user()->user_type == "admin") {
            $request->validate([
                'teacherName' => "required|max:100|unique:teachers,teacherName,$id",
                'specialization' => 'required|in:IT,Engineering,Entrepreneurship,Arts,Humanities,Language',
                'salary' => 'required|numeric|min:25000|max:100000'
            ], []);
            $teacher = Teacher::find($id);
            $teacher->teacherName = $request->teacherName;
            $teacher->specialization = $request->specialization;
            $teacher->salary = Crypt::encryptString($request->salary);
            $teacher->save();
            return back()->with('success', '');
        } else {
            return redirect('login');
        }
    }
    public function destroy($id)
    {
        if (Auth::user()->user_type == "admin") {
            $teacher = Teacher::find($id);
            $teacher->delete();
            return back()->with('deleted', '');
        } else {
            return redirect('login');
        }
    }
    public function exportTeachers()
    {
        if (Auth::user()->user_type == "admin") {
            $teachers = Teacher::all();
            $pdf = PDF::loadView('teachers.pdf', compact('teachers'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->download('Teacher List.pdf');
        } else {
            return redirect('login');
        }
    }
}
