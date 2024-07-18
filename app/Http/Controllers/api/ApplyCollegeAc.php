<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\AppliedCollege;
use Illuminate\Http\Request;

class ApplyCollegeAc extends Controller
{
  public function index(Request $request, $university_id, $student_id)
  {
    $check = AppliedCollege::where('university_id', $university_id)->where('student_id', $student_id)->count();
    if ($check > 0) {
      $msg = 'This College is already applied.';
      $status = 'Failed';
    } else {
      $field = new AppliedCollege();
      $field->student_id = $student_id;
      $field->university_id = $university_id;
      $field->save();
      $status = 'Success';
      $msg = 'College has been applied successfully.';
    }
    return response()->json(['status' => $status, 'message' => $msg]);
  }
  public function colleges($student_id)
  {
    $schools = AppliedCollege::with('college')->where('student_id', $student_id)->get();
    return response()->json($schools);
  }
  public function check(Request $request, $university_id, $student_id)
  {
    $check = AppliedCollege::where('university_id', $university_id)->where('student_id', $student_id)->count();
    if ($check > 0) {
      $msg = 'This College is already applied.';
      $status = 'Success';
    } else {
      $status = 'Failed';
      $msg = 'College is not applied.';
    }
    return response()->json(['status' => $status, 'message' => $msg]);
  }
}
