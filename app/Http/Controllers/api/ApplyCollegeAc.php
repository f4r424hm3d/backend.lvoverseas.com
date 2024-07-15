<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\AppliedCollege;
use Illuminate\Http\Request;

class ApplyCollegeAc extends Controller
{
  public function index(Request $request, $university_id, $student_id)
  {
    $field = new AppliedCollege();
    $field->student_id = $student_id;
    $field->university_id = $university_id;
    $field->save();
    $msg = 'Record has been updated successfully.';
    return response()->json(['message' => $msg]);
  }
  public function colleges($student_id)
  {
    $schools = AppliedCollege::where('student_id', $student_id)->get();
    return response()->json($schools);
  }
}
