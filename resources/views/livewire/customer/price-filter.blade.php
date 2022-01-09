<div class="widget">
    <h5 class="widget_title">Price Filter </h5>
    
    <div class="filter_price">
        <div class="row g-3 align-items-center">
            @error('price_first') <span class="error">{{ $message }}</span> @enderror
            @error('price_second') <span class="error">{{ $message }}</span> @enderror
            @if($appliedFilter != '')
            <span class="text-danger mb-2">Applied : {{$appliedFilter}} <strong><a wire:click="removeFilter" style="cursor: pointer;">X</a></strong> </span>
            @endif
            <div class="col-6">
                <label for="price_first" class="form-label">Min</label>
              <input wire:model="price_first" min='0' type="number" step="0.01" class="form-control" id="price_first">
              
            </div>
            <div class="col-6">
                <label for="price_second" class="form-label">Max</label>
                <input wire:model="price_second"  type="number" step="0.01"  class="form-control" id="price_second">
               
            </div>
          </div>
          <div class="row mt-2 g-3 align-items-center">
            <div class="col-12">
             <button wire:click="applyFilter" class="btn btn-dark btn-block">Apply</button>
            </div>
            
          </div>
     </div>
</div>