<?php

namespace App\Http\Livewire\Admin\Seller;

use App\Models\Seller;
use Livewire\Component;

class EditMember extends Component
{
    public $member;

    public $name;
    public $email;

    public function mount($memberId)
    {
        $this->member = Seller::findOrFail($memberId);
        $this->name = $this->member->name;
        $this->email = $this->member->email;
    }

    public function updateMember()
    {
        $data =  $this->validate([
            'email' => 'required|email|unique:sellers,email,'.$this->member->id,
            'name' => 'required|min:5|max:160',
        ]);

        $this->member->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->emit('succesAlert', 'Updated!');
    }

    public function render()
    {
        return view('livewire.admin.seller.edit-member');
    }
}
