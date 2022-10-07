<?php

namespace App\Actions;

use App\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerAction
{
    private static $message;

    public function __construct($message = [])
    {
        self::$message = $message;
    }

    public static function execute_store($request)
    {
        try {
            $customer = new Customer();
            self::extracted($request, $customer);
            self::$message['msg'] = __('Customer Inserted Successfully');

        }catch (\Exception $e){
            self::$message['type'] = 'danger';
            self::$message['msg'] = $e->getMessage();
        }

        return self::$message;
    }


    public static function update_execute($request, $id)
    {
        try {
            $customer = Customer::find($id);
            self::extracted($request, $customer);
            self::$message['msg'] = __('Customer Updated Successfully');

        }catch (\Exception $e){
            self::$message['type'] = 'danger';
            self::$message['msg'] = $e->getMessage();
        }

        return self::$message;
    }


    public static function extracted($request, $customer): void
    {
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->city = $request->city;
        $customer->country_id = $request->country_id;
        $customer->customer_type = $request->customer_type;
        $customer->nid = $request->nid;
        $customer->company_name = $request->company_name;
        $customer->save();

        self::$message['type'] = 'success';
    }

}