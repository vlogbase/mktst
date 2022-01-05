<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function about_us()
    {
        return view('customer.other.about-us');
    }

    public function contact_us()
    {
        return view('customer.other.contact-us');
    }

    public function career()
    {
        return view('customer.career.index');
    }

    public function career_detail($job)
    {
        return view('customer.career.detail');
    }

    public function terms_and_conditions()
    {
        return view('customer.other.terms-and-conditions');
    }

    public function search_result($search)
    {
        return view('customer.other.search-result');
    }

    public function maintenance()
    {

        return view('customer.other.maintenance');
    }
}
