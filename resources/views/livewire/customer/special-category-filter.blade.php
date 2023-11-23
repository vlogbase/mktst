<div class="mt-5">
    @if (!request()->routeIs('products'))
        <div class="widget">
            <h5 class="widget_title">Category Filter </h5>
            <div class="filter_price">

                <div class="flex">
                    <div class="form-check">
                        <input wire:change="filter()" class="form-check-input" wire:model="specialCategoryFilter"
                            type="checkbox" value="catering" id="flexCheckDefault1">
                        <label class="form-check-label" for="flexCheckDefault1">
                            Catering Products
                        </label>
                    </div>
                    <div class="form-check">
                        <input wire:change="filter()" class="form-check-input" wire:model="specialCategoryFilter"
                            type="checkbox" value="convenience" id="flexCheckDefault2">
                        <label class="form-check-label" for="flexCheckDefault2">
                            Convenience Store Products
                        </label>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
