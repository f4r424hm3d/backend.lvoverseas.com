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
                    <!-- GENRAL INFORMATION START -->
                    <div>
                      <div class="card-header">
                        <h4>
                          Personal Information
                          <button style="float:right;" onclick="toggleFormAttr(this.value)" type="button" id="pitbtn"
                            value="remove" class="btn btn-sm btn-outline-faraz">Edit</button>
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
                              <label class="form-label sr-onl" for="mobile">Phone Number</label>
                              <input type="text" class="form-control pif" name="mobile" id="mobile"
                                placeholder="Enter Phone Number" value="<?php echo $student->mobile; ?>" readonly>
                            </div>

                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="gender">Gender</label>
                              <select id="gender" name="gender" class="form-control pif select2" readonly
                                disabled="">
                                <option value="" <?php echo $student->gender == '' ? 'Selected' : ''; ?>>Select</option>
                                <option value="Male" <?php echo $student->gender == 'Male' ? 'Selected' : ''; ?>>Male</option>
                                <option value="Female" <?php echo $student->gender == 'Female' ? 'Selected' : ''; ?>>Female</option>
                                <option value="other" <?php echo $student->gender == 'other' ? 'Selected' : ''; ?>>Other</option>
                              </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="dob">D.O.B</label>
                              <input type="date" class="form-control pif" name="dob" id="dob"
                                placeholder="Enter date of birth" value="<?php echo $student->dob; ?>" readonly>
                            </div>

                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="marital_status">Marital Status</label>
                              <select name="marital_status" id="marital_status" class="form-control pif select2" readonly
                                disabled="">
                                <option value="" <?php echo $student->marital_status == '' ? 'Selected' : ''; ?>>Select</option>
                                <option value="Single" <?php echo $student->marital_status == 'Single' ? 'Selected' : ''; ?>>Single
                                </option>
                                <option value="Married" <?php echo $student->marital_status == 'Married' ? 'Selected' : ''; ?>>Married
                                </option>
                              </select>
                            </div>

                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl pif" for="branch_id">Branch</label>
                              <select name="branch_id" id="branch_id" class="form-control pif select2" required disabled>
                                <option value="">Select</option>
                                <?php
                                $branches = $this->mm->getDataByOW('id', 'ASC', ['id !=' => '0'], 'branches');
                                foreach ($branches as $row) {
                                ?>
                                <option value="<?php echo $row->id; ?>" <?php echo $student->branch_id == $row->id ? 'Selected' : ''; ?>><?php echo $row->branch_name; ?></option>
                                <?php } ?>
                              </select>
                            </div>

                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="designation">Designation</label>
                              <input type="text" class="form-control pif" name="designation" id="designation"
                                placeholder="Enter Designation" value="<?php echo $student->designation; ?>" readonly>
                            </div>

                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="kids">Kids</label>
                              <input type="number" class="form-control pif" name="kids" id="kids"
                                placeholder="Enter Kids" value="<?php echo $student->kids; ?>" readonly>
                            </div>

                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="joining_date">Joining Date</label>
                              <input type="date" class="form-control pif" name="joining_date" id="joining_date"
                                placeholder="Enter Joining Date" value="<?php echo $student->joining_date; ?>" readonly>
                            </div>

                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="salary">Salary</label>
                              <input type="number" class="form-control pif" name="salary" id="salary"
                                placeholder="Enter Salary" value="<?php echo $student->salary; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="revised_salary">Revised Salary</label>
                              <input type="number" class="form-control pif" name="revised_salary" id="revised_salary"
                                placeholder="Enter Revised Salary" value="<?php echo $student->revised_salary; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="incentive">Incentive</label>
                              <input type="number" class="form-control pif" name="incentive" id="incentive"
                                placeholder="Enter Incentive" value="<?php echo $student->incentive; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="parents_occupation">Parents Occupation</label>
                              <input type="text" class="form-control pif" name="parents_occupation"
                                id="parents_occupation" placeholder="Enter Parents Occupation"
                                value="<?php echo $student->parents_occupation; ?>" readonly>
                            </div>
                          </div>
                          <hr>
                          <h4>Address Detail</h4>
                          <hr>
                          <div class="row">
                            <div class="form-group col-md-2 col-sm-12">
                              <label class="form-label sr-onl" for="house_no">House/Building No</label>
                              <input type="text" class="form-control pif" name="house_no" id="house_no"
                                placeholder="Enter address" value="<?php echo $student->house_no; ?>" readonly>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                              <label class="form-label sr-onl" for="address">Address</label>
                              <input type="text" class="form-control pif" name="address" id="address"
                                placeholder="Enter address" value="<?php echo $student->address; ?>" readonly>
                            </div>
                            <div class="form-group col-md-4 col-sm-12">
                              <label class="form-label sr-onl" for="landmark">Landmak</label>
                              <input type="text" class="form-control pif" name="landmark" id="landmark"
                                placeholder="Enter Landmak" value="<?php echo $student->landmark; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="city">City</label>
                              <input type="text" class="form-control pif" name="city" id="city"
                                placeholder="Enter City" value="<?php echo $student->city; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="state">State</label>
                              <input type="text" class="form-control pif" name="state" id="state"
                                placeholder="Enter state" value="<?php echo $student->state; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="country">Country</label>
                              <select name="country" id="country" class="form-control pif select2" readonly
                                disabled="">
                                <option value="" <?php echo $student->country == '' ? 'Selected' : ''; ?>>Select</option>
                              </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="pincode">Postal/Zipcode</label>
                              <input type="text" class="form-control pif" name="pincode" id="pincode"
                                placeholder="Enter Postal/Zipcode" value="<?php echo $student->pincode; ?>" readonly>
                            </div>
                            <div class="form-group col-md-3 col-sm-12">
                              <label class="form-label sr-onl" for="home_contact_number">Home Contact Number</label>
                              <input type="number" class="form-control pif" name="home_contact_number"
                                id="home_contact_number" placeholder="Enter home contact number"
                                value="<?php echo $student->home_contact_number; ?>" readonly>
                            </div>
                          </div>

                          <div class="row">
                            <div class="form-group col-md-12 col-sm-12">
                              <button style="float:right;" type="submit"
                                class="btn btn-sm btn-primary piubtn hidden-btn">Update</button>
                            </div>
                          </div>
                        </form>

                        <form id="bankDetailForm" method="post">
                          <input type="hidden" name="id" value="<?php echo $student->id; ?>">
                          <hr>
                          <h4>Bank Details</h4>
                          <hr>
                          <div class="row">
                            <div class="form-group col-md-4 col-sm-12 allfh">
                              <label class="form-label sr-onl" for="bank_name">Bank Name</label>
                              <input type="text" class="form-control pif" name="bank_name" id="bank_name"
                                placeholder="Enter Bank Name" value="<?php echo $student->bank_name; ?>">
                            </div>
                            <div class="form-group col-md-8 col-sm-12 allfh">
                              <label class="form-label sr-onl" for="ac_no">A/C No</label>
                              <input type="number" class="form-control pif" name="ac_no" id="ac_no"
                                placeholder="Enter A/C No" value="<?php echo $student->ac_no; ?>">
                            </div>
                            <div class="form-group col-md-4 col-sm-12 allfh">
                              <label class="form-label sr-onl" for="ifsc_code">IFSC Code</label>
                              <input type="text" class="form-control pif" name="ifsc_code" id="ifsc_code"
                                placeholder="Enter IFSC Code" value="<?php echo $student->ifsc_code; ?>">
                            </div>
                            <div class="form-group col-md-4 col-sm-12 allfh">
                              <label class="form-label sr-onl" for="branch_name">Branch Name</label>
                              <input type="text" class="form-control pif" name="branch_name" id="branch_name"
                                placeholder="Enter Branch Name" value="<?php echo $student->branch_name; ?>">
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
                    <!-- FAMILY BACKGROUND START -->
                    <div>
                      <div class="card-header">
                        <h4>
                          Family Backgraound
                          <button style="float:right;" onclick="toggleSChForm()" type="button"
                            class="btn btn-sm btn-outline-info">Add More <i data-feather="plus"></i></button>
                        </h4>
                      </div>
                      <div class="card-body">
                        <div id="familyBakgroundFrom" class="hidden-btn">
                          <form id="addFBForm" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $student->id; ?>">
                            <div class="row">
                              <div class="form-group col-md-3 col-sm-12">
                                <label class="form-label sr-onl" for="relation">Relation<span
                                    class="rqr">*</span></label>
                                <select name="relation" id="relation" class="form-control select2" required>
                                  <option value="">Select</option>
                                  <?php
                                  $relations = ['Father', 'Mother', 'Brother', 'Sister', 'Spouse'];
                                  foreach ($relations as $c) {
                                  ?>
                                  <option value="<?php echo $c; ?>"><?php echo $c; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="form-group col-md-3 col-sm-12">
                                <label class="form-label sr-onl" for="name">Name <span
                                    class="rqr">*</span></label>
                                <input type="text" class="form-control" name="name" id="name"
                                  placeholder="Enter Name" required>
                              </div>
                              <div class="form-group col-md-3 col-sm-12">
                                <label class="form-label sr-onl" for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                  placeholder="Enter Email">
                              </div>
                              <div class="form-group col-md-3 col-sm-12">
                                <label class="form-label sr-onl" for="mobile">Mobile</label>
                                <input type="number" class="form-control" name="mobile" id="mobile"
                                  placeholder="Enter Mobile" required>
                              </div>
                              <div class="form-group col-md-6 col-sm-12">
                                <label class="form-label sr-onl" for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address"
                                  placeholder="Enter Address">
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-12 col-sm-12">
                                <button style="float:right;" type="submit" class="btn btn-primary">Save</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div id="familyBakgroundEditForm" class="hidden-btn">
                          <form id="updFBForm" method="post">
                            <input type="hidden" name="id" id="fbg_id">
                            <div class="row" id="fbupdinfofield">
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
                          $fb = $this->mm->getAllData7(['user_id' => $student->id], 'user_family_backgrounds');
                          if ($fb != false) {
                          ?>
                          <div class="row" id="schitem<?php echo $row->id; ?>">
                            <div class="col-md-12">
                              <table class="table table-sm table-striped">
                                <thead>
                                  <tr>
                                    <th>Relation</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $fb = $this->mm->getAllData7(['user_id' => $student->id], 'user_family_backgrounds');
                                    foreach ($fb as $row) {
                                    ?>
                                  <tr id="fb<?php echo $row->id; ?>">
                                    <td><?php echo $row->relation; ?></td>
                                    <td><?php echo $row->name; ?></td>
                                    <td><?php echo $row->email; ?></td>
                                    <td><?php echo $row->mobile; ?></td>
                                    <td><?php echo $row->address; ?></td>
                                    <td>
                                      <a onclick="deleteFB('<?php echo $row->id; ?>')" href="javascript:void()"
                                        data-toggle="tooltip" class="btn btn-outline-danger btn-sm" title="Delete"><i
                                          class="align-middle" data-feather="trash"></i></a>

                                      <a onclick="updFBInfoFunc('<?php echo $row->id; ?>')" href="javascript:void()"
                                        data-toggle="tooltip" class="btn btn-outline-primary btn-sm" title="Edit"><i
                                          class="align-middle" data-feather="edit"></i></a>
                                    </td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                    <!-- FAMILY BACKGROUND END -->
                    <hr>
                    <!-- PREVIOUS EMPLOYER START -->
                    <div>
                      <div class="card-header">
                        <h4>
                          Previous Employer
                          <button style="float:right;" onclick="togglePEForm()" type="button"
                            class="btn btn-sm btn-outline-info">Add More <i data-feather="plus"></i></button>
                        </h4>
                      </div>
                      <div class="card-body">
                        <div id="PEForm" class="hidden-btn">
                          <form id="addPEForm" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $student->id; ?>">
                            <div class="row">
                              <div class="form-group col-md-4 col-sm-12 allfh">
                                <label class="form-label sr-onl" for="employer_name">Employer Name</label>
                                <input type="text" class="form-control pif" name="employer_name" id="employer_name"
                                  placeholder="Enter Employer Name">
                              </div>
                              <div class="form-group col-md-4 col-sm-12 allfh">
                                <label class="form-label sr-onl" for="employer_email">Employer Email</label>
                                <input type="email" class="form-control pif" name="employer_email"
                                  id="employer_email" placeholder="Enter Employer Email">
                              </div>
                              <div class="form-group col-md-4 col-sm-12 allfh">
                                <label class="form-label sr-onl" for="employer_mobile">Employer Mobile</label>
                                <input type="text" class="form-control pif" name="employer_mobile"
                                  id="employer_mobile" placeholder="Enter Employer Mobile">
                              </div>
                              <div class="form-group col-md-4 col-sm-12 allfh">
                                <label class="form-label sr-onl" for="employer_designation">Designation</label>
                                <input type="text" class="form-control pif" name="employer_designation"
                                  id="employer_designation" placeholder="Enter Designation">
                              </div>
                              <div class="form-group col-md-4 col-sm-12 allfh">
                                <label class="form-label sr-onl" for="employer_company_name">Company Name</label>
                                <input type="text" class="form-control pif" name="employer_company_name"
                                  id="employer_company_name" placeholder="Enter Company Name">
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-12 col-sm-12">
                                <button style="float:right;" type="submit" class="btn btn-primary">Save</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div id="PEEditForm" class="hidden-btn">
                          <form id="updPEForm" method="post">
                            <input type="hidden" name="id" id="pe_id">
                            <div class="row" id="peupdinfofield">
                            </div>
                            <div class="row">
                              <div class="form-group col-md-12 col-sm-12">
                                <button style="float:right;" type="submit" class="btn btn-primary">Save</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div id="PETbl">
                          <?php
                          $fb = $this->mm->getAllData7(['user_id' => $student->id], 'user_previous_employers');
                          if ($fb != false) {
                          ?>
                          <div class="row" id="schitem<?php echo $row->id; ?>">
                            <div class="col-md-12">
                              <table class="table table-sm table-striped">
                                <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Designation</th>
                                    <th>Company Name</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $fb = $this->mm->getAllData7(['user_id' => $student->id], 'user_previous_employers');
                                    foreach ($fb as $row) {
                                    ?>
                                  <tr id="pe<?php echo $row->id; ?>">
                                    <td><?php echo $row->employer_name; ?></td>
                                    <td><?php echo $row->employer_email; ?></td>
                                    <td><?php echo $row->employer_mobile; ?></td>
                                    <td><?php echo $row->employer_designation; ?></td>
                                    <td><?php echo $row->employer_company_name; ?></td>
                                    <td>
                                      <a onclick="deletePE('<?php echo $row->id; ?>')" href="javascript:void()"
                                        data-toggle="tooltip" class="btn btn-outline-danger btn-sm" title="Delete"><i
                                          class="align-middle" data-feather="trash"></i></a>

                                      <a onclick="updPEInfoFunc('<?php echo $row->id; ?>')" href="javascript:void()"
                                        data-toggle="tooltip" class="btn btn-outline-primary btn-sm" title="Edit"><i
                                          class="align-middle" data-feather="edit"></i></a>
                                    </td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                    <!-- PREVIOUS EMPLOYER END -->
                    <hr>
                    <!-- PREVIOUS EMPLOYER START -->
                    <div class="hidden-btn">
                      <div class="card-header">
                        <h4>
                          Previous Employer
                          <!-- <button style="float:right;" onclick="toggleFormAttr(this.value)" type="button" id="pitbtn" value="remove" class="btn btn-sm btn-outline-faraz">Edit</button> -->
                        </h4>
                      </div>
                      <div class="card-body">
                        <form id="employerForm" method="post">
                          <input type="hidden" name="id" value="<?php echo $student->id; ?>">
                          <div class="row">
                            <div class="form-group col-md-4 col-sm-12 allfh">
                              <label class="form-label sr-onl" for="employer_name">Employer Name</label>
                              <input type="text" class="form-control pif" name="employer_name" id="employer_name"
                                placeholder="Enter Employer Name" value="<?php echo $student->employer_name; ?>">
                            </div>
                            <div class="form-group col-md-4 col-sm-12 allfh">
                              <label class="form-label sr-onl" for="employer_email">Employer Email</label>
                              <input type="email" class="form-control pif" name="employer_email" id="employer_email"
                                placeholder="Enter Employer Email" value="<?php echo $student->employer_email; ?>">
                            </div>
                            <div class="form-group col-md-4 col-sm-12 allfh">
                              <label class="form-label sr-onl" for="employer_mobile">Employer Mobile</label>
                              <input type="text" class="form-control pif" name="employer_mobile"
                                id="employer_mobile" placeholder="Enter Employer Mobile" value="<?php echo $student->employer_mobile; ?>">
                            </div>
                            <div class="form-group col-md-4 col-sm-12 allfh">
                              <label class="form-label sr-onl" for="employer_designation">Designation</label>
                              <input type="text" class="form-control pif" name="employer_designation"
                                id="employer_designation" placeholder="Enter Designation" value="<?php echo $student->employer_designation; ?>">
                            </div>
                            <div class="form-group col-md-4 col-sm-12 allfh">
                              <label class="form-label sr-onl" for="employer_company_name">Company Name</label>
                              <input type="text" class="form-control pif" name="employer_company_name"
                                id="employer_company_name" placeholder="Enter Company Name"
                                value="<?php echo $student->employer_company_name; ?>">
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
                    <!-- PREVIOUS EMPLOYER END -->
                    <hr>
                    <!-- DOCUMENTS START -->
                    <div class="hiddeb-btn">
                      <div class="card-header">
                        <h4>
                          Documents
                          <button style="float:right;" onclick="toggleDocumentForm()" type="button"
                            class="btn btn-sm btn-outline-info">Add More <i data-feather="plus"></i></button>
                        </h4>
                      </div>
                      <div class="card-body">
                        <div id="docForm" class="hidden-btn">
                          <form action="<?php echo base_url('Common/AddEmpDoc'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="<?php echo $student->id; ?>">
                            <input type="hidden" name="retpath" value="<?php echo $this->uri->uri_string(); ?>">
                            <div class="row">
                              <div class="form-group col-md-3 col-sm-12">
                                <label class="form-label sr-onl" for="document_name">Document Name <span
                                    class="rqr">*</span></label>
                                <input type="text" class="form-control" name="document_name" id="document_name"
                                  placeholder="Enter Document Name" required>
                              </div>
                              <div class="form-group col-md-3 col-sm-12">
                                <label class="form-label sr-onl" for="files">File</label>
                                <input type="file" class="form-control" name="files" id="files" required>
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-12 col-sm-12">
                                <button style="float:right;" type="submit" class="btn btn-primary">Save</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div id="updateDocForm" class="hidden-btn">
                          <form id="updDocForm" method="post">
                            <input type="hidden" name="id" id="fbg_id">
                            <div class="row" id="fbupdinfofield">
                            </div>
                            <div class="row">
                              <div class="form-group col-md-12 col-sm-12">
                                <button style="float:right;" type="submit" class="btn btn-primary">Save</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div id="doctbl">
                          <?php
                          $docs = $this->mm->getAllData7(['user_id' => $student->id], 'employee_documents');
                          if ($docs != false) {
                          ?>
                          <div class="row" id="schitem<?php echo $row->id; ?>">
                            <div class="col-md-12">
                              <table class="table table-s table-striped">
                                <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>File</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    foreach ($docs as $row) {
                                    ?>
                                  <tr id="doc<?php echo $row->id; ?>">
                                    <td><?php echo $row->document_name; ?></td>
                                    <td>
                                      <small>
                                        <a href="<?php echo $row->file_path; ?>" class="badge badge-info">View</a> | <a
                                          href="<?php echo $row->file_path; ?>" class="badge badge-primary" download>Download</a>
                                      </small>
                                    </td>
                                    <td>
                                      <a onclick="deleteDoc('<?php echo $row->id; ?>')" href="javascript:void()"
                                        data-toggle="tooltip" class="btn btn-outline-danger btn-sm" title="Delete"><i
                                          class="align-middle" data-feather="trash"></i></a>

                                      <!-- <a onclick="updFBInfoFunc('<?php echo $row->id; ?>')" href="javascript:void()" data-toggle="tooltip" class="btn btn-outline-primary btn-sm" title="Edit"><i class="align-middle" data-feather="edit"></i></a> -->
                                    </td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                    <!-- DOCUMENTS END -->
                    <!-- DOCUMENTS START -->
                    <div class="hiddeb-btn">
                      <div class="card-header">
                        <h4>
                          Letters
                          <button style="float:right;" onclick="toggleLetterForm()" type="button"
                            class="btn btn-sm btn-outline-info">Add More <i data-feather="plus"></i></button>
                        </h4>
                      </div>
                      <div class="card-body">
                        <div id="ltrForm" class="hidden-btn">
                          <form action="<?php echo base_url('Common/AddEmpLetter'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="<?php echo $student->id; ?>">
                            <input type="hidden" name="retpath" value="<?php echo $this->uri->uri_string(); ?>">
                            <div class="row">
                              <div class="form-group col-md-3 col-sm-12">
                                <label class="form-label sr-onl" for="document_name">Document Name <span
                                    class="rqr">*</span></label>
                                <input type="text" class="form-control" name="document_name" id="document_name"
                                  placeholder="Enter Document Name" required>
                              </div>
                              <div class="form-group col-md-3 col-sm-12">
                                <label class="form-label sr-onl" for="files">File</label>
                                <input type="file" class="form-control" name="files" id="files" required>
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-12 col-sm-12">
                                <button style="float:right;" type="submit" class="btn btn-primary">Save</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div id="updateLetterForm" class="hidden-btn">
                          <form id="updLetterForm" method="post">
                            <input type="hidden" name="id" id="fbg_id">
                            <div class="row" id="fbupdinfofield">
                            </div>
                            <div class="row">
                              <div class="form-group col-md-12 col-sm-12">
                                <button style="float:right;" type="submit" class="btn btn-primary">Save</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div id="lettertbl">
                          <?php
                          $docs = $this->mm->getAllData7(['user_id' => $student->id], 'employee_letters');
                          if ($docs != false) {
                          ?>
                          <div class="row" id="ltritem<?php echo $row->id; ?>">
                            <div class="col-md-12">
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>File</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    foreach ($docs as $row) {
                                    ?>
                                  <tr id="ltr<?php echo $row->id; ?>">
                                    <td><?php echo $row->document_name; ?></td>
                                    <td>
                                      <small>
                                        <a href="<?php echo $row->file_path; ?>" class="badge badge-info">View</a> | <a
                                          href="<?php echo $row->file_path; ?>" class="badge badge-primary" download>Download</a>
                                      </small>
                                    </td>
                                    <td>
                                      <a onclick="deleteLetter('<?php echo $row->id; ?>')" href="javascript:void()"
                                        data-toggle="tooltip" class="btn btn-outline-danger btn-sm" title="Delete"><i
                                          class="align-middle" data-feather="trash"></i></a>

                                      <!-- <a onclick="updFBInfoFunc('<?php echo $row->id; ?>')" href="javascript:void()" data-toggle="tooltip" class="btn btn-outline-primary btn-sm" title="Edit"><i class="align-middle" data-feather="edit"></i></a> -->
                                    </td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <?php } ?>
                        </div>
                        <div id="lettertbl">
                          <?php
                          $letters = $this->mm->getAllData7(['user_id' => $student->id], 'company_letterheads');
                          //printArray($letters);
                          if ($letters != false) {
                          ?>
                          <div class="row" id="ltritem<?php echo $row->id; ?>">
                            <div class="col-md-12">
                              <table style="font-size:small" id="datatables-basic" class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>S.No.</th>
                                    <th>Letter No</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Signature</th>
                                    <th>Stamp</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $i = 1;
                                    foreach ($letters as $row) {
                                    ?>
                                  <tr id="ofrltr<?php echo $row->id; ?>">
                                    <td><?php echo $i;
                                    $i++; ?></td>
                                    <td><?php echo $row->letter_to; ?></td>
                                    <td>
                                      <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal"
                                        title="Click to view" data-target="#courseOverview<?php echo $row->id; ?>">
                                        view
                                      </button>
                                      <div class="modal fade" id="courseOverview<?php echo $row->id; ?>" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title">Description</h5>
                                              <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body m-3">
                                              <p class="mb-0"><?php echo $row->letter_description; ?></p>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </td>
                                    <td><?php echo getFormattedDate($row->created_at, 'd-m-Y | h:i A'); ?></td>
                                    <td>
                                      <span>
                                        <a class="<?php echo $row->signature == 1 ? '' : 'hidden-btn'; ?>" id="signature_on_<?php echo $row->id; ?>"
                                          onclick="onOffAjax('<?php echo $row->id; ?>','signature','0')"
                                          data-toggle="tooltip" title="Click to Change Status"><span
                                            class="badge badge-success">On</span></a>

                                        <a class="<?php echo $row->signature == 0 ? '' : 'hidden-btn'; ?>" id="signature_off_<?php echo $row->id; ?>"
                                          onclick="onOffAjax('<?php echo $row->id; ?>','signature','1')"
                                          data-toggle="tooltip" title="Click to Change Status"><span
                                            class="badge badge-danger">Off</span></a>
                                      </span>
                                    </td>
                                    <td>
                                      <span>
                                        <a class="<?php echo $row->stamp == 1 ? '' : 'hidden-btn'; ?>" id="stamp_on_<?php echo $row->id; ?>"
                                          onclick="onOffAjax('<?php echo $row->id; ?>','stamp','0')" data-toggle="tooltip"
                                          title="Click to Change Status"><span class="badge badge-success">On</span></a>

                                        <a class="<?php echo $row->stamp == 0 ? '' : 'hidden-btn'; ?>" id="stamp_off_<?php echo $row->id; ?>"
                                          onclick="onOffAjax('<?php echo $row->id; ?>','stamp','1')" data-toggle="tooltip"
                                          title="Click to Change Status"><span class="badge badge-danger">Off</span></a>
                                      </span>
                                    </td>
                                    <td>
                                      <a target="_blank" href="<?php echo base_url('Invoice/view_letterhead/'); ?><?php echo $row->id; ?>"
                                        data-toggle="tooltip" class="btn btn-outline-faraz btn-sm"
                                        title="View">View</a>
                                      <br>
                                      <a target="_blank" href="<?php echo base_url('Invoice/print_letterhead/'); ?><?php echo $row->id; ?>"
                                        data-toggle="tooltip" class="btn btn-outline-faraz btn-sm"
                                        title="Print">Print</a>

                                      <a target="_blank" href="<?php echo base_url('Invoice/letter_head/' . $this->uri->segment(3)); ?>/update/<?php echo $row->id; ?>"
                                        data-toggle="tooltip" class="btn btn-outline-primary btn-sm" title="Edit"><i
                                          class="align-middle" data-feather="edit"></i></a>

                                      <a href="javascript:void()" onclick="DeleteOfferLetter('<?php echo $row->id; ?>')"
                                        data-toggle="tooltip" class="btn btn-outline-danger btn-sm" title="Edit"><i
                                          class="align-middle" data-feather="trash"></i></a>
                                    </td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                    <!-- DOCUMENTS END -->

                    <br>
                    <br>
                    <br>
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
