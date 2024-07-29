<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ApplicationNote;
use App\Models\AppliedCollege;
use App\Models\StudentDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    $notes = ApplicationNote::where('application_id', $app->id)->orderBy('id', 'desc')->get();
    if ($notes) {
      return response()->json($notes);
    } else {
      return response()->json(['status' => 'failed', 'message' => 'Some error occured.']);
    }
  }
  public function addNote(Request $request)
  {
    $id = $request->id;

    $validator = Validator::make($request->all(), [
      'application_id' => 'required',
      'token' => 'required',
      'subject' => 'required',
      'message_note' => 'required',
      'file' => 'nullable|max:2024|mimes:png,jpg,jpeg,pdf',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new ApplicationNote();
    $field->application_id = $request->application_id;
    $field->subject = $request->subject;
    $field->message_note = $request->message_note;
    $field->sender = 'user';
    if ($request->hasFile('file')) {
      $fileOriginalName = $request->file('file')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('file')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('file')->move('uploads/documents/', $file_name);
      if ($move) {
        $field->file_name = $file_name;
        $field->file_path = 'uploads/documents/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    $field->save();
    $msg = 'Record has been updated successfully.';
    return response()->json(['message' => $msg]);
  }
}
