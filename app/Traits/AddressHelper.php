<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait AddressHelper
{

    protected function getAddressList($name)
    {
        return  Http::get('https://api.getAddress.io/autocomplete/' . $name . '?api-key=' . config('app.get_address_api_key'))->object();
    }

    protected function getAddressListZipcode($zipcode)
    {
        return  Http::get('https://api.getAddress.io/find/' . $zipcode . '?api-key=' . config('app.get_address_api_key'))->object();
    }

    protected function getAddressListZipcodeExpand($zipcode)
    {
        return  Http::get('https://api.getAddress.io/find/' . $zipcode . '?api-key=' . config('app.get_address_api_key') . '&expand=true')->object();
    }

    protected function getSelectedAddressDetail($id)
    {
        return Http::get('https://api.getAddress.io/get/' . $id . '?api-key=' . config('app.get_address_api_key'))->object();
    }
}
