<?php

namespace App\Http\Controllers\Admin\People;
use App\Actions\SupplierAction;
use App\Country;
use App\Http\Requests\SupplierRequest;
use App\Supplier;
use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SupplierController extends Controller
{
    private const BASE_PATH = 'backend.supplier.';

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:supplier-list|supplier-create|supplier-edit|supplier-delete',['only' => ['index']]);
        $this->middleware('permission:supplier-create',['only' => ['add','store']]);
        $this->middleware('permission:supplier-edit',['only' => ['update']]);
        $this->middleware('permission:supplier-delete',['only' => ['bulk_action','delete']]);
    }

    public function index()
    {
        $all_suppliers = Supplier::latest()->get();
        return view(self::BASE_PATH.'index')->with(['all_suppliers' => $all_suppliers]);
    }

    public function add()
    {
        $all_countries = Country::select('id','name')->get();
        return view(self::BASE_PATH.'create',compact('all_countries'));
    }

    public function store(SupplierRequest $request)
    {
        $response = SupplierAction::execute_store($request);
        return redirect()->back()->with($response);
    }

    public function edit($id)
    {
        $all_countries = Country::select('id','name')->get();
        $supplier = Supplier::findOrFail($id);
        return view(self::BASE_PATH.'edit',compact('supplier','all_countries'));
    }

    public function update(SupplierRequest $request, $id)
    {
        $response = SupplierAction::update_execute($request,$id);
        return redirect()->back()->with($response);
    }


    public function delete($id)
    {
        Supplier::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }

    public function bulk_action(Request $request)
    {
        Supplier::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }


}
