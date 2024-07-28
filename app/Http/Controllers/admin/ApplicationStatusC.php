<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ApplicationStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApplicationStatusC extends Controller
{
  protected $page_route;
  public function __construct()
  {
    $this->page_route = 'application-statuses';
  }
  public function index($id = null)
  {
    $page_no = $_GET['page'] ?? 1;

    $rows = ApplicationStatus::all();
    if ($id != null) {
      $sd = ApplicationStatus::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/application-statuses/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/application-statuses/');
      }
    } else {
      $ft = 'add';
      $url = url('admin/application-statuses/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Application Status";
    $page_route = "application-statuses";
    $data = compact('rows', 'sd', 'ft', 'title', 'page_title', 'page_route', 'page_no', 'url');
    return view('admin.application-statuses')->with($data);
  }
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'status' => 'required|unique:application_statuses,status',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new ApplicationStatus();
    $field->status = $request['status'];
    $field->slug = slugify($request['status']);
    $field->save();
    return response()->json(['success' => 'Record hase been added succesfully.']);
  }
  public function delete($id)
  {
    //echo $id;
    //echo $result = ApplicationStatus::find($id)->delete();

    if ($id) {
      $data = ApplicationStatus::findOrFail($id);
      // if ($data->file_path != null) {
      //   unlink($data->file_path);
      // }
      $data->delete();
      return response()->json(['success' => 'Record hase been deleted successfully.']);
    } else {
      return response()->json(['failed' => 'Some problem occured.']);
    }
  }
  public function getData(Request $request)
  {
    // return $request;
    // die;

    //$rows = ApplicationStatus::where('status', $status);

    $rows = ApplicationStatus::paginate(10)->withPath('/admin/application-statuses/');
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->status . '</td>
                  <td>
                    <a href="javascript:void()" onclick="DeleteAjax(`' . $row->id . '`,`' . $row->file_name . '`)"
                      class="waves-effect waves-light btn btn-xs btn-danger">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                    <a href="' . url("admin/" . $this->page_route . "/update/" . $row->id) . '"
                      class="waves-effect waves-light btn btn-xs btn-outline btn-info">
                      <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
                  </td>
    </tr>';
      $i++;
    }
    $output .= '</tbody></table>';
    $output .= '<div>' . $rows->links('pagination::bootstrap-5') . '</div>';
    return $output;
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'status' => 'required|unique:application_statuses,status,' . $id,
      ]
    );
    $field = ApplicationStatus::find($id);
    $field->status = $request['status'];
    $field->slug = slugify($request['status']);
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/' . $this->page_route);
  }
}
