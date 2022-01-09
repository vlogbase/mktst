<div>
    <form wire:submit.prevent="registerAttempt" >

        <div class="form-group row ">
            <div class="form-group col-md-6 mb-3">
                <input type="text" required="" class="form-control @error('name') is-invalid @enderror" wire:model="name" placeholder="Your Name*">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <input type="text" required="" class="form-control @error('surname') is-invalid @enderror" wire:model="surname" placeholder="Your Surname*">
                @error('surname') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="form-group row ">
            <div class="form-group col-md-6 mb-3">
                <input type="text" required="" class="form-control phone @error('mobile') is-invalid @enderror" wire:model="mobile" placeholder="Your Mobile*">
                @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <input type="text" class="form-control phone @error('phone') is-invalid @enderror" wire:model="phone"  placeholder="Your Phone">
                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            
        </div>
        <hr>
        <div class="form-group row ">
            <div class="form-group col-md-9 mb-3">
                <input  class="form-control @error('company_name') is-invalid @enderror" required="" type="text" wire:model="company_name" placeholder="Company Name*">
                @error('company_name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-3 mb-3">
                <a wire:click="findAddress" class="btn btn-dark btn-block">Find</a>
            </div>
            <div class="form-group col-md-12 mb-3">
                <select class="form-control " wire:model="company_select" aria-label="Default select example">
                   
                        
                        @if(count($companyOptions) > 0)
                        @foreach($companyOptions as $option)
                        <option value="{{$option['id']}}">{{$option['address']}}</option>
                        @endforeach
                        @else
                        <option value="" selected>Select Your Address</option>
                        @endif
                   
                  </select>
                @error('company_select') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group col-md-6 mb-3">
                <input type="text"  class="form-control @error('vat') is-invalid @enderror" wire:model="vat" placeholder="Vat Number">
                @error('vat') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <input type="text" class="form-control @error('registeration') is-invalid @enderror" wire:model="registeration" placeholder="Registeration Number">
                @error('registeration') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            
        </div>
        <hr>
        <div class="form-group row ">
            <div class="form-group col-md-12 mb-3">
                <input type="text" required="" class="form-control @error('email') is-invalid @enderror" wire:model="email" placeholder="Company Email*">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <input class="form-control @error('password') is-invalid @enderror" required="" type="password" wire:model="password" placeholder="Password*">
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <input class="form-control @error('password_confirmation') is-invalid @enderror" required="" type="password" wire:model="password_confirmation" placeholder="Password Confirmation*">
                @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="login_footer form-group mb-3">
            <div class="chek-form">
                <div class="custome-checkbox">
                    <input class="form-check-input" type="checkbox" wire:model="newsletter" id="exampleCheckbox1" value="1">
                    <label class="form-check-label" for="exampleCheckbox1"><span>I would like to subscribe to newsletter</span></label>
                </div>
            </div>
        </div>
        <div class="login_footer form-group mb-3">
            <div class="chek-form">
                <div class="custome-checkbox">
                    <input class="form-check-input " type="checkbox" wire:model="agreement" id="agreement" value="1">
                    <label class="form-check-label @error('agreement') text-danger @enderror" for="agreement"><span>I agree to the SavoyFoods <a class="text-info" href="{{route('terms_and_conditions')}}">Terms and conditions</a> and <a class="text-info" href="{{route('terms_and_conditions')}}">Privacy policy</a>*</span></label>
                </div>
                
            </div>
        </div>
     
        <div class="form-group mb-3">
            <button type="submit" class="btn btn-fill-out btn-block" >Register</button>
        </div>
    </form>
    
</div>
