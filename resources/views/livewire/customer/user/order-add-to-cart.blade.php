<div class="py-2">
    <div class="d-flex justify-content-between">
            <select class="form-control w-50 " wire:model="quantity">
                @for($i = 1; $i <= 50; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
            <button class=" btn btn-sm btn-secondary" wire:click="addToCart({{$product->id}},{{$quantity}})">
                <i class="fas fa-shopping-cart"></i>
            </button>
    </div>
</div>
