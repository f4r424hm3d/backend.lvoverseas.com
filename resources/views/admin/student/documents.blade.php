@extends('admin.layouts.main')
@push('title')
  <title>Documents</title>
@endpush
@section('main-section')
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">{{ $student->name }} > Documents</h4>

            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                  <a href="javascript: void(0);">Home</a>
                </li>
                <li class="breadcrumb-item active">Documents</li>
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
                  <table id="datatable" class="table table-bordered dt-responsiv nowra w-100">
                    <thead>
                      <tr>
                        <th>Sr. No.</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>File</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $i = 1;
                      @endphp
                      @foreach ($documents as $row)
                        <tr id="row{{ $row->id }}">
                          <td>{{ $i }}</td>
                          <td>{{ getFormattedDate($row->created_at, 'd M Y - h:i A') }}</td>
                          <td>{{ $row->document_name }}</td>
                          <td>
                            <a href="{{ asset($row->file_path) }}" target="_blank"
                              class="waves-effect waves-light btn btn-xs btn-info">view</a> | <a
                              href="{{ asset($row->file_path) }}" download
                              class="waves-effect waves-light btn btn-xs btn-danger">download</a>
                          </td>
                          <td>
                            <a href="javascript:void()"
                              onclick="DeleteAjax('{{ $row->id }}','{{ $row->file_name }}')"
                              class="waves-effect waves-light btn btn-xs btn-danger">
                              <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                          </td>
                        </tr>
                        @php
                          $i++;
                        @endphp
                      @endforeach
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
