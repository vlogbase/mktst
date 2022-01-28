<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\OrderRule;
use Livewire\Component;

class OrderRulesForm extends Component
{
    public $price;
    public $status;
    public OrderRule $order_rule;

    public function mount()
    {
        $order_rule = OrderRule::first();
        $this->order_rule = $order_rule;
        $this->price = $order_rule->price;
        $this->status = $order_rule->status;
    }

    public function submit()
    {
        $data =  $this->validate([
            'status' => 'required',
            'price' => $this->status ? 'required|gte:0' : 'nullable',
        ]);

        if (!$this->status) {
            $this->price = 0;
        }

        $this->order_rule->update([
            'status' => $this->status,
            'price' =>  $this->price
        ]);

        $this->emit('succesAlert', 'Order rule 1 updated!');
    }
    public function render()
    {
        return view('livewire.admin.settings.order-rules-form');
    }
}
