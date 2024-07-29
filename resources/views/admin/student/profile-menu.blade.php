@php
  $menus = ['Profile' => 'profile', 'Documents' => 'documents', 'Applications' => 'applications'];
@endphp
<div class="card-header">
  <div class="row">
    <div class="col-sm order-2 order-sm-1">
      <div class="d-flex align-items-start mt-3 mt-sm-0">
        <div class="flex-grow-1">
          <div>
            <h5 class="font-size-16 mb-1">{{ $student->name }} ({{ $student->id }})</h5>

            <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
              <div>
                <i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>{{ $student->mobile }}
              </div>
              <div>
                <i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>
                {{ $student->email }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-auto order-1 order-sm-2">
      <div class="d-flex align-items-start justify-content-end gap-2">
        <div>
          @foreach ($menus as $key => $value)
            <a href="{{ url('admin/student/' . $value . '/' . $student->id) }}"
              class="btn {{ $value == $active ? 'btn-success' : 'btn-soft-light' }}">
              {{ $key }}
            </a>
          @endforeach
          {{-- <a href="{{ url('admin/student/profile/' . $student->id) }}"
            class="btn {{ Request::segment(3) == 'profile' ? 'btn-success' : 'btn-soft-light' }}">
            Profile
          </a>
          <a href="{{ url('admin/student/documents/' . $student->id) }}"
            class="btn {{ Request::segment(3) == 'documents' ? 'btn-success' : 'btn-soft-light' }}">
            Documents
          </a>
          <a href="{{ url('admin/student/applications/' . $student->id) }}"
            class="btn {{ Request::segment(3) == 'applications' ? 'btn-success' : 'btn-soft-light' }}">
            Applications
          </a> --}}
        </div>
      </div>
    </div>
  </div>
</div>
