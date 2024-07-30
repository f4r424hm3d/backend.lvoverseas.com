<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ApplicationNote;
use App\Models\ApplicationStatus;
use App\Models\AppliedCollege;
use App\Models\Country;
use App\Models\Level;
use App\Models\State;
use App\Models\Student;
use App\Models\StudentDocument;
use Illuminate\Http\Request;

class StudentProfileC extends Controller
{
  public function index(Request $request, $student_id)
  {
    $countries = Country::all();
    $states = State::all();
    $levels = Level::all();
    $student = Student::find($student_id);
    $active = 'profile';
    $data = compact('student', 'active', 'countries', 'states', 'levels');
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
  public function applications(Request $request, $student_id)
  {
    $student = Student::find($student_id);
    $applications = AppliedCollege::where('student_id', $student_id)->get();
    $active = 'applications';
    $page_title = 'Applications';
    $data = compact('student', 'active', 'applications', 'page_title');
    return view('admin.student.applications')->with($data);
  }
  public function application(Request $request, $id)
  {
    $application = AppliedCollege::findOrFail($id);
    $notes = ApplicationNote::where('application_id', $application->id)->orderBy('id', 'desc')->get();
    $student = Student::find($application->student_id);
    $statuses = ApplicationStatus::all();
    $active = 'applications';
    $page_title = 'Application Details';

    $data = compact('student', 'active', 'application', 'page_title', 'notes', 'statuses');
    return view('admin.student.application')->with($data);
  }
  public function addNote(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'subject' => 'required',
        'message_note' => 'required',
        'file' => 'nullable|max:2048|mimes:jpg,jpeg,png,gif,pdf',
      ]
    );
    $field = new ApplicationNote();
    $field->subject = $request['subject'];
    $field->message_note = $request['message_note'];
    $field->application_id = $request['application_id'];
    $field->sender = 'admin';
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
    session()->flash('smsg', 'New record has been added successfully.');
    return redirect('admin/student/application/' . $request->application_id);
  }
  public function updateStatus(Request $request)
  {
    $application = AppliedCollege::find($request->application_id);

    if ($application) {
      $application->application_status_id = $request->status_id;
      $application->save();
      return response()->json(['success' => true]);
    } else {
      return response()->json(['success' => false], 404);
    }
  }
}
