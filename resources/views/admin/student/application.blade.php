@extends('admin.layouts.main')
@push('title')
  <title>{{ $page_title }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
          </div>
          <div>
            <h2>
              Application Details
              <button class="btn btn-sm btn-info f-rgt" id="addNoteBtn">Add Note</button>
              <button class="btn btn-sm btn-info f-rgt hide-this" id="viewNotesBtn">View Notes</button>
            </h2>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <table class="table table-bordered table-striped">
                    <tbody>
                      <tr>
                        <td>University</td>
                        <th>{{ $application->college->name }}</th>
                      </tr>
                      <tr>
                        <td>Country</td>
                        <th>{{ $application->college->country }}</th>
                      </tr>
                      <tr>
                        <td>Date</td>
                        <th>{{ getFormattedDate($application->created_at, 'd M Y') }}</th>
                      </tr>
                      <tr>
                        <td>Status</td>
                        <th>{{ $application->status->status ?? 'Processing' }}</th>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div class="col-md-8">
                  <div id="viewNote">
                    <table id="datatable" class="table table-bordered dt-responsiv nowra w-100">
                      <thead>
                        <tr>
                          <th>Sr. No.</th>
                          {{-- <th>Action</th> --}}
                          <th>Sender</th>
                          <th>Date</th>
                          <th>Subject</th>
                          <th>Message</th>
                          <th>File</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                          $i = 1;
                        @endphp
                        @foreach ($notes as $row)
                          <tr id="row{{ $row->id }}">
                            <td>{{ $i }}</td>
                            {{-- <td>
                              <a href="javascript:void()"
                                onclick="DeleteAjax('{{ $row->id }}','{{ $row->file_name }}')"
                                class="waves-effect waves-light btn btn-xs btn-danger">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </a>
                            </td> --}}
                            <td>{{ $row->sender == 'admin' ? 'Admin' : 'Student' }}</td>
                            <td>{{ getFormattedDate($row->created_at, 'd M Y - h:i A') }}</td>
                            <td>{{ $row->subject }}</td>
                            <td>
                              @if ($row->message_note != null)
                                <button type="button" class="btn btn-xs btn-outline-info waves-effect waves-light"
                                  data-bs-toggle="modal"
                                  data-bs-target="#SeoModalScrollable{{ $row->id }}">View</button>
                                <div class="modal fade" id="SeoModalScrollable{{ $row->id }}" tabindex="-1"
                                  role="dialog" aria-labelledby="SeoModalScrollableTitle{{ $row->id }}"
                                  aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="SeoModalScrollableTitle{{ $row->id }}">
                                          Message Note
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                          aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        {!! $row->message_note !!}
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-light"
                                          data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              @else
                                Null
                              @endif
                            </td>
                            <td>
                              <a href="{{ asset($row->file_path) }}" target="_blank"
                                class="waves-effect waves-light btn btn-xs btn-info">view</a> | <a
                                href="{{ asset($row->file_path) }}" download
                                class="waves-effect waves-light btn btn-xs btn-danger">download</a>
                            </td>
                          </tr>
                          @php
                            $i++;
                          @endphp
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div id="addNote" class="hide-this">
                    <form action="{{ url('admin/student/add-note') }}" class="needs-validation" method="post"
                      enctype="multipart/form-data" novalidate>
                      @csrf
                      <input type="hidden" name="application_id" value="{{ $application->id }}">
                      <div class="row">
                        <div class="col-md-12 col-sm-12 mb-3">
                          <div class="form-group">
                            <label>Subject</label>
                            <input name="subject" id="subject" type="text" class="form-control" placeholder="Subject"
                              value="{{ old('subject') }}" required>
                            <span class="text-danger" id="subject-err">
                              @error('subject')
                                {{ $message }}
                              @enderror
                            </span>
                          </div>
                        </div>
                        <div class="col-md-12 col-sm-12 mb-3">
                          <div class="form-group">
                            <label>Message</label>
                            <textarea name="message_note" id="message_note" class="form-control" placeholder="Message" required>{{ old('message_note') }}</textarea>
                            <span class="text-danger">
                              @error('message_note')
                                {{ $message }}
                              @enderror
                            </span>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12 mb-3">
                          <div class="form-group">
                            <label>File</label>
                            <input name="file" id="file" type="file" class="form-control" placeholder="File"
                              value="{{ old('file') }}">
                            <span class="text-danger" id="file-err">
                              @error('file')
                                {{ $message }}
                              @enderror
                            </span>
                          </div>
                        </div>
                      </div>
                      <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                    </form>
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
    CKEDITOR.replace("message_note");
    $(document).ready(function() {
      $('#addNoteBtn').click(function() {
        $('#addNote').show();
        $('#viewNote').hide();
        $('#addNoteBtn').hide();
        $('#viewNotesBtn').show();
      });

      $('#viewNotesBtn').click(function() {
        $('#addNote').hide();
        $('#viewNote').show();
        $('#addNoteBtn').show();
        $('#viewNotesBtn').hide();
      });
    });
  </script>
@endsection
