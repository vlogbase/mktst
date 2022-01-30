<?php

namespace App\Http\Livewire\Admin\Customer;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class OrderList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $userid;

    public function render()
    {
        $items = Order::where('user_id', $this->userid)->latest()->paginate(5, ['*'], 'ordersPage');
        return view('livewire.admin.customer.order-list', [
            'items' => $items,
        ]);
    }
}
