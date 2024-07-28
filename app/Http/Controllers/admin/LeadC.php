<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Destination;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadC extends Controller
{
  public function index(Request $request)
  {
    $limit_per_page = $request->limit_per_page ?? 10;
    $order_by = $request->order_by ?? 'created_at';
    $order_in = $request->order_in ?? 'DESC';
    $rows = Student::orderBy($order_by, $order_in);
    $filterApplied = false;
    if ($request->has('search') && $request->search != '') {
      $rows = $rows->where('name', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->orWhere('mobile', 'like', '%' . $request->search . '%')->orWhere('nationality', 'like', '%' . $request->search . '%');
    } else {
      if ($request->has('from') && $request->from != '') {
        $rows = $rows->Where('created_at', '>=', $request->from);
        $filterApplied = true;
      }
      if ($request->has('to') && $request->to != '') {
        $rows = $rows->Where('created_at', '<=', $request->to);
        $filterApplied = true;
      }
      if ($request->has('nationality') && $request->nationality != '') {
        $rows = $rows->Where('nationality', $request->nationality);
        $filterApplied = true;
      }
      if ($request->has('interested_destination') && $request->interested_destination != '') {
        $rows = $rows->Where('interested_destination', $request->interested_destination);
        $filterApplied = true;
      }

      if ($request->has('entry_type') && $request->entry_type != '') {
        $rows = $rows->Where('entry_type', $request->entry_type);
        $filterApplied = true;
      }
    }
    $rows = $rows->paginate($limit_per_page)->withQueryString();

    $cp = $rows->currentPage();
    $pp = $rows->perPage();
    $i = ($cp - 1) * $pp + 1;

    $lpp = ['10', '20', '50'];
    $orderColumns = ['Name' => 'name', 'Date' => 'created_at'];

    $filterDestinations = Student::select('interested_destination')->where('interested_destination', '!=', '')->groupBy('interested_destination')->orderBy('interested_destination')->get();



    $filterUserTypes = Student::select('entry_type')->where('entry_type', '!=', '')->groupBy('entry_type')->orderBy('entry_type')->get();


    $page_title = 'Leads';
    $data = compact('rows', 'page_title', 'i', 'limit_per_page', 'order_by', 'order_in', 'lpp', 'orderColumns', 'filterDestinations', 'filterUserTypes', 'filterApplied');
    return view('admin.leads')->with($data);
  }
  public function add(Request $request, $id = null)
  {
    $destinations = Destination::all();

    if ($id != null) {
      $sd = Student::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/leads/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/leads');
      }
    } else {
      $ft = 'add';
      $url = url('admin/leads/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Add Student";
    $page_route = "leads/add";
    $data = compact('sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'destinations');
    return view('admin.add-leads')->with($data);
  }
  public function store(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'name' => 'required',
        'email' => 'required',
        'country_code' => 'nullable|numeric',
        'mobile' => 'required|numeric',
      ]
    );
    $field = new Student;
    $field->name = $request['name'];
    $field->email = $request['email'];
    $field->country_code = $request['country_code'];
    $field->mobile = $request['mobile'];
    $field->gender = $request['gender'];
    $field->entry_type = 'inquiry';
    $field->date_of_birth = $request['date_of_birth'];
    $field->interested_destination = $request['interested_destination'];
    $field->status = 1;
    $field->save();
    session()->flash('smsg', 'New record has been added successfully.');
    return redirect('admin/leads/add');
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = Student::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'name' => 'required',
        'email' => 'required',
        'country_code' => 'nullable|numeric',
        'mobile' => 'required|numeric',
      ]
    );
    $field = Student::find($id);
    $field->name = $request['name'];
    $field->email = $request['email'];
    $field->country_code = $request['country_code'];
    $field->mobile = $request['mobile'];
    $field->gender = $request['gender'];
    $field->nationality = $request['nationality'];
    $field->entry_type = $request['entry_type'];
    $field->date_of_birth = $request['date_of_birth'];
    $field->interested_destination = $request['interested_destination'];
    $field->status = 1;
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/leads');
  }
  public function getQuickInfo(Request $request)
  {
    if ($request->id) {
      $id = $request->id;
      $student = Student::find($request->id);

      $output = '<div class="form-group col-md-12">
			<label>Name</label>
			<input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="' . $student->name . '">
		</div>
		<div class="form-group col-md-12">
			<label>Email</label>
			<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="' . $student->email . '">
		</div>
    <div class="form-group col-md-12">
        <label>Mobile</label>
        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile" value="' . $student->mobile . '">
    </div>
    ';

      echo $output;
    }
  }
  public function updateQuickInfo(Request $request)
  {
    $field = Student::find($request['id']);
    $field->name = $request['name'];
    $field->email = $request['email'];
    $field->mobile = $request['mobile'];
    $field->status = 1;
    $done = $field->save();
    if ($done) {
      return "success";
    } else {
      return "failed";
    }
    //session()->flash('smsg', 'Record has been updated successfully.');
    //return redirect('admin/leads/');
  }
  public function fetchLastRecord($id)
  {
    $student = Student::find($id);
    $output = '<i class="fas fa-user text-danger"></i> : ' . $student->name . '
      <br><i class="fas fa-mobile text-danger"></i> : ' . $student->email . '
      <br><i class="fas fa-mail-bulk text-danger"></i> : ' . $student->mobile . '';
    echo $output;
  }
  public function add2()
  {
    $ft = 'add';
    $title = 'Add New';
    $sd = '';
    $page_title = 'Add Student';
    $page_route = 'leads/add2';
    $data = compact('sd', 'ft', 'title', 'page_title', 'page_route');
    return view('admin.add-leads2')->with($data);
  }
  public function storeAjax(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required',
      'mobile' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new Student();
    $field->name = $request->name;
    $field->email = $request->email;
    $field->mobile = $request->mobile;
    $field->save();

    return response()->json(['success' => 'Product created successfully.']);
  }
}
