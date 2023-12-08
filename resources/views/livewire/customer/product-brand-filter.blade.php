<div class="mt-5">
    @if (!request()->routeIs('products'))
            <div class="widget">
                <h5 class="widget_title">Brand Filter </h5>
                <div class="filter_price">
                    
                    @foreach($brands->take($perPage) as $brand)
                        <div class="flex">
                            <div class="form-check" >
                                <input wire:change="changeBrands({{ $brand['id'] }})" wire:model="selectedBrands"  class="form-check-input" type="checkbox" value="{{$brand['id']}}" >
                                <label style="color:black!important;font-weight:500!important;font-size:20px!important;" class="form-check-label" for="flexCheckDefault">
                                {{$brand['name']}}
                                </label>
                            </div>
                        </div>
                    @endforeach
                    
                    @if($showMoreBoolean)
                    <div class="mt-2">
                        <button wire:click="applyShowBtn" class="btn btn-sm">{{$showMoreButtonStatus ? 'Show Less' : 'Show More'}}</button>
                    </div>
                    @endif
                </div>
            </div>
            @endif
</div>
