<?php

namespace App\Http\Controllers\Admin\People;
use App\Actions\CustomerAction;
use App\Country;
use App\Customer;
use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    private const BASE_PATH = 'backend.customer.';

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete',['only' => ['index']]);
        $this->middleware('permission:customer-create',['only' => ['add','store']]);
        $this->middleware('permission:customer-edit',['only' => ['update']]);
        $this->middleware('permission:customer-delete',['only' => ['bulk_action','delete']]);
    }

    public function index()
    {
        $all_customers = Customer::latest()->get();
        return view(self::BASE_PATH.'all-customer')->with(['all_customers' => $all_customers]);
    }

    public function add()
    {
        $all_countries = Country::select('id','name')->get();
        return view(self::BASE_PATH.'add-new-customer',compact('all_countries'));
    }

    public function store(CustomerRequest $request)
    {
        $response = CustomerAction::execute_store($request);
        return redirect()->back()->with($response);
    }

    public function edit($id)
    {
        $all_countries = Country::select('id','name')->get();
        $customer = Customer::findOrFail($id);
        return view(self::BASE_PATH.'edit-customer',compact('customer','all_countries'));
    }

    public function update(CustomerRequest $request, $id)
    {
        $response = CustomerAction::update_execute($request,$id);
        return redirect()->back()->with($response);
    }


    public function delete($id)
    {
        Customer::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }

    public function bulk_action(Request $request)
    {
        Customer::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }



}
