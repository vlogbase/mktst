<?php

namespace App\Http\Livewire\Admin\Campaign\Coupon;

use App\Models\Coupon;
use Livewire\Component;
use Livewire\WithPagination;

class CouponList extends Component
{
    use WithPagination;

    public $list;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['processDone' => 'eventOkay'];

    public function deleteItem($id)
    {
        $this->emit('deletedOkay', $id);
    }

    public function redirectItem($id)
    {
        return redirect()->route('admin.campaigns.coupons.edit', $id);
    }

    public function eventOkay($postId)
    {

        Coupon::find($postId)->delete();


        $this->emit('succesAlert', 'Deleted!');
        $this->resetPage();
    }

    public function render()
    {
        $items = Coupon::latest()->paginate(12);
        return view('livewire.admin.campaign.coupon.coupon-list', [
            'items' => $items,
        ]);
    }
}
