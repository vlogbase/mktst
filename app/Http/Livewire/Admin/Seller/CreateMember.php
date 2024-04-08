<?php

namespace App\Http\Livewire\Admin\Seller;

use App\Models\Seller;
use App\Models\SellerDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Validation\Rules\Password;

class CreateMember extends Component
{
    public $seller;

    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function mount($sellerId)
    {
        $this->seller = SellerDetail::findOrFail($sellerId);
    }

    public function registerAttempt(){
        $data =  $this->validate([
            'password' => ['required', 'string', Password::min(8), 'confirmed'],
            'password_confirmation' => 'required',
            'email' => 'required|email|unique:sellers,email',
            'name' => 'required|min:5|max:160',
        ]);

        Seller::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'seller_detail_id' => $this->seller->id,
            'is_master' => 0,
        ]);

        if(Auth::guard('seller')->check()){
            return redirect()->route('seller.team.list');
        }else{
            return redirect()->route('admin.sellers.edit', $this->seller->id);
        }
        
    }


    public function render()
    {
        return view('livewire.admin.seller.create-member');
    }
}
