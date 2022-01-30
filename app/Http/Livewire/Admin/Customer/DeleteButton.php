<?php

namespace App\Http\Livewire\Admin\Customer;

use App\Models\User;
use Livewire\Component;

class DeleteButton extends Component
{
    public $itemid;

    protected $listeners = ['processDone' => 'eventOkay'];

    public function deleteItem($id)
    {
        $this->emit('deletedOkay', $id);
    }

    public function eventOkay($postId)
    {
        User::find($postId)->delete();
        $this->emit('succesAlert', 'Deleted!');
        return redirect()->route('admin.customers.list');
    }

    public function render()
    {
        return view('livewire.admin.customer.delete-button');
    }
}
