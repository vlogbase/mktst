<?php

namespace App\Http\Livewire\Customer\User;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class OrdersList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public User $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {

        $orders = Order::where('user_id', $this->user->id)->where('status', '!=', 'Waiting')->latest()->paginate(10);
        return view('livewire.customer.user.orders-list', [
            'orders' => $orders,
        ]);
    }
}
