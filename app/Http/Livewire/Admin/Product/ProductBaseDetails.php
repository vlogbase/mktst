<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use Livewire\Component;
use Illuminate\Support\Str;

class ProductBaseDetails extends Component
{
    public $brand_select = '';
    public $categories_select = [];
    public $itemid;
    public $status;
    public $per_unit;
    public $taxrate;
    public $reorder;
    public $stock;
    public $discount;
    public $unit_price;
    public $name;
    public $sku;
    public $item;


    public function mount($itemid)
    {
        $this->brands = Brand::all();
        $this->categories = Category::all();
        if ($itemid == 0) {
            $this->taxrate = 0;
            $this->discount = 0;
            $this->reorder = 10;
            $this->stock = 0;
            $this->status = 0;
            $this->per_unit = 1;
        } else {
            $this->item = Product::find($itemid);
            $this->itemid = $itemid;
            $this->taxrate = $this->item->taxrate;
            $this->discount = $this->item->discount;
            $this->reorder = $this->item->reorder;
            $this->stock = $this->item->stock;
            $this->status = $this->item->status;
            $this->per_unit = $this->item->per_unit;
            $this->name = $this->item->name;
            $this->sku = $this->item->sku;
            $this->unit_price = $this->item->unit_price;
            $this->brand_select = $this->item->brand_id;
            $this->categories_select = $this->item->categories->pluck('id');
        }
    }

    public function generateCode()
    {
        $this->sku = strtoupper(Str::random(10));
    }

    public function submit()
    {
        $data =  $this->validate([
            'sku' => $this->itemid != 0 ? 'required|min:2|max:100|unique:products,sku,' . $this->itemid : 'required|min:2|max:100|unique:products,sku',
            'name' => $this->itemid != 0 ? 'required|min:2|max:100|unique:products,name,' . $this->itemid : 'required|min:2|max:100|unique:products,name',
            'unit_price' => 'required|gt:0',
            'discount' => 'required|gte:0',
            'stock' => 'required',
            'reorder' => 'required|gt:0',
            'taxrate' => 'required|gte:0',
            'per_unit' => 'required|gt:0',
        ]);

        if ($this->itemid != 0) {
            $this->item->update([
                'sku' =>  $this->sku,
                'name' =>  $this->name,
                'slug' => Str::slug($this->name),
                'unit_price' => $this->unit_price,
                'discount' => $this->discount,
                'stock' => $this->stock,
                'reorder' => $this->reorder,
                'taxrate' => $this->taxrate,
                'per_unit' => $this->per_unit,
                'status' => $this->status ? 1 : 0,
                'brand_id' => $this->brand_select != '' ? $this->brand_select  : NULL,
            ]);

            $this->item->categories()->sync($this->categories_select);
            $this->emit('succesAlert', 'Updated!');
        } else {
            $item = Product::create([
                'sku' =>  $this->sku,
                'name' =>  $this->name,
                'slug' => Str::slug($this->name),
                'unit_price' => $this->unit_price,
                'discount' => $this->discount,
                'stock' => $this->stock,
                'reorder' => $this->reorder,
                'taxrate' => $this->taxrate,
                'per_unit' => $this->per_unit,
                'status' => $this->status ? 1 : 0,
                'brand_id' => $this->brand_select != '' ? $this->brand_select  : NULL,
            ]);

            ProductDetail::create([
                'product_id' => $item->id,
            ]);

            $item->categories()->sync($this->categories_select);

            return redirect()->route('admin.products.detail', $item->id);
        }
    }

    public function render()
    {
        return view('livewire.admin.product.product-base-details');
    }
}
