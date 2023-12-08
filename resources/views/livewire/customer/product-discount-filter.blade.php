<div class="mt-5">
    @if (!request()->routeIs('products'))
            <div class="widget">
                <h5 class="widget_title">Promotions </h5>
                <div class="filter_price">
                   
                    <div class="flex">
                        <div class="form-check">
                            <input wire:change="changeDiscountFilter" class="form-check-input" wire:model="discountFilter" type="checkbox" value="1" id="flexCheckDefault">
                            <label style="color:black!important;font-weight:500!important;font-size:20px!important;" class="form-check-label" for="flexCheckDefault">
                              Discounted Products
                            </label>
                          </div>
                    </div>
                </div>
            </div>
            @endif
</div>
