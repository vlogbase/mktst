<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\PaymentMethod;
use Livewire\Component;

class PaymentMethodForm extends Component
{
    public $paymentmethods;

    public function mount()
    {
        $this->paymentmethods = PaymentMethod::all();
    }

    protected $rules = [
        'paymentmethods.*.status' => 'required',
    ];

    public function submit()
    {

        foreach ($this->paymentmethods as $post) {
            $post->save();
        }

        $this->emit('succesAlert', 'Payment Methods updated!');
    }
    public function render()
    {
        return view('livewire.admin.settings.payment-method-form');
    }
}
