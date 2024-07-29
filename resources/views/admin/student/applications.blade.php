@extends('admin.layouts.main')
@push('title')
  <title>{{ $page_title }}</title>
@endpush
@section('main-section')
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">{{ $student->name }} > {{ $page_title }}</h4>

            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                  <a href="javascript: void(0);">Home</a>
                </li>
                <li class="breadcrumb-item active">{{ $page_title }}</li>
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
                        <th>Action</th>
                        <th>Date</th>
                        <th>University</th>
                        <th>Country</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $i = 1;
                      @endphp
                      @foreach ($applications as $row)
                        <tr id="row{{ $row->id }}">
                          <td>{{ $i }}</td>
                          <td>
                            <a href="{{ url('admin/student/application/' . $row->id) }}"
                              class="waves-effect waves-light btn btn-xs btn-success">
                              <i class="fa fa-file" aria-hidden="true"></i>
                            </a>
                            <a href="javascript:void()" onclick="DeleteAjax('{{ $row->id }}'"
                              class="waves-effect waves-light btn btn-xs btn-danger">
                              <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                          </td>
                          <td>{{ getFormattedDate($row->created_at, 'd M Y - h:i A') }}</td>
                          <td>{{ $row->college->name }}</td>
                          <td>{{ $row->college->country }}</td>
                          <td>
                            <span
                              class="waves-effect waves-light btn btn-xs btn-info">{{ $row->status->status ?? 'Pending' }}</span>
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
  <script></script>
@endsection
