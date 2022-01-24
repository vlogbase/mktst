<?php

namespace App\Http\Livewire\Customer\User;

use App\Models\User;
use App\Models\UserOffice;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Manny;

class DetailForm extends Component
{
    public $name;
    public $surname;
    public $mobile;
    public $phone;
    public $company_name;
    public $vat;
    public $registeration;
    public $email;
    public $business_type;
    public User $user;

    public function mount()
    {
        $this->user = Auth::user();

        $this->name = $this->user->userdetail->name;
        $this->surname = $this->user->userdetail->surname;
        $this->mobile = $this->user->userdetail->mobile;
        $this->phone = $this->user->userdetail->phone;
        $this->company_name = $this->user->name;
        $this->vat = $this->user->vat;
        $this->registeration = $this->user->registeration;
        $this->email = $this->user->email;
        $this->business_type = $this->user->userdetail->business_type;
    }

    public function updated($field)
    {
        if ($field == 'mobile') {
            //this is where we will detect any changes to the mobile field.
            $this->mobile = Manny::mask($this->mobile, "+111111111111");
        }
        if ($field == 'phone') {
            //this is where we will detect any changes to the mobile field.
            $this->phone = Manny::mask($this->phone, "+111111111111");
        }
    }


    public function updateAttempt()
    {

        $data =  $this->validate([
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'name' => 'required|min:2|max:50',
            'surname' => 'required|min:2|max:50',
            'mobile' => 'required|min:13|max:13',
            'phone' => 'nullable|min:13|max:13',
            'company_name' => 'required|min:5|max:160',
            'vat' => 'nullable|min:5|max:15',
            'registeration' => 'nullable|min:10|max:30',
            'business_type' => 'required|min:2'
        ]);

        $this->user->update([
            'name' => $this->company_name,
            'email' => $this->email,
            'vat' => $this->vat,
            'registeration' => $this->registeration,

        ]);


        $this->user->userdetail->update([
            'name' => $this->name,
            'surname' => $this->surname,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'business_type' => $this->business_type
        ]);

        $office = UserOffice::where('user_id', $this->user->id)->where('is_billing', 1)->first();
        $office->update([
            'name' => $this->name,
            'surname' => $this->surname,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'email' => $this->email,
        ]);


        $this->emit('succesAlert', 'Details updated!');
    }

    public function render()
    {
        return view('livewire.customer.user.detail-form');
    }
}
