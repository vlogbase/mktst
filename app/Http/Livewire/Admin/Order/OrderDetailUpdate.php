<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;

class OrderDetailUpdate extends Component
{

    public Order $order;
    public $status;
    public $pay_status;

    public function mount($order)
    {
        $this->order = $order;
        $this->status = $order->status;
        $this->pay_status = $order->pay_status;
    }

    protected $listeners = ['processDone' => 'eventOkay'];

    public function deleteItem($id)
    {
        $this->emit('deletedOkay', $id);
    }

    public function eventOkay($postId)
    {
        Order::find($postId)->delete();
        $this->emit('succesAlert', 'Deleted!');
        return redirect()->route('admin.orders.list');
    }

    public function submit()
    {
        $this->order->update([
            'status' => $this->status,
            'pay_status' => $this->pay_status,
        ]);
        $this->emit('succesAlert', 'Updated!');
    }

    public function render()
    {
        return view('livewire.admin.order.order-detail-update');
    }
}
