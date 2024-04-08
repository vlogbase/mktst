<?php

namespace App\Http\Livewire\Admin\Seller;

use App\Models\Seller;
use Livewire\Component;
use Livewire\WithPagination;

class TeamList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $seller;
    public $currentPage = 1;
    public $path;

    public function mount($seller)
    {
        $this->seller = $seller;
        $this->currentPage = request()->query('sellerProductList', 1);
    }

    public function deleteItem($id)
    {
        $item = Seller::findOrFail($id);
        $item->delete();
        $this->emit('succesAlert', 'Deleted!');
    }

    public function render()
    {
        $items = Seller::latest()->where('seller_detail_id', $this->seller->id);
        $this->path = 'admin/sellers/'.$this->seller->id.($this->currentPage ? '?productsPage='.$this->currentPage : '') ;
        return view('livewire.admin.seller.team-list',[
            'items' => $items->paginate(5, ['*'], 'sellerProductList'),
        ]);
    }

}
