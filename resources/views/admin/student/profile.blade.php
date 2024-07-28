@extends('admin.layouts.main')
@push('title')
  <title>Profile</title>
@endpush
@section('main-section')
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">{{ $student->name }} > Profile</h4>

            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                  <a href="javascript: void(0);">Home</a>
                </li>
                <li class="breadcrumb-item active">Profile</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <!-- NOTIFICATION FIELD START -->
          <x-ResultNotificationField></x-ResultNotificationField>
          <!-- NOTIFICATION FIELD END -->
          <div class="card">
            @include('admin.student.profile-menu')

            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">

                    <!-- LOGIN INFORMATION START -->
                    <div>
                      <div class="card-header">
                        <h4>
                          Login Information
                          <button style="float:right;" onclick="toggleAllFormAttr(this.value,'li')" type="button"
                            id="litbtn" value="remove" class="btn btn-sm btn-outline-faraz">Edit</button>
                        </h4>
                      </div>
                      <div class="card-body">
                        <form id="loginInfoForm" method="post">
                          <input type="hidden" name="id" value="<?php echo $student->id; ?>">
                          <div class="row">
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="email">Email</label>
                              <input type="text" class="form-control lif" name="email" placeholder="Email"
                                value="<?php echo $student->email; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="email_verified">Email Varified</label>
                              <select name="email_verified" class="form-control lif" readonly disabled>
                                <option value="">Select</option>
                                <option value="1" <?php echo $student->email_verified == '1' ? 'selected' : ''; ?>>Email Varified</option>
                                <option value="0" <?php echo $student->email_verified == '0' ? 'selected' : ''; ?>>Email Not Varified</option>
                              </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="password">Password</label>
                              <input type="text" class="form-control lif" name="password" placeholder="Password"
                                value="<?php echo $student->password; ?>" readonly>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-12 col-sm-12">
                              <button style="float:right;" type="submit"
                                class="btn btn-sm btn-primary liubtn hidden-btn">Update</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <!-- LOGIN INFORMATION END -->
                    <hr>
                    <!-- BASIC INFORMATION START -->
                    <div>
                      <div class="card-header">
                        <h4>
                          Basic Information
                          <button style="float:right;" onclick="toggleFormAttr(this.value)" type="button" id="pitbtn"
                            value="remove" class="btn btn-sm btn-outline-faraz">Edit</button>
                        </h4>
                      </div>
                      <div class="card-body">
                        <form id="basicInfoForm" method="post">
                          <input type="hidden" name="id" value="<?php echo $student->id; ?>">
                          <div class="row">
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="intrested_subject">Intrested Subject/Course</label>
                              <input type="text" class="form-control pif" name="intrested_subject"
                                id="intrested_subject" placeholder="Intrested Subject/Course" value="<?php echo $student->intrested_subject; ?>"
                                readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="intrested_university">Intrested University</label>
                              <input type="text" class="form-control pif" name="intrested_university"
                                id="intrested_university" placeholder="Intrested University" value="<?php echo $student->intrested_university; ?>"
                                readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="highest_qualification">Highest Qualification</label>
                              <input type="text" class="form-control pif" name="highest_qualification"
                                id="highest_qualification" placeholder="Highest Qualification"
                                value="<?php echo $student->highest_qualification; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="exam_taken">Exam Taken</label>
                              <input type="text" class="form-control pif" name="exam_taken" id="exam_taken"
                                placeholder="Exam Taken" value="<?php echo $student->exam_taken; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="preferred_destination">Preffered Destination</label>
                              <input type="text" class="form-control pif" name="preferred_destination"
                                id="preferred_destination" placeholder="Preffered Destination"
                                value="<?php echo $student->preferred_destination; ?>" readonly>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-12 col-sm-12">
                              <button style="float:right;" type="submit"
                                class="btn btn-sm btn-primary piubtn hidden-btn">Update</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <!-- BASIC INFORMATION END -->
                    <hr>
                    <!-- GENRAL INFORMATION START -->
                    <div>
                      <div class="card-header">
                        <h4>
                          Personal Information
                          <button style="float:right;" onclick="toggleFormAttr(this.value)" type="button"
                            id="pitbtn" value="remove" class="btn btn-sm btn-outline-faraz">Edit</button>
                        </h4>
                      </div>
                      <div class="card-body">
                        <form id="piform" method="post">
                          <input type="hidden" name="id" value="<?php echo $student->id; ?>">
                          <div class="row">
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="name">Full Name</label>
                              <input type="text" class="form-control pif" name="name" id="name"
                                placeholder="Enter Full Name" value="<?php echo $student->name; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="email">Email</label>
                              <input type="email" class="form-control pif" name="email" id="email"
                                placeholder="Enter email" value="<?php echo $student->email; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="c_code">Country Code</label>
                              <input min="0" type="number" class="form-control pif" name="c_code"
                                id="c_code" placeholder="Enter country code" value="<?php echo $student->c_code; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="mobile">Phone Number</label>
                              <input type="text" class="form-control pif" name="mobile" id="mobile"
                                placeholder="Enter Phone Number" value="<?php echo $student->mobile; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="father">Father Name</label>
                              <input type="text" class="form-control pif" name="father" id="father"
                                placeholder="Enter Father Name" value="<?php echo $student->father; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="father_mobile">Father Mobile</label>
                              <input type="text" class="form-control pif" name="father_mobile" id="father_mobile"
                                placeholder="Enter Father Mobile" value="<?php echo $student->father_mobile; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="mother">Mother Name</label>
                              <input type="text" class="form-control pif" name="mother" id="mother"
                                placeholder="Enter mother Name" value="<?php echo $student->mother; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="mother_mobile">Mother Mobile</label>
                              <input type="text" class="form-control pif" name="mother_mobile" id="mother_mobile"
                                placeholder="Enter Mother Mobile" value="<?php echo $student->mother_mobile; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="nationality">Country of Citizenship</label>
                              <select name="nationality" id="nationality" class="form-control pif select2" readonly
                                disabled="">
                                <option value="" <?php echo $student->nationality == '' ? 'Selected' : ''; ?>>Select</option>
                                <?php
                                $countrys = $this->mm->getDataByOW('name', 'ASC', ['id !=' => '0'], 'countries');
                                foreach ($countrys as $c) {
                                ?>
                                <option value="<?php echo $c->name; ?>" <?php echo $student->nationality == $c->name ? 'Selected' : ''; ?>><?php echo $c->name; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="gender">Gender</label>
                              <select id="gender" name="gender" class="form-control pif select2" readonly
                                disabled="">
                                <option value="" <?php echo $student->gender == '' ? 'Selected' : ''; ?>>Select</option>
                                <option value="male" <?php echo $student->gender == 'male' ? 'Selected' : ''; ?>>Male</option>
                                <option value="female" <?php echo $student->gender == 'female' ? 'Selected' : ''; ?>>Female</option>
                                <option value="other" <?php echo $student->gender == 'other' ? 'Selected' : ''; ?>>Other</option>
                              </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="dob">D.O.B</label>
                              <input type="date" class="form-control pif" name="dob" id="dob"
                                placeholder="Enter date of birth" value="<?php echo $student->dob; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="first_language">First Language</label>
                              <input type="text" class="form-control pif" name="first_language" id="first_language"
                                placeholder="Enter First Language" value="<?php echo $student->first_language; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="marital_status">Marital Status</label>
                              <select name="marital_status" id="marital_status" class="form-control pif select2"
                                readonly disabled="">
                                <option value="" <?php echo $student->marital_status == '' ? 'Selected' : ''; ?>>Select</option>
                                <option value="Single" <?php echo $student->marital_status == 'Single' ? 'Selected' : ''; ?>>Single
                                </option>
                                <option value="Married" <?php echo $student->marital_status == 'Married' ? 'Selected' : ''; ?>>Married
                                </option>
                              </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="passport_number">Passport Number</label>
                              <input type="text" class="form-control pif" name="passport_number"
                                id="passport_number" placeholder="Enter Passport Number" value="<?php echo $student->passport_number; ?>"
                                readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="passport_expiry">Passport Expiry</label>
                              <input type="date" class="form-control pif" name="passport_expiry"
                                id="passport_expiry" placeholder="Enter Passport Expiry date"
                                value="<?php echo $student->passport_expiry; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="religion">Religion</label>
                              <input type="text" class="form-control pif" name="religion" id="religion"
                                placeholder="Enter religion" value="<?php echo $student->religion; ?>" readonly>
                            </div>
                          </div>
                          <hr>
                          <h4>Address Detail</h4>
                          <hr>
                          <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                              <label class="form-label sr-onl" for="home_address">Address</label>
                              <input type="text" class="form-control pif" name="home_address" id="home_address"
                                placeholder="Enter address" value="<?php echo $student->home_address; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="city">City</label>
                              <input type="text" class="form-control pif" name="city" id="city"
                                placeholder="Enter city" value="<?php echo $student->city; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="state">State/Province</label>
                              <select name="state" id="state" class="form-control select2 pif" readonly
                                disabled="">
                                <option value="" <?php echo $student->state == '' ? 'Selected' : ''; ?>>Select</option>
                                <?php
                                $state = $this->mm->getAllData('tbl_state');
                                foreach ($state as $row) {
                                ?>
                                <option value="<?php echo $row->statename; ?>" <?php echo $student->state == $row->statename ? 'Selected' : ''; ?>><?php echo $row->statename; ?>
                                </option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="country">Country <?php echo $student->country; ?></label>
                              <select name="country" id="country" class="form-control pif select2" readonly
                                disabled="">
                                <option value="" <?php echo $student->country == '' ? 'Selected' : ''; ?>>Select</option>
                                <?php
                                $countrys = $this->mm->getDataByOW('name', 'ASC', ['id !=' => '0'], 'countries');
                                foreach ($countrys as $c) {
                                ?>
                                <option value="<?php echo $c->name; ?>" <?php echo $student->country == $c->name ? 'Selected' : ''; ?>><?php echo $c->name; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="zipcode">Postal/Zipcode</label>
                              <input type="text" class="form-control pif" name="zipcode" id="zipcode"
                                placeholder="Enter Postal/Zipcode" value="<?php echo $student->zipcode; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="home_contact_number">Home Contact Number</label>
                              <input type="number" class="form-control pif" name="home_contact_number"
                                id="home_contact_number" placeholder="Enter home contact number"
                                value="<?php echo $student->home_contact_number; ?>" readonly>
                            </div>
                          </div>
                          <hr>
                          <h4>Education Summary</h4>
                          <hr>
                          <div class="row">
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="country_of_education">Country of Education</label>
                              <select name="country_of_education" id="country_of_education"
                                class="form-control pif select2" readonly disabled="">
                                <option value="" <?php echo $student->country_of_education == '' ? 'Selected' : ''; ?>>Select</option>
                                <?php
                                $countrys = $this->mm->getDataByOW('name', 'ASC', ['id !=' => '0'], 'countries');
                                foreach ($countrys as $c) {
                                ?>
                                <option value="<?php echo $c->name; ?>" <?php echo $student->country_of_education == $c->name ? 'Selected' : ''; ?>><?php echo $c->name; ?>
                                </option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="highest_level_of_education">Highest Level of
                                Education</label>
                              <select name="highest_level_of_education" id="highest_level_of_education"
                                class="form-control pif select2" readonly disabled="">
                                <option value="" <?php echo $student->highest_level_of_education == '' ? 'Selected' : ''; ?>>Select
                                </option>
                                <?php
                                $loe = $this->mm->getDataByOW('id', 'ASC', ['id !=' => '0'], 'tbl_level_of_education');
                                foreach ($loe as $c) {
                                ?>
                                <option value="<?php echo $c->level; ?>" <?php echo $student->highest_level_of_education == $c->level ? 'Selected' : ''; ?>>
                                  <?php echo $c->level; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="grading_scheme">Grading Scheme</label>
                              <select name="grading_scheme" id="grading_scheme" class="form-control pif select2"
                                readonly disabled="">
                                <option value="" <?php echo $student->grading_scheme == '' ? 'Selected' : ''; ?>>Select</option>
                                <option value="Percentage scale (0-100)" <?php echo $student->grading_scheme == 'Percentage scale (0-100)' ? 'Selected' : ''; ?>>Percentage
                                  scale (0-100)</option>
                                <option value="Grade Points (10 scale)" <?php echo $student->grading_scheme == 'Grade Points (10 scale)' ? 'Selected' : ''; ?>>Grade Points
                                  (10 scale)</option>
                                <option value="Grade (A to E)" <?php echo $student->grading_scheme == 'Grade (A to E)' ? 'Selected' : ''; ?>>Grade (A to E)
                                </option>
                              </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="grade_average">Grade Average</label>
                              <input type="text" class="form-control pif" name="grade_average" id="grade_average"
                                placeholder="Enter Grade Average" value="<?php echo $student->grade_average; ?>" readonly>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-12 col-sm-12">
                              <button style="float:right;" type="submit"
                                class="btn btn-sm btn-primary piubtn hidden-btn">Update</button>
                            </div>
                          </div>
                        </form>
                        <form id="testscoreform" method="post">
                          <input type="hidden" name="id" value="<?php echo $student->id; ?>">
                          <hr>
                          <h4>Test Scores</h4>
                          <hr>
                          <div class="row">
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="english_exam_type">English Exam Type</label>
                              <select name="english_exam_type" id="english_exam_type" class="form-control pif select2">
                                <option value="" <?php echo $student->english_exam_type == '' ? 'Selected' : ''; ?>>Select</option>
                                <?php
                                $exmtype = ["I dont have this", "I will provide this later", "TOEFL", "IELTS", "Duolingo English Test", "PTE"];
                                foreach ($exmtype as $exmtyp) {
                                ?>
                                <option value="<?php echo $exmtyp; ?>" <?php echo $student->english_exam_type == $exmtyp ? 'Selected' : ''; ?>><?php echo $exmtyp; ?>
                                </option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-12 allfh" id="date_of_exam_div">
                              <label class="form-label sr-onl" for="date_of_exam">Date of Exam</label>
                              <input type="date" class="form-control pif" name="date_of_exam" id="date_of_exam"
                                placeholder="Enter Grade Average" value="<?php echo $student->date_of_exam; ?>">
                            </div>
                            <div class="form-group col-md-3 col-sm-12 allfh testpartsdiv" id="listening_score_div">
                              <label class="form-label sr-onl" for="listening_score">Listening</label>
                              <input type="number" class="form-control pif" name="listening_score"
                                id="listening_score" placeholder="Enter Exact Score Listening"
                                value="<?php echo $student->listening_score; ?>" step="any" min="0">
                            </div>
                            <div class="form-group col-md-3 col-sm-12 allfh testpartsdiv" id="reading_score_div">
                              <label class="form-label sr-onl" for="reading_score">Reading</label>
                              <input type="number" class="form-control pif" name="reading_score" id="reading_score"
                                placeholder="Enter Exact Score Reading" value="<?php echo $student->reading_score; ?>" step="any"
                                min="0">
                            </div>
                            <div class="form-group col-md-3 col-sm-12 allfh testpartsdiv" id="writing_score_div">
                              <label class="form-label sr-onl" for="writing_score">Writing</label>
                              <input type="number" class="form-control pif" name="writing_score" id="writing_score"
                                placeholder="Enter Exact Score Writing" value="<?php echo $student->writing_score; ?>" step="any"
                                min="0">
                            </div>
                            <div class="form-group col-md-3 col-sm-12 allfh testpartsdiv" id="speaking_score_div">
                              <label class="form-label sr-onl" for="speaking_score">Speaking</label>
                              <input type="number" class="form-control pif" name="speaking_score" id="speaking_score"
                                placeholder="Enter Exact Score Speaking" value="<?php echo $student->speaking_score; ?>" step="any"
                                min="0">
                            </div>
                            <div class="form-group col-md-3 col-sm-12 allfh" id="overall_score_div">
                              <label class="form-label sr-onl" for="overall_score">Overall Score</label>
                              <input type="number" class="form-control pif" name="overall_score" id="overall_score"
                                placeholder="Enter Exact overall score" value="<?php echo $student->overall_score; ?>" step="any"
                                min="0">
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-12 col-sm-12">
                              <button style="float:right;" type="submit"
                                class="btn btn-sm btn-primary tsubtn">Update</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <!-- GENRAL INFORMATION END -->
                    <hr>
                    <!-- SCHOOL ATTENDED START -->
                    <div>
                      <div class="card-header">
                        <h4>
                          School Attended
                          <button style="float:right;" onclick="toggleSChForm()" type="button"
                            class="btn btn-sm btn-outline-info">Add
                            More <i data-feather="plus"></i></button>
                        </h4>
                      </div>
                      <div class="card-body">
                        <div id="schoolattendedform" class="hidden-btn">
                          <form action="<?php echo base_url('Common/addSchool'); ?>" method="post">
                            <input type="hidden" name="std_id" value="<?php echo $student->id; ?>">
                            <input type="hidden" name="retpath" value="<?php echo $this->uri->uri_string(); ?>">
                            <div class="row">
                              <div class="form-group col-md-3 col-sm-12">
                                <label class="form-label sr-onl" for="country_of_institution">Country of Institution
                                  <span class="rqr">*</span></label>
                                <select name="country_of_institution" id="country_of_institution"
                                  class="form-control select2" required>
                                  <option value="">Select</option>
                                  <?php
                                  $countrys = $this->mm->getDataByOW('name', 'ASC', ['id !=' => '0'], 'countries');
                                  foreach ($countrys as $c) {
                                  ?>
                                  <option value="<?php echo $c->name; ?>"><?php echo $c->name; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="form-group col-md-3 col-sm-12">
                                <label class="form-label sr-onl" for="name_of_institution">Name of Institution <span
                                    class="rqr">*</span></label>
                                <input type="text" class="form-control" name="name_of_institution"
                                  id="name_of_institution" placeholder="Enter Name of Institution" required>
                              </div>
                              <div class="form-group col-md-3 col-sm-12">
                                <label class="form-label sr-onl" for="level_of_education">Level of Education <span
                                    class="rqr">*</span></label>
                                <select name="level_of_education" id="level_of_education" class="form-control select2"
                                  required>
                                  <option value="">Select</option>
                                  <?php
                                  $loe = $this->mm->getDataByOW('id', 'ASC', ['id !=' => '0'], 'tbl_level_of_education');
                                  foreach ($loe as $c) {
                                  ?>
                                  <option value="<?php echo $c->level; ?>"><?php echo $c->level; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="form-group col-md-3 col-sm-12">
                                <label class="form-label sr-onl" for="primary_language_of_instruction">Primary Language
                                  of Instruction
                                  <span class="rqr">*</span></label>
                                <input type="text" class="form-control" name="primary_language_of_instruction"
                                  id="primary_language_of_instruction"
                                  placeholder="Enter Primary Language of Instruction" required>
                              </div>
                              <div class="form-group col-md-3 col-sm-12">
                                <label class="form-label sr-onl" for="attended_institution_from">Attended Institution
                                  From <span class="rqr">*</span></label>
                                <input type="date" class="form-control" name="attended_institution_from"
                                  id="attended_institution_from" placeholder="Enter Attended Institution From" required>
                              </div>
                              <div class="form-group col-md-3 col-sm-12">
                                <label class="form-label sr-onl" for="attended_institution_to">Attended Institution To
                                  <span class="rqr">*</span></label>
                                <input type="date" class="form-control" name="attended_institution_to"
                                  id="attended_institution_to" placeholder="Enter Attended Institution to" required>
                              </div>
                              <div class="form-group col-md-3 col-sm-12">
                                <label class="form-label sr-onl" for="degree_name">Degree Name</label>
                                <input type="text" class="form-control" name="degree_name" id="degree_name"
                                  placeholder="Enter Degree Name">
                              </div>
                              <div class="form-group col-md-3 col-sm-12">
                                <label class="form-label sr-onl" for="study_mode">Study Mode<span
                                    class="rqr">*</span></label>
                                <select name="study_mode" id="study_mode" class="form-control select2" required>
                                  <option value="">Select</option>
                                  <?php
                                  $loe = ['Full Time', 'Part Time', 'Online'];
                                  foreach ($loe as $c) {
                                  ?>
                                  <option value="<?php echo $c; ?>"><?php echo $c; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-3 col-sm-12">
                                <label class="form-label">I have graduated from this institution</label>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="graduated_from_this"
                                      value="1" checked>Yes</label>
                                </div>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="graduated_from_this"
                                      value="0">No</label>
                                </div>
                              </div>
                              <div class="form-group col-md-3 col-sm-12 grdf">
                                <label class="form-label sr-onl" for="graduation_date">Graduation Date <span
                                    class="rqr">*</span></label>
                                <input type="date" class="form-control" name="graduation_date" id="graduation_date"
                                  placeholder="Enter Graduation Date" required>
                              </div>
                              <div class="form-group col-md-4 col-sm-12 grdf">
                                <label class="form-label">&nbsp;</label>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="have_physical_certificate"
                                      id="have_physical_certificate" value="1"> I have the physical certificate for
                                    this degree
                                  </label>
                                </div>
                              </div>
                            </div>
                            <h4>School Address</h4>
                            <div class="row">
                              <div class="form-group col-md-6 col-sm-12">
                                <label class="form-label sr-onl" for="address">Address <span
                                    class="rqr">*</span></label>
                                <input type="text" class="form-control" name="address" id="address"
                                  placeholder="Enter address" required>
                              </div>
                              <div class="form-group col-md-3 col-sm-12">
                                <label class="form-label sr-onl" for="scity">City <span
                                    class="rqr">*</span></label>
                                <input type="text" class="form-control" name="city" id="scity"
                                  placeholder="Enter city" required>
                              </div>
                              <div class="form-group col-md-3 col-sm-12">
                                <label class="form-label sr-onl" for="sstate">State/Province</label>
                                <select name="state" id="sstate" class="form-control select2">
                                  <option value="">Select</option>
                                  <?php
                                  $state = $this->mm->getAllData('tbl_state');
                                  foreach ($state as $row) {
                                  ?>
                                  <option value="<?php echo $row->statename; ?>"><?php echo $row->statename; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="form-group col-md-3 col-sm-12">
                                <label class="form-label sr-onl" for="szipcode">Postal/Zipcode</label>
                                <input type="number" class="form-control" name="zipcode" id="szipcode"
                                  placeholder="Enter Postal/Zipcode">
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-12 col-sm-12">
                                <button style="float:right;" type="submit" class="btn btn-primary">Save</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div id="schoolattendedtbl">
                          <?php
                          $schools = $this->mm->getAllData7(['std_id' => $student->id], 'student_schools');
                          foreach ($schools as $row) {
                          ?>
                          <div class="row" id="schitem<?php echo $row->id; ?>">
                            <div class="col-md-4">
                              <h3><?php echo $row->name_of_institution; ?></h3>
                              <h4><?php echo $row->degree_name; ?></h4>
                            </div>
                            <div class="col-md-8">
                              <p style="font-size:15px;">
                                <?php if ($row->graduated_from_this == 1) { ?>
                                <i data-feather="check" style="color:green;"></i> <b>Graduated from Institution</b>
                                <?php echo getFormattedDate($row->graduation_date, 'd M , Y'); ?>
                                <br>
                                <?php if ($row->have_physical_certificate == 1) { ?>
                                <i data-feather="check" style="color:green;"></i> <b>Certificate awarded</b>
                                <br>
                                <?php } ?>
                                <?php } ?>
                                <b>Level:</b> <?php echo $row->level_of_education; ?>
                                <br>
                                <b>Attended from</b> <?php echo getFormattedDate($row->attended_institution_from, 'd M , Y'); ?>
                                <b>to</b> <?php echo getFormattedDate($row->attended_institution_to, 'd M , Y'); ?>
                                <br>
                                <b>Language of instruction:</b> <?php echo $row->primary_language_of_instruction; ?>
                                <br>
                                <b>Address:</b>
                                <?php echo $row->address; ?>, <?php echo $row->city; ?>,
                                <?php echo $row->state; ?> <?php echo $row->zipcode; ?><br>
                                <?php echo $row->country_of_institution; ?>
                              </p>
                              <span style="float:right;">
                                <button onclick="dltsch('<?php echo $row->id; ?>')"
                                  class="btn btn-sm btn-danger">Delete</button>
                                <button onclick="schItemTgl('<?php echo $row->id; ?>')"
                                  class="btn btn-sm btn-primary">Edit</button>
                              </span>
                            </div>
                          </div>
                          <div class="hidden-btn" id="schitemeditform<?php echo $row->id; ?>">
                            <form action="<?php echo base_url('Common/updSchool'); ?>" method="post">
                              <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                              <input type="hidden" name="retpath" value="<?php echo $this->uri->uri_string(); ?>">
                              <div class="row">
                                <div class="form-group col-md-3 col-sm-12">
                                  <label class="form-label sr-onl" for="country_of_institution">Country of Institution
                                    <span class="rqr">*</span></label>
                                  <select name="country_of_institution" class="form-control select2" required>
                                    <option value="">Select</option>
                                    <?php
                                      $countrys = $this->mm->getDataByOW('name', 'ASC', ['id !=' => '0'], 'countries');
                                      foreach ($countrys as $c) {
                                      ?>
                                    <option value="<?php echo $c->name; ?>" <?php echo $row->country_of_institution == $c->name ? 'Selected' : ''; ?>>
                                      <?php echo $c->name; ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                  <label class="form-label sr-onl" for="name_of_institution">Name of Institution <span
                                      class="rqr">*</span></label>
                                  <input type="text" class="form-control" name="name_of_institution"
                                    placeholder="Enter Name of Institution" value="<?php echo $row->name_of_institution; ?>" required>
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                  <label class="form-label sr-onl" for="level_of_education">Level of Education <span
                                      class="rqr">*</span></label>
                                  <select name="level_of_education" class="form-control select2" required>
                                    <option value="">Select</option>
                                    <?php
                                      $loe = $this->mm->getDataByOW('id', 'ASC', ['id !=' => '0'], 'tbl_level_of_education');
                                      foreach ($loe as $c) {
                                      ?>
                                    <option value="<?php echo $c->level; ?>" <?php echo $row->level_of_education == $c->level ? 'Selected' : ''; ?>><?php echo $c->level; ?>
                                    </option>
                                    <?php } ?>
                                  </select>
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                  <label class="form-label sr-onl" for="primary_language_of_instruction">Primary
                                    Language of
                                    Instruction <span class="rqr">*</span></label>
                                  <input type="text" class="form-control" name="primary_language_of_instruction"
                                    placeholder="Enter Primary Language of Instruction" value="<?php echo $row->primary_language_of_instruction; ?>"
                                    required>
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                  <label class="form-label sr-onl" for="attended_institution_from">Attended Institution
                                    From <span class="rqr">*</span></label>
                                  <input type="date" class="form-control" name="attended_institution_from"
                                    placeholder="Enter Attended Institution From" value="<?php echo $row->attended_institution_from; ?>"
                                    required>
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                  <label class="form-label sr-onl" for="attended_institution_to">Attended Institution To
                                    <span class="rqr">*</span></label>
                                  <input type="date" class="form-control" name="attended_institution_to"
                                    placeholder="Enter Attended Institution to" value="<?php echo $row->attended_institution_to; ?>" required>
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                  <label class="form-label sr-onl" for="degree_name">Degree Name</label>
                                  <input type="text" class="form-control" name="degree_name"
                                    value="<?php echo $row->degree_name; ?>" placeholder="Enter Degree Name">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                  <label class="form-label sr-onl" for="study_mode">Study Mode<span
                                      class="rqr">*</span></label>
                                  <select name="study_mode" class="form-control select2" required>
                                    <option value="">Select</option>
                                    <?php
                                      $loe = ['Full Time', 'Part Time', 'Online'];
                                      foreach ($loe as $c) {
                                      ?>
                                    <option value="<?php echo $c; ?>" <?php echo $row->study_mode == $c ? 'Selected' : ''; ?>><?php echo $c; ?>
                                    </option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-3 col-sm-12">
                                  <label class="form-label">I have graduated from this institution</label>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="radio" name="graduated_from_this"
                                        value="1" <?php echo $row->graduated_from_this == '1' ? 'checked' : ''; ?>>Yes</label>
                                  </div>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="radio" name="graduated_from_this"
                                        value="0" <?php echo $row->graduated_from_this == '0' ? 'checked' : ''; ?>>No</label>
                                  </div>
                                </div>
                                <div class="form-group col-md-3 col-sm-12 grdf">
                                  <label class="form-label sr-onl" for="graduation_date">Graduation Date <span
                                      class="rqr">*</span></label>
                                  <input type="date" class="form-control" name="graduation_date"
                                    placeholder="Enter Graduation Date" value="<?php echo $row->graduation_date; ?>" required>
                                </div>
                                <div class="form-group col-md-4 col-sm-12 grdf">
                                  <label class="form-label">&nbsp;</label>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox" name="have_physical_certificate"
                                        value="1" <?php echo $row->have_physical_certificate == '1' ? 'checked' : ''; ?>> I have the physical
                                      certificate for this degree
                                    </label>
                                  </div>
                                </div>
                              </div>
                              <h4>School Address</h4>
                              <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                  <label class="form-label sr-onl" for="address">Address <span
                                      class="rqr">*</span></label>
                                  <input type="text" class="form-control" name="address"
                                    placeholder="Enter address" value="<?php echo $row->address; ?>" required>
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                  <label class="form-label sr-onl" for="scity">City <span
                                      class="rqr">*</span></label>
                                  <input type="text" class="form-control" name="city" placeholder="Enter city"
                                    value="<?php echo $row->city; ?>" required>
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                  <label class="form-label sr-onl" for="sstate">State/Province</label>
                                  <select name="state" class="form-control select2">
                                    <option value="">Select</option>
                                    <?php
                                      $state = $this->mm->getAllData('tbl_state');
                                      foreach ($state as $stt) {
                                      ?>
                                    <option value="<?php echo $stt->statename; ?>" <?php echo $row->state == $stt->statename ? 'Selected' : ''; ?>><?php echo $stt->statename; ?>
                                    </option>
                                    <?php } ?>
                                  </select>
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                  <label class="form-label sr-onl" for="szipcode">Postal/Zipcode</label>
                                  <input type="number" class="form-control" name="zipcode"
                                    value="<?php echo $row->zipcode; ?>" placeholder="Enter Postal/Zipcode">
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12 col-sm-12">
                                  <div style="float:right;">
                                    <button onclick="schItemTgl('<?php echo $row->id; ?>')" type="button"
                                      class="btn btn-sm btn-info">Cancel</button>
                                    <button type="submit" class="btn btn-sm btn-success">Update</button>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                          <hr>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                    <!-- SCHOOL ATTENDED END -->

                    <!-- ADDITIONAL QUALIFICATIONS START -->
                    <div>
                      <div class="card-header">
                        <h4>
                          Additional Qualifications
                        </h4>
                      </div>
                      <div class="card-body">
                        <div>
                          <form action="<?php echo base_url('Common/updGre'); ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $student->id; ?>">
                            <input type="hidden" name="retpath" value="<?php echo $this->uri->uri_string(); ?>">
                            <div class="row">
                              <div class="form-group col-md-3 col-sm-12">
                                <div class="input-group">
                                  <input type="text" class="form-control" placeholder="I have GRE exam scores">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      <input type="checkbox" name="gre" id="gre" <?php echo $student->gre == '1' ? 'checked' : ''; ?>>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="<?php echo $student->gre == '0' ? 'hidden-btn' : ''; ?>" id="greDiv">
                              <div class="row">
                                <div class="form-group col-md-3 col-sm-12">
                                  <label class="form-label sr-onl">GRE Exam Date <span class="rqr">*</span></label>
                                  <input type="date" class="form-control" name="gre_exam_date"
                                    placeholder="Exam Date" value="<?php echo $student->gre_exam_date; ?>" required>
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                  <label class="form-label sr-onl">Verbal <span class="rqr">*</span></label>
                                  <input type="number" class="form-control" name="gre_v_score" placeholder="Score"
                                    value="<?php echo $student->gre_v_score; ?>" max="170" step="any" min="0"
                                    required>
                                  <input type="number" class="form-control" name="gre_v_rank" placeholder="Rank"
                                    value="<?php echo $student->gre_v_rank; ?>" step="any" max="100" min="0"
                                    required>
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                  <label class="form-label sr-onl">Quantitative <span class="rqr">*</span></label>
                                  <input type="number" class="form-control" name="gre_q_score" placeholder="Score"
                                    value="<?php echo $student->gre_q_score; ?>" max="170" step="any" min="0"
                                    required>
                                  <input type="number" class="form-control" name="gre_q_rank" placeholder="Rank"
                                    value="<?php echo $student->gre_q_rank; ?>" step="any" max="100" min="0"
                                    required>
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                  <label class="form-label sr-onl">Writing <span class="rqr">*</span></label>
                                  <input type="number" class="form-control" name="gre_w_score" placeholder="Score"
                                    value="<?php echo $student->gre_w_score; ?>" max="6" step="any" min="0"
                                    required>
                                  <input type="number" class="form-control" name="gre_w_rank" placeholder="Rank"
                                    value="<?php echo $student->gre_w_rank; ?>" step="any" max="100" min="0"
                                    required>
                                </div>
                                <div class="form-group col-md-12 col-sm-12">
                                  <button style="float:right;" type="submit" class="btn btn-primary">Update</button>
                                </div>
                              </div>
                            </div>
                          </form>
                          <hr>
                          <form action="<?php echo base_url('Common/updGmat'); ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $student->id; ?>">
                            <input type="hidden" name="retpath" value="<?php echo $this->uri->uri_string(); ?>">
                            <div class="row">
                              <div class="form-group col-md-3 col-sm-12">
                                <div class="input-group">
                                  <input type="text" class="form-control" placeholder="I have GMAT exam scores">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      <input type="checkbox" name="gmat" id="gmat" <?php echo $student->gmat == '1' ? 'checked' : ''; ?>>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="<?php echo $student->gmat == '0' ? 'hidden-btn' : ''; ?>" id="gmatDiv">
                              <div class="row">
                                <div class="form-group col-md-2 col-sm-12">
                                  <label class="form-label sr-onl">GMAT Exam Date <span class="rqr">*</span></label>
                                  <input type="date" class="form-control" name="gmat_exam_date"
                                    placeholder="Exam Date" value="<?php echo $student->gmat_exam_date; ?>" required>
                                </div>
                                <div class="form-group col-md-2 col-sm-12">
                                  <label class="form-label sr-onl">Verbal <span class="rqr">*</span></label>
                                  <input type="number" class="form-control" name="gmat_v_score" placeholder="Score"
                                    value="<?php echo $student->gmat_v_score; ?>" max="51" min="0" step="any"
                                    required>
                                  <input type="number" class="form-control" name="gmat_v_rank" placeholder="Rank"
                                    value="<?php echo $student->gmat_v_rank; ?>" step="any" max="100" min="0"
                                    required>
                                </div>
                                <div class="form-group col-md-2 col-sm-12">
                                  <label class="form-label sr-onl">Quantitative <span class="rqr">*</span></label>
                                  <input type="number" class="form-control" name="gmat_q_score" placeholder="Score"
                                    value="<?php echo $student->gmat_q_score; ?>" max="51" min="0" step="any"
                                    required>
                                  <input type="number" class="form-control" name="gmat_q_rank" placeholder="Rank"
                                    value="<?php echo $student->gmat_q_rank; ?>" step="any" max="100" min="0"
                                    required>
                                </div>
                                <div class="form-group col-md-2 col-sm-12">
                                  <label class="form-label sr-onl">Writing <span class="rqr">*</span></label>
                                  <input type="number" class="form-control" name="gmat_w_score" placeholder="Score"
                                    value="<?php echo $student->gmat_w_score; ?>" max="6" min="0" step="any"
                                    required>
                                  <input type="number" class="form-control" name="gmat_w_rank" placeholder="Rank"
                                    value="<?php echo $student->gmat_w_rank; ?>" step="any" max="100" min="0"
                                    required>
                                </div>
                                <div class="form-group col-md-2 col-sm-12">
                                  <label class="form-label sr-onl">Integrated reasoning <span
                                      class="rqr">*</span></label>
                                  <input type="number" class="form-control" name="gmat_ir_score" placeholder="Score"
                                    value="<?php echo $student->gmat_ir_score; ?>" max="8" min="0" step="any">
                                  <input type="number" class="form-control" name="gmat_ir_rank" placeholder="Rank"
                                    value="<?php echo $student->gmat_ir_rank; ?>" step="any" max="100" min="0">
                                </div>
                                <div class="form-group col-md-2 col-sm-12">
                                  <label class="form-label sr-onl">Total <span class="rqr">*</span></label>
                                  <input type="number" class="form-control" name="gmat_total_score"
                                    placeholder="Score" value="<?php echo $student->gmat_total_score; ?>" min="200"
                                    max="800" step="any" required>
                                  <input type="number" class="form-control" name="gmat_total_rank"
                                    placeholder="Rank" value="<?php echo $student->gmat_total_rank; ?>" step="any" max="100"
                                    min="0" required>
                                </div>
                                <div class="form-group col-md-12 col-sm-12">
                                  <button style="float:right;" type="submit"
                                    class="btn btn-primary">Update</button>
                                </div>
                              </div>
                            </div>
                          </form>
                          <hr>
                          <form action="<?php echo base_url('Common/updSat'); ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $student->id; ?>">
                            <input type="hidden" name="retpath" value="<?php echo $this->uri->uri_string(); ?>">
                            <div class="row">
                              <div class="form-group col-md-3 col-sm-12">
                                <div class="input-group">
                                  <input type="text" class="form-control" placeholder="I have SAT exam scores">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      <input type="checkbox" name="sat" id="sat" <?php echo $student->sat == '1' ? 'checked' : ''; ?>>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="<?php echo $student->sat == '0' ? 'hidden-btn' : ''; ?>" id="satDiv">
                              <div class="row">
                                <div class="form-group col-md-3 col-sm-12">
                                  <label class="form-label sr-onl">SAT Exam Date <span class="rqr">*</span></label>
                                  <input type="date" class="form-control" name="sat_exam_date"
                                    placeholder="Exam Date" value="<?php echo $student->sat_exam_date; ?>" required>
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                  <label class="form-label sr-onl">Reasoing Test Points <span
                                      class="rqr">*</span></label>
                                  <input type="number" class="form-control" name="sat_reasoning_point"
                                    placeholder="SAT Reasoning Point" value="<?php echo $student->sat_reasoning_point; ?>" step="any"
                                    min="0" max="1600" required>
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                  <label class="form-label sr-onl">SAT Subject Test Point <span
                                      class="rqr">*</span></label>
                                  <input type="number" class="form-control" name="sat_subject_point"
                                    placeholder="SAT Subject Points" value="<?php echo $student->sat_subject_point; ?>" step="any"
                                    min="0" max="800" required>
                                </div>
                                <div class="form-group col-md-12 col-sm-12">
                                  <button style="float:right;" type="submit" class="btn btn-primary">Save</button>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- ADDITIONAL QUALIFICATIONS END -->
                    <hr>
                    <!-- Background Information END -->
                    <div>
                      <div class="card-header">
                        <h4>
                          Background Information
                        </h4>
                      </div>
                      <div class="card-body">
                        <div>
                          <form action="<?php echo base_url('Common/updBackInfo'); ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $student->id; ?>">
                            <input type="hidden" name="retpath" value="<?php echo $this->uri->uri_string(); ?>">
                            <div class="row">
                              <div class="form-group col-md-6 col-sm-12">
                                <label class="form-label sr-onl">Have you been refused a visa from Canada, the USA, the
                                  United
                                  Kingdom, New Zealand or Australia?</label>
                                <select class="form-control select2" name="refused_visa">
                                  <option value="" <?php echo $student->refused_visa == '' ? 'Selected' : ''; ?>>Select</option>
                                  <option value="Yes" <?php echo $student->refused_visa == 'Yes' ? 'Selected' : ''; ?>>Yes</option>
                                  <option value="No" <?php echo $student->refused_visa == 'No' ? 'Selected' : ''; ?>>No</option>
                                </select>
                              </div>
                              <div class="form-group col-md-6 col-sm-12">
                                <label class="form-label sr-onl">Do you have a valid Study Permit / Visa?</label>
                                <select class="form-control select2" name="valid_study_permit">
                                  <option value="" <?php echo $student->valid_study_permit == '' ? 'Selected' : ''; ?>>Select</option>
                                  <option value="Yes" <?php echo $student->valid_study_permit == 'Yes' ? 'Selected' : ''; ?>>Yes
                                  </option>
                                  <option value="No" <?php echo $student->valid_study_permit == 'No' ? 'Selected' : ''; ?>>No</option>
                                </select>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                <label class="form-label sr-onl">If you answered "Yes" to any of the questions above,
                                  please provide
                                  more details below:</label>
                                <textarea class="form-control" name="visa_note"><?php echo $student->visa_note; ?></textarea>
                              </div>
                              <div class="form-group col-md-12 col-sm-12">
                                <button style="float:right;" type="submit" class="btn btn-primary">Save</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Background Information END -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function migrate() {
      return new Promise(function(resolve, reject) {
        $("#migrateBtn").text('Migrating...');
        setTimeout(() => {
          $.get("{{ url('/f/migrate') }}", function(data) {
            $("#migrateBtn").attr('class', 'btn btn-success');
            $("#migrateBtn").text('Migrated');
          }).fail(err => {
            $("#migrateBtn").attr('class', 'btn btn-danger');
            $("#migrateBtn").text('Migration Failed');
          });
        }, 2000);
      });
    }

    function optimize() {
      return new Promise(function(resolve, reject) {
        $("#optimizeBtn").text('Optimizing...');
        setTimeout(() => {
          $.get("{{ url('/f/optimize') }}", function(data) {
            $("#optimizeBtn").attr('class', 'btn btn-success');
            $("#optimizeBtn").text('Optimized');
          }).fail(err => {
            $("#optimizeBtn").attr('class', 'btn btn-danger');
            $("#optimizeBtn").text('Optimization Failed');
          });
        }, 2000);
      });
    }

    function viewUpdate() {
      $('.updbtn').show();
      $('.editbtn').hide();
      $("#name,#email,#loginid,#password").removeAttr('readonly');
    }
  </script>
@endsection
