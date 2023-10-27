<div class="mt-5">
    @if (!request()->routeIs('products'))
            <div class="widget">
                <h5 class="widget_title">Promotions </h5>
                <div class="filter_price">
                   
                    <div class="flex">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Discounted Products
                            </label>
                          </div>
                    </div>
                </div>
            </div>
            @endif
</div>
