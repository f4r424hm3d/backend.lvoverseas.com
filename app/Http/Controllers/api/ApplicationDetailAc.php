<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ApplicationNote;
use App\Models\AppliedCollege;
use Illuminate\Http\Request;

class ApplicationDetailAc extends Controller
{
  public function applicationDetails($application_id, $token)
  {
    $schools = AppliedCollege::with('college', 'status')->where('id', $application_id)->where('token', $token)->firstOrFail();
    if ($schools) {
      return response()->json($schools);
    } else {
      return response()->json(['status' => 'failed', 'message' => 'Some error occured.']);
    }
  }
  public function notes($application_id, $token)
  {
    $app = AppliedCollege::where('id', $application_id)->where('token', $token)->firstOrFail();
    $notes = ApplicationNote::where('id', $app->id)->orderBy('id', 'desc')->get();
    if ($notes) {
      return response()->json($notes);
    } else {
      return response()->json(['status' => 'failed', 'message' => 'Some error occured.']);
    }
  }
}
