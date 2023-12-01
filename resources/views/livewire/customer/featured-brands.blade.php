<div>
    <div class="row">
        @if(count($selectedBrands) > 0)
        <div wire:click="selectBrand('ALL')" style="cursor: pointer;" class=" col-md-2 mx-2 border border-rounded d-flex align-items-center justify-content-center pt-4">
            <p class="text-dark">ALL</p>
        </div>
        @endif
        @foreach($featuredBrands as $brand)
        <div wire:click="selectBrand({{ $brand['id'] }})" style="cursor: pointer;" 
        class=" col-md-2 mx-2 border border-rounded d-flex align-items-center 
        {{ in_array($brand['id'], $selectedBrands) ? 'border-success' : '' }}
        justify-content-center pt-4">
            <p class="text-dark">{{$brand['name']}}</p>
        </div>
    @endforeach
    </div>
</div>
