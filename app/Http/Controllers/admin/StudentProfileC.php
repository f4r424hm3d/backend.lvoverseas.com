<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentDocument;
use Illuminate\Http\Request;

class StudentProfileC extends Controller
{
  public function index(Request $request, $student_id)
  {
    $student = Student::find($student_id);
    $active = 'profile';
    $data = compact('student', 'active');
    return view('admin.student.profile')->with($data);
  }
  public function documents(Request $request, $student_id)
  {
    $student = Student::find($student_id);
    $documents = StudentDocument::where('student_id', $student_id)->get();
    $active = 'documents';
    $data = compact('student', 'active', 'documents');
    return view('admin.student.documents')->with($data);
  }
}
