<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\AppliedProgram;
use App\Models\Country;
use App\Models\Gender;
use App\Models\Level;
use App\Models\MaritalStatus;
use App\Models\SchoolAttended;
use App\Models\ShortlistedProgram;
use App\Models\Student;
use App\Models\StudentDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentAc extends Controller
{
  public function index($id)
  {
    $data = Student::find($id);
    return response()->json($data);
  }
  public function schools($id)
  {
    $schools = SchoolAttended::where('student_id', $id)->get();
    return response()->json($schools);
  }
  public function documents($id)
  {
    $data = StudentDocument::where('student_id', $id)->get();
    return response()->json($data);
  }
  public function updateProfile(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required|regex:/^[a-zA-Z ]*$/',
      'gender' => 'required|in:Male,Female,Other',
      'c_code' => 'required|numeric',
      'mobile' => 'required|numeric',
      'dob' => 'required|date',
      'nationality' => 'required',
      'city' => 'regex:/^[a-zA-Z ]*$/',
      'state' => 'regex:/^[a-zA-Z ]*$/',
      'country' => 'regex:/^[a-zA-Z ]*$/',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = Student::find($request['id']);
    $field->name = $request['name'];
    $field->gender = $request['gender'];
    $field->dob = $request['dob'];
    $field->nationality = $request['nationality'];
    $field->c_code = $request['c_code'];
    $field->mobile = $request['mobile'];
    $field->city = $request['city'];
    $field->state = $request['state'];
    $field->country = $request['country'];
    $field->save();
    $msg = 'Record has been updated successfully.';
    return response()->json(['message' => $msg]);
  }

  public function changePassword(Request $request)
  {
    $id = $request->id;
    $student = Student::find($id);

    $validator = Validator::make($request->all(), [
      'old_password' => 'required|in:' . $student->password,
      'new_password' => 'required|min:8',
      'confirm_new_password' => 'required|min:8|same:new_password',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = Student::find($request['id']);
    $field->password = $request['new_password'];
    $field->save();
    $msg = 'Password has been changed.';
    return response()->json(['message' => $msg]);
  }


  public function submitPersonalInfo(Request $request)
  {
    $id = $request->id;
    $validator = Validator::make($request->all(), [
      'name' => 'required|regex:/^[a-zA-Z ]*$/',
      'email' => 'required',
      'c_code' => 'required|numeric',
      'mobile' => 'required|numeric',
      'dob' => 'required|date',
      'first_language' => 'required',
      'nationality' => 'required',
      //   'passport_number' => 'required',
      //   'passport_expiry' => 'required|date',
      //   'marital_status' => 'required',
      //   'gender' => 'required',
      //   'home_address' => 'required',
      //   'city' => 'regex:/^[a-zA-Z ]*$/',
      //   'state' => 'regex:/^[a-zA-Z ]*$/',
      //   'country' => 'regex:/^[a-zA-Z ]*$/',
      //   'zip_code' => 'required',
      //   'home_contact_number' => 'required|numeric',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }
    $field = Student::find($id);
    $field->name = $request['name'];
    $field->email = $request['email'];
    $field->c_code = $request['c_code'];
    $field->mobile = $request['mobile'];
    $field->father = $request['father'];
    $field->mother = $request['mother'];
    $field->dob = $request['dob'];
    $field->first_language = $request['first_language'];
    $field->nationality = $request['nationality'];
    $field->passport_number = $request['passport_number'];
    $field->passport_expiry = $request['passport_expiry'];
    $field->marital_status = $request['marital_status'];
    $field->gender = $request['gender'];
    $field->home_address = $request['home_address'];
    $field->city = $request['city'];
    $field->state = $request['state'];
    $field->country = $request['country'];
    $field->zip_code = $request['zip_code'];
    $field->home_contact_number = $request['home_contact_number'];
    $field->save();
    $msg = 'Record has been updated successfully.';
    return response()->json(['message' => $msg]);
  }
  public function submitEduSum(Request $request)
  {
    $id = $request->id;
    $validator = Validator::make($request->all(), [
      'country_of_education' => 'required',
      'highest_level_of_education' => 'required',
      'grading_scheme' => 'required',
      'grade_average' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }
    $field = Student::find($id);
    $field->country_of_education = $request['country_of_education'];
    $field->highest_level_of_education = $request['highest_level_of_education'];
    $field->grading_scheme = $request['grading_scheme'];
    $field->grade_average = $request['grade_average'];
    $field->save();
    $msg = 'Record has been updated successfully.';
    return response()->json(['message' => $msg]);
  }
  public function addSchool(Request $request)
  {
    $id = $request->id;
    // printArray($request->toArray());
    // die;

    $validator = Validator::make($request->all(), [
      'country_of_institution' => 'required',
      'name_of_institution' => 'required',
      'level_of_education' => 'required',
      'primary_language_of_instruction' => 'required',
      'attended_institution_from' => 'required',
      'attended_institution_to' => 'required',
      'degree_name' => 'required',
      'graduated_from_this' => 'required',
      'address' => 'required',
      'city' => 'required',
      'state' => 'required',
      'zipcode' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }
    $field = new SchoolAttended;
    $field->student_id = $id;
    $field->country_of_institution = $request['country_of_institution'];
    $field->name_of_institution = $request['name_of_institution'];
    $field->level_of_education = $request['level_of_education'];
    $field->primary_language_of_instruction = $request['primary_language_of_instruction'];
    $field->attended_institution_from = $request['attended_institution_from'];
    $field->attended_institution_to = $request['attended_institution_to'];
    $field->degree_name = $request['degree_name'];
    $field->graduated_from_this = $request['graduated_from_this'];
    $field->graduation_date = $request['graduation_date'];
    $field->have_physical_certificate = $request['have_physical_certificate'];
    $field->address = $request['address'];
    $field->city = $request['city'];
    $field->state = $request['state'];
    $field->zipcode = $request['zipcode'];
    $field->save();
    $msg = 'Record has been updated successfully.';
    return response()->json(['message' => $msg]);
  }
  public function updateSchool(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'country_of_institution' => 'required',
      'name_of_institution' => 'required',
      'level_of_education' => 'required',
      'primary_language_of_instruction' => 'required',
      'attended_institution_from' => 'required',
      'attended_institution_to' => 'required',
      'degree_name' => 'required',
      'graduated_from_this' => 'required',
      'address' => 'required',
      'city' => 'required',
      'state' => 'required',
      'zipcode' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }
    $field = SchoolAttended::find($request['id']);
    $field->country_of_institution = $request['country_of_institution'];
    $field->name_of_institution = $request['name_of_institution'];
    $field->level_of_education = $request['level_of_education'];
    $field->primary_language_of_instruction = $request['primary_language_of_instruction'];
    $field->attended_institution_from = $request['attended_institution_from'];
    $field->attended_institution_to = $request['attended_institution_to'];
    $field->degree_name = $request['degree_name'];
    $field->graduated_from_this = $request['graduated_from_this'];
    $field->graduation_date = $request['graduation_date'];
    $field->have_physical_certificate = $request['have_physical_certificate'];
    $field->address = $request['address'];
    $field->city = $request['city'];
    $field->state = $request['state'];
    $field->zipcode = $request['zipcode'];
    $field->save();
    $msg = 'Record has been updated successfully.';
    return response()->json(['message' => $msg]);
  }
  public function updateTestScore(Request $request)
  {
    $id = $request->id;
    $data = $request->toArray();
    unset($data['id']);

    $validator = Validator::make($request->all(), [
      'english_exam_type' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }
    $field = Student::find($id);
    foreach ($data as $key => $value) {
      $field->$key = $value;
    }

    $field->save();
    $msg = 'Record has been updated successfully.';
    return response()->json(['message' => $msg]);
  }

  public function updateBI(Request $request)
  {
    $id = $request->id;
    $validator = Validator::make($request->all(), [
      'refused_visa' => 'required',
      'valid_study_permit' => 'required',
      'visa_note' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }
    $field = Student::find($id);
    $field->refused_visa = $request->refused_visa;
    $field->valid_study_permit = $request->valid_study_permit;
    $field->visa_note = $request->visa_note;
    $field->save();
    $msg = 'Record has been updated successfully.';
    return response()->json(['message' => $msg]);
  }
  public function updateDocs(Request $request)
  {
    $id = $request->id;

    $validator = Validator::make($request->all(), [
      'document_name' => 'required',
      'doc' => 'required|max:2024|mimes:png,jpg,jpeg,pdf',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new StudentDocument();
    $field->student_id = $id;
    $field->document_name = $request->document_name;
    if ($request->hasFile('doc')) {
      $fileOriginalName = $request->file('doc')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('doc')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('doc')->move('uploads/documents/', $file_name);
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
  public function deleteSchool($id)
  {
    $result = SchoolAttended::find($id)->delete();
    $msg = 'Record has been deleted succesfully.';
    return response()->json(['message' => $msg]);
  }
}
