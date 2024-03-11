<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserOffice;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function create_office($customerId)
    {
        $customer = User::findOrfail($customerId);
        return view('admin.offices.create',compact('customer'));
    }
    public function set_billing($customerId,$id)
    {
        $office = UserOffice::findOrfail($id);
        
        $offices = UserOffice::where('user_id',$customerId)->where('id','!=',$id)->get();
        foreach($offices as $of){
            $of->is_billing = 0;
            $of->save();
        }

        $office->is_billing = 1;
        $office->save();

        return redirect()->back();
    }
    public function set_shipping($customerId,$id)
    {
        $office = UserOffice::findOrfail($id);

        $offices = UserOffice::where('user_id',$customerId)->where('id','!=',$id)->get();
        foreach($offices as $of){
            $of->is_shipping = 0;
            $of->save();
        }

        $office->is_shipping = 1;
        $office->save();

        

        return redirect()->back();
    }

    public function delete($customerId,$id)
    {
        $office = UserOffice::findOrfail($id);

        if(!$office->is_billing && !$office->is_shipping){
            $office->delete();
        }
       
        return redirect()->back();
    }
}
