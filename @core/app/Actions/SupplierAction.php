<?php

namespace App\Actions;

use App\Supplier;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SupplierAction
{
    private static $message;

    public function __construct($message = [])
    {
        self::$message = $message;
    }

    public static function execute_store($request)
    {
        try {
            $supplier = new Supplier();
            self::extracted($request, $supplier);
            self::$message['msg'] = __('Supplier Inserted Successfully');

        }catch (\Exception $e){
            self::$message['type'] = 'danger';
            self::$message['msg'] = $e->getMessage();
        }

        return self::$message;
    }


    public static function update_execute($request, $id)
    {
        try {
            $supplier = Supplier::find($id);
            self::extracted($request, $supplier);
            self::$message['msg'] = __('Supplier Updated Successfully');

        }catch (\Exception $e){
            self::$message['type'] = 'danger';
            self::$message['msg'] = $e->getMessage();
        }

        return self::$message;
    }


    public static function extracted($request, $supplier): void
    {
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->city = $request->city;
        $supplier->country_id = $request->country_id;
        $supplier->supplier_type = $request->supplier_type;
        $supplier->nid = $request->nid;
        $supplier->company_name = $request->company_name;
        $supplier->image = $request->image;
        $supplier->save();

        self::$message['type'] = 'success';
    }

}