<?php

namespace App\Http\Livewire\Customer\User;

use App\Models\PaymentCard;
use App\Models\User;
use App\Traits\PaymentStripeHelper;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PaymentList extends Component
{
    use WithPagination;
    use PaymentStripeHelper;

    protected $paginationTheme = 'bootstrap';
    public User $user;
    public $paymentList;

    public function mount()
    {
        $this->user = Auth::user();
        $this->paymentList = $this->user->paymentCards;
    }

    public function defaultCard($id)
    {
        $paymentCard = PaymentCard::where('user_id', $this->user->id)->where('id', $id)->firstOrFail();
        $this->setDefaultPaymentMethod($paymentCard);
        $this->paymentList = $this->user->paymentCards->fresh();
    }

    public function render()
    {
        
        return view('livewire.customer.user.payment-list',[
            'items' => $this->paymentList,
        ]);
    }
}
