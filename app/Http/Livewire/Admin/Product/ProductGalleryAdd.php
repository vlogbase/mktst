<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\ProductImage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductGalleryAdd extends Component
{
    use WithFileUploads;
    public $itemid;

    public $photos = [];

    public function mount($itemid)
    {
        $this->itemid = $itemid;
    }

    public function submit()
    {
        $data =  $this->validate([
            'photos.*' => 'max:3024',
        ]);

        foreach ($this->photos as $photo) {
            $background = $photo->store('upload/product', 'public');

            ProductImage::create([
                'path' => $background,
                'product_id' => $this->itemid,
            ]);
        }

        $this->emit('succesAlert', 'Added!');
        $this->emit('refreshList');
        $this->photos = [];
    }

    public function removeMe($index)
    {
        array_splice($this->photos, $index, 1);
    }

    public function render()
    {
        return view('livewire.admin.product.product-gallery-add');
    }
}
