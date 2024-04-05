<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\Address;
use App\Models\Country;
use App\Models\UserOffice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends ApiController
{

    public function index()
    {
        $addresses = auth()->user()->useroffices;
        return $this->successResponse($addresses);
    }

    public function countries(){
       $countries = Country::orderBy('name', 'asc')->get();
        return $this->successResponse($countries);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'name' => 'required|min:2|max:50',
            'surname' => 'required|min:2|max:50',
            'mobile' => 'required|min:10|max:10',
            'code' => 'required|min:1|max:5',
            'phone' => 'nullable|min:13|max:13',
            'office_name' => 'required|min:5|max:15',
            'address_line_1' => 'required|min:5|max:150',
            'address_line_2' => 'nullable|min:5|max:150',
            'postcode' => 'required|min:3|max:200',
            'district' => 'nullable|min:2|max:200',
            'county' => 'nullable|min:2|max:200',
            'country' => 'required|min:5|max:200',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Validation Error', 403, $validator->errors());
        }
        
        $address = Address::create([
            'postcode' => $request->postcode,
            'country' => $request->country,
            'district' => $request->district,
            'county' => $request->county,
            'latitude' => 0,
            'longitude' => 0,
            'formatted_address' => $request->address_line_1 . ' ' . $request->address_line_2 . ', ' . $request->district . ', ' . $request->county . ', ' . $request->postcode . ', '. $request->country,
        ]);

        $user = auth()->user();
        $office = UserOffice::create([
            'office_name' => $request->office_name,
            'email' => $request->email,
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'mobile' => $request->code . '-' .$request->mobile,
            'user_id' => $user->id,
            'address_id' => $address->id,
            'is_shipping' => 0,
            'is_billing' => 0,
        ]);

        $office->address;

        return $this->successResponse($office, 'Address created successfully.');
    }

   
    public function show(UserOffice $address)
    {
        if ($address->user_id != auth()->id()) {
            return $this->errorResponse('You are not authorized to view this address.', 403);
        }

       $address->address;
        
        return $this->successResponse($address);
    }

    
    public function update(UserOffice $address)
    {
        if ($address->user_id != auth()->id()) {
            return $this->errorResponse('You are not authorized to view this address.', 403);
        }
        $user = auth()->user();

        $other_address = UserOffice::where('user_id', $user->id)->get();
        foreach ($other_address as $other) {
            $other->update([
                'is_shipping' => 0,
            ]);
        }
        $address->update([
            'is_shipping' => 1,
        ]);
        
        $address->address;

        return $this->successResponse($address);
    }

    public function delete(UserOffice $address)
    {
        if ($address->user_id != auth()->id()) {
            return $this->errorResponse('You are not authorized to view this address.', 403);
        }
        $user = auth()->user();

        if (!$address->is_billing) {

            if ($address->is_shipping) {
                $nextAddress = UserOffice::where('user_id', $user->id)->where('id', '!=', $address->id)->first();
                if($nextAddress){
                    $nextAddress->update([
                        'is_shipping' => 1,
                    ]);
                    $address->delete();
                    return $this->successResponse('Address deleted successfully.');
                }
            }

            
        }
        
       return $this->errorResponse('You can not delete this address.', 403);
       
    }
}