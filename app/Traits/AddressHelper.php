<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait AddressHelper
{

    protected function getAddressList($name)
    {
        return  Http::get('https://api.getAddress.io/autocomplete/' . $name . '?api-key=' . config('app.get_address_api_key'))->object();
    }

    protected function getSelectedAddressDetail($id)
    {
        return Http::get('https://api.getAddress.io/get/' . $this->company_select . '?api-key=' . config('app.get_address_api_key'))->object();
    }
}
