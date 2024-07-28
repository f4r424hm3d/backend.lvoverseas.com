@extends('admin.layouts.main')
@push('title')
  <title>Application Details</title>
@endpush
@section('main-section')
  <style>
    .equal-width-table {
      table-layout: fixed;
      width: 100%;
    }

    .equal-width-table td,
    .equal-width-table th {
      width: 50%;
    }

    h2 {
      color: #0080df;
      text-shadow:
        0.25px 0.25px 0 #555,
        0.5px 0.5px 0 #444,
        0.75px 0.75px 0 #333,
        1px 1px 0 #222,
        1.25px 1.25px 0 #111;
    }
  </style>
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">{{ $student->name }} > Application Details</h4>

            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                  <a href="javascript: void(0);">Home</a>
                </li>
                <li class="breadcrumb-item active">Application Details</li>
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
                <div class="col-md-3">
                  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link mb-2 active" id="v-pills-pd-tab" data-bs-toggle="pill" href="#v-pills-pd"
                      role="tab" aria-controls="v-pills-pd" aria-selected="true">Applicant Details</a>

                    <a class="nav-link mb-2" id="v-pills-passport-tab" data-bs-toggle="pill" href="#v-pills-passport"
                      role="tab" aria-controls="v-pills-passport" aria-selected="false">Passport Details</a>

                    <a class="nav-link mb-2" id="v-pills-addresses-tab" data-bs-toggle="pill" href="#v-pills-addresses"
                      role="tab" aria-controls="v-pills-addresses" aria-selected="false">Address</a>

                    <a class="nav-link" id="v-pills-visa-tab" data-bs-toggle="pill" href="#v-pills-visa" role="tab"
                      aria-controls="v-pills-visa" aria-selected="false">Visa Details</a>

                    <a class="nav-link" id="v-pills-po-tab" data-bs-toggle="pill" href="#v-pills-po" role="tab"
                      aria-controls="v-pills-po" aria-selected="false">Profession/Occupation Details</a>

                    <a class="nav-link" id="v-pills-reference-tab" data-bs-toggle="pill" href="#v-pills-reference"
                      role="tab" aria-controls="v-pills-reference" aria-selected="false">Reference Details</a>

                    <a class="nav-link" id="v-pills-other-tab" data-bs-toggle="pill" href="#v-pills-other" role="tab"
                      aria-controls="v-pills-other" aria-selected="false">Other Details</a>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">

                    <div class="tab-pane fade active show" id="v-pills-pd" role="tabpanel"
                      aria-labelledby="v-pills-pd-tab">
                      <h2>Applicant Details </h2>
                      <hr>
                      <table class="table table-sm table-bordered table-striped equal-width-table">
                        <tbody>
                          <tr>
                            <td>Surname </td>
                            <th>{{ $student->surname }}</th>
                          </tr>
                          <tr>
                            <td>Given Name</td>
                            <th>{{ $student->given_names }}</th>
                          </tr>
                          <tr>
                            <td>Have you ever changed your name</td>
                            <th>{{ $student->changed_name_details ?? 'No' }}</th>
                          </tr>
                          <tr>
                            <td>Citizenship/National Id No</td>
                            <th>{{ $student->citizenship_national_id_no }}</th>
                          </tr>
                          <tr>
                            <td>Country/Region of birth</td>
                            <th>{{ $student->given_names }}</th>
                          </tr>
                          <tr>
                            <td>Religion</td>
                            <th>{{ $student->country_region_of_birth }}</th>
                          </tr>
                          <tr>
                            <td>Gender</td>
                            <th>{{ $student->gender }}</th>
                          </tr>
                          <tr>
                            <td>Visible identification marks</td>
                            <th>{{ $student->visible_identification_marks }}</th>
                          </tr>
                          <tr>
                            <td>Date of Birth</td>
                            <th>{{ $student->date_of_birth }}</th>
                          </tr>
                          <tr>
                            <td>Educational Qualification</td>
                            <th>{{ $student->educational_qualification }}</th>
                          </tr>
                          <tr>
                            <td>Town/City of birth</td>
                            <th>{{ $student->town_city_of_birth }}</th>
                          </tr>
                          <tr>
                            <td>Nationality</td>
                            <th>{{ $student->nationality }}</th>
                          </tr>
                          <tr>
                            <td>Did you acquire Nationality by birth or by naturalization</td>
                            <th>{{ $student->acquisition_of_nationality }}</th>
                          </tr>
                          <tr>
                            <td>Have you lived for at least two years in the country where you are applying visa?</td>
                            <th>{{ $student->lived_two_years_in_country }}</th>
                          </tr>
                          <tr>
                            <td>Marital Status</td>
                            <th>{{ $student->applicant_marital_status }}</th>
                          </tr>
                        </tbody>
                      </table>
                      <h2> Father Details </h2>
                      <hr>
                      <table class="table table-sm table-bordered table-striped equal-width-table">
                        <tbody>
                          <tr>
                            <td>Father Name</td>
                            <th>{{ $student->fathers_name }}</th>
                          </tr>
                          <tr>
                            <td>Nationality/Region</td>
                            <th>{{ $student->fathers_nationality_region }}</th>
                          </tr>
                          <tr>
                            <td>Contact Number</td>
                            <th>{{ $student->father_contact_number }}</th>
                          </tr>
                        </tbody>
                      </table>
                      <h2> Mother Details </h2>
                      <hr>
                      <table class="table table-sm table-bordered table-striped equal-width-table">
                        <tbody>
                          <tr>
                            <td>Mother Name</td>
                            <th>{{ $student->mothers_name }}</th>
                          </tr>
                          <tr>
                            <td>Nationality/Region</td>
                            <th>{{ $student->mothers_nationality_region }}</th>
                          </tr>
                          <tr>
                            <td>Contact Number</td>
                            <th>{{ $student->mother_contact_number }}</th>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane fade" id="v-pills-passport" role="tabpanel"
                      aria-labelledby="v-pills-passport-tab">
                      <h2>Passport Details </h2>
                      <hr>
                      <table class="table table-sm table-bordered table-striped equal-width-table">
                        <tbody>
                          <tr>
                            <td>Passport Number</td>
                            <th>{{ $student->passport_number }}</th>
                          </tr>
                          <tr>
                            <td>Place of Issue</td>
                            <th>{{ $student->passport_place_of_issue }}</th>
                          </tr>
                          <tr>
                            <td>Date of Issue</td>
                            <th>{{ getFormattedDate($student->passport_date_of_issue, 'd M Y') }}</th>
                          </tr>
                          <tr>
                            <td>Date of Expiry</td>
                            <th>{{ getFormattedDate($student->passport_date_of_expiry, 'd M Y') }}</th>
                          </tr>
                          <tr>
                            <td>Other Passport / IC No.</td>
                            <th>{{ $student->other_passport_ic_no }}</th>
                          </tr>
                          <tr>
                            <td>Date of Issue</td>
                            <th>{{ $student->other_passport_date_of_issue }}</th>
                          </tr>
                          <tr>
                            <td>Place of Issue</td>
                            <th>{{ $student->other_passport_place_of_issue }}</th>
                          </tr>
                          <tr>
                            <td>Nationality mentioned therein</td>
                            <th>{{ $student->other_passport_nationality }}</th>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane fade" id="v-pills-addresses" role="tabpanel"
                      aria-labelledby="v-pills-addresses-tab">
                      <h2> Present Address </h2>
                      <hr>
                      <table class="table table-sm table-bordered table-striped equal-width-table">
                        <tbody>
                          <tr>
                            <td>House No./ Street</td>
                            <th>{{ $student->present_address_house_no_street }}</th>
                          </tr>
                          <tr>
                            <td>Village/Town/City</td>
                            <th>{{ $student->present_address_village_town_city }}</th>
                          </tr>
                          <tr>
                            <td>Country</td>
                            <th>{{ $student->present_address_country }}</th>
                          </tr>
                          <tr>
                            <td>State/Province/District</td>
                            <th>{{ $student->present_address_state_province_district }}</th>
                          </tr>
                          <tr>
                            <td>Postal/Zip Code</td>
                            <th>{{ $student->present_address_postal_zip_code }}</th>
                          </tr>
                          <tr>
                            <td>Phone No</td>
                            <th>{{ $student->present_address_phone_no }}</th>
                          </tr>
                          <tr>
                            <td>Mobile No</td>
                            <th>{{ $student->present_address_mobile_no }}</th>
                          </tr>
                          <tr>
                            <td>Email Address</td>
                            <th>{{ $student->present_address_email_address }}</th>
                          </tr>
                        </tbody>
                      </table>
                      <h2> Permanent Address </h2>
                      <hr>
                      <table class="table table-sm table-bordered table-striped equal-width-table">
                        <tbody>
                          <tr>
                            <td>House No./ Street</td>
                            <th>{{ $student->permanent_address_house_no_street }}</th>
                          </tr>
                          <tr>
                            <td>Village/Town/City</td>
                            <th>{{ $student->permanent_address_village_town_city }}</th>
                          </tr>
                          <tr>
                            <td>Country</td>
                            <th>{{ $student->permanent_address_country }}</th>
                          </tr>
                          <tr>
                            <td>State/Province/District</td>
                            <th>{{ $student->permanent_address_state_province_district }}</th>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane fade" id="v-pills-visa" role="tabpanel" aria-labelledby="v-pills-visa-tab">
                      <h2>Visa Details</h2>
                      <hr>
                      <table class="table table-sm table-bordered table-striped equal-width-table">
                        <tbody>
                          <tr>
                            <td>Duration of Visa(In Months)</td>
                            <th>{{ $student->duration_of_visa_months }}</th>
                          </tr>
                          <tr>
                            <td>No. of Entries</td>
                            <th>{{ $student->no_of_entries }}</th>
                          </tr>
                          <tr>
                            <td>Purpose of Visit</td>
                            <th>{{ $student->purpose_of_visit }}</th>
                          </tr>
                          <tr>
                            <td>Expected Date of Journey</td>
                            <th>{{ $student->expected_date_of_journey }}</th>
                          </tr>
                          <tr>
                            <td>Countries Visited in Last 10 years</td>
                            <th>{{ $student->countries_visited_last_10_years }}</th>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane fade" id="v-pills-po" role="tabpanel" aria-labelledby="v-pills-po-tab">
                      <h2>Profession/Occupation Details</h2>
                      <hr>
                      <table class="table table-sm table-bordered table-striped equal-width-table">
                        <tbody>
                          <tr>
                            <td>Present Occupation</td>
                            <th>{{ $student->present_occupation }}</th>
                          </tr>
                          <tr>
                            <td>Employer Name/business</td>
                            <th>{{ $student->employer_name_business }}</th>
                          </tr>
                          <tr>
                            <td>Designation</td>
                            <th>{{ $student->purpose_designationof_visit }}</th>
                          </tr>
                          <tr>
                            <td>Address</td>
                            <th>{{ $student->employer_address }}</th>
                          </tr>
                          <tr>
                            <td>Phone</td>
                            <th>{{ $student->employer_phone }}</th>
                          </tr>
                          <tr>
                            <td>Past Occupation, if any</td>
                            <th>{{ $student->past_occupation }}</th>
                          </tr>
                          <tr>
                            <td>Are/were you in a Military/Semi-Military/Police/Security. Organization?</td>
                            <th>{{ $student->military_police_security_organization }}</th>
                          </tr>
                          @if ($student->military_police_security_organization == 'yes')
                            <tr>
                              <td>Organization</td>
                              <th>{{ $student->organization }}</th>
                            </tr>
                            <tr>
                              <td>Designation</td>
                              <th>{{ $student->military_designation }}</th>
                            </tr>
                            <tr>
                              <td>Rank</td>
                              <th>{{ $student->military_rank }}</th>
                            </tr>
                            <tr>
                              <td>Place of Posting</td>
                              <th>{{ $student->military_place_of_posting }}</th>
                            </tr>
                          @endif
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane fade" id="v-pills-reference" role="tabpanel"
                      aria-labelledby="v-pills-reference-tab">
                      <h2>Reference Details</h2>
                      <hr>
                      <table class="table table-sm table-bordered table-striped equal-width-table">
                        <tbody>
                          <tr>
                            <td>Reference Name in India</td>
                            <th>{{ $student->reference_name_in_india }}</th>
                          </tr>
                          <tr>
                            <td>Address</td>
                            <th>{{ $student->reference_address_in_india }}</th>
                          </tr>
                          <tr>
                            <td>Phone</td>
                            <th>{{ $student->reference_phone_in_india }}</th>
                          </tr>
                          <tr>
                            <td>Reference Name in country applying visa</td>
                            <th>{{ $student->reference_name_in_country }}</th>
                          </tr>
                          <tr>
                            <td>Address</td>
                            <th>{{ $student->reference_address_in_country }}</th>
                          </tr>
                          <tr>
                            <td>Phone</td>
                            <th>{{ $student->reference_phone_in_country }}</th>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane fade" id="v-pills-other" role="tabpanel" aria-labelledby="v-pills-other-tab">
                      <h2>Other Details</h2>
                      <hr>
                      <table class="table table-sm table-bordered table-striped equal-width-table">
                        <tbody>
                          <tr>
                            <td>Have you ever been arrested/prosecuted/convicted by Court of Law of any country?</td>
                            <th>
                              {{ $student->arrested_prosecuted_convicted == 'yes' ? $student->arrest_prosecution_conviction_details : 'No' }}
                            </th>
                          </tr>
                          <tr>
                            <td>Have you ever been refused entry/deported by any country including India?</td>
                            <th>
                              {{ $student->refused_entry_deported == 'yes' ? $student->refused_entry_deportation_details : 'No' }}
                            </th>
                          </tr>
                          <tr>
                            <td>Have you ever been engaged in Human trafficking/Drug trafficking/Child abuse/Crime against
                              women/Economic offense/Financial fraud?</td>
                            <th>
                              {{ $student->engaged_in_illegal_activities == 'yes' ? $student->illegal_activities_details : 'No' }}
                            </th>
                          </tr>
                          <tr>
                            <td>Have you ever been engaged in Cybercrime/Terrorist
                              activities/Sabotage/Espionage/Genocide/Political killing/other act of violence?</td>
                            <th>{{ $student->engaged_in_cybercrime == 'yes' ? $student->cybercrime_details : 'No' }}</th>
                          </tr>
                          <tr>
                            <td>Have you ever by any means or medium, expressed views that justify or glorify terrorist
                              violence or that may encourage others to terrorist acts or other serious criminal acts?</td>
                            <th>
                              {{ $student->expressed_terrorist_views == 'yes' ? $student->terrorist_views_details : 'No' }}
                            </th>
                          </tr>
                          <tr>
                            <td>Have you sought asylum (political or otherwise) in any country</td>
                            <th>{{ $student->sought_asylum == 'yes' ? $student->asylum_details : 'No' }}</th>
                          </tr>
                        </tbody>
                      </table>
                    </div>

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
