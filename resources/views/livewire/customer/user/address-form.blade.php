<div>
    <div class="card-header">
        <h3>Registered & Billing Address <a wire:click="editAddress" style="cursor: pointer;"><i class="fas fa-edit"></i></a></h3>
    </div>
    
    <div class="card-body">
        @if(!$edit)
            <p>{{$address->formatted_address}}</p>
            <p>{{$address->country}} | {{$address->district}} | {{$address->county}}</p>
            <p>{{$address->postcode}} </p>
        @else
        <form wire:submit.prevent="AddAddressAttempt" >
        <div class="form-group row ">
            <div class="form-group col-md-9 mb-3">
                <input  class="form-control @error('zipcode') is-invalid @enderror" required="" type="text" wire:model="zipcode" placeholder="Zipcode*">
                @error('zipcode') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-3 mb-3">
                <a wire:click="findAddress" class="btn btn-dark btn-block">Find</a>
            </div>
            <div class="form-group col-md-12 mb-3">
                <select class="form-control " wire:model="address_select" aria-label="Default select example">
                
                        
                        @if(count($companyOptions) > 0) 
                        @foreach($companyOptions as $option)
                        <option value="{{$loop->index}}">{{$option}}</option>
                        @endforeach
                        @else
                        <option selected>Select Your Address</option>
                        @endif
                
                </select>
                @error('address_select') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class =" form-group col-md-12">
                <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Save</button>
                <a wire:click="cancelEdit" class="btn btn-danger"  >Cancel</a>
            </div>
        </div>
        </form>
        @endif
    </div>

</div>
