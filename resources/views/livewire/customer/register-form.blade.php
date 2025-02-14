<div>
    <form wire:submit.prevent="registerAttempt">

        <div class="form-group row ">
            <div class="form-group col-md-6 mb-3">
                <input type="text" required="" class="form-control @error('name') is-invalid @enderror"
                    wire:model="name" placeholder="Your Name*">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <input type="text" required="" class="form-control @error('surname') is-invalid @enderror"
                    wire:model="surname" placeholder="Your Surname*">
                @error('surname')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row ">
            <div class="form-group col-md-2 mb-3">
                <select wire:model="code" required="" class="form-control @error('code') is-invalid @enderror col-2">
                    <option value="">Code*</option>
                    @foreach ($countries as $country)
                        <option value="+{{ $country->phonecode }}">+{{ $country->phonecode }}</option>
                    @endforeach
                </select>
                @error('code')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-4 mb-3">
                <input type="text" required="" id="mobile"
                    class="col-8 form-control @error('mobile') is-invalid @enderror" wire:model="mobile"
                    placeholder="Your Mobile*">
                @error('mobile')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <input type="text" id="phone" class="form-control phone @error('phone') is-invalid @enderror"
                    wire:model="phone" placeholder="Your Phone">
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <hr>
        <div class="form-group col-md-12 mb-3">
            <input class="form-control @error('company_name') is-invalid @enderror" required="" type="text"
                wire:model="company_name" placeholder="Company Name*">
            @error('company_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group row">
            <div class="form-group col-md-6 mb-3">
                <input type="text" class="form-control @error('vat') is-invalid @enderror" wire:model="vat"
                    placeholder="Vat Number">
                @error('vat')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <input type="text" class="form-control @error('registeration') is-invalid @enderror"
                    wire:model="registeration" placeholder="Registeration Number">
                @error('registeration')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row ">
            <div class="form-group col-md-12 mb-3">
                <select class="form-control @error('business_type') is-invalid @enderror" wire:model="business_type"
                    aria-label="Default select example">
                    <option value="">Select Business Type*</option>
                    <optgroup label="Business">
                        <option value="Office Canteen">Office Canteen</option>
                        <option value="Wholesaler">Wholesaler</option>
                    </optgroup>
                    <optgroup label="Education">
                        <option value="School">School</option>
                    </optgroup>
                    <optgroup label="Health &amp; Care">
                        <option value="Hospital">Hospital</option>
                        <option value="Care/Nursing Homes">Care/Nursing Homes</option>
                    </optgroup>
                    <optgroup label="Hotel">
                        <option value="Hotel">Hotel</option>
                    </optgroup>
                    <optgroup label="Pubs">
                        <option value="Pub">Pub</option>
                    </optgroup>
                    <optgroup label="Quick Service">
                        <option value="Cafe">Cafe</option>
                        <option value="Chinese Takeaway">Chinese Takeaway</option>
                        <option value="Sandwich Bar">Sandwich Bar</option>
                        <option value="Mobile Van">Mobile Van</option>
                    </optgroup>
                    <optgroup label="Restaurant">
                        <option value="Burger Restaurant">Burger Restaurant</option>
                        <option value="Chicken Restaurant">Chicken Restaurant</option>
                        <option value="Chinese Restaurant">Chinese Restaurant</option>
                        <option value="Fish & Chips Restaurant">Fish & Chips Restaurant</option>
                        <option value="Indian Restaurant">Indian Restaurant</option>
                        <option value="Kebab Restaurant">Kebab Restaurant</option>
                        <option value="Pizza Restaurant">Pizza Restaurant</option>
                        <option value="General Restaurant">General Restaurant</option>
                        <option value="Turkish Restaurant">Turkish Restaurant</option>
                        <option value="Fast-Food Restaurant">Fast-Food Restaurant</option>
                    </optgroup>
                    <optgroup label="Shop">
                        <option value="Bakery">Bakery</option>
                        <option value="Butcher">Butcher</option>
                        <option value="Supermarket">Supermarket</option>
                        <option value="Convenience Store">Convenience Store</option>
                        <option value="Retail">Retail</option>
                    </optgroup>
                    <optgroup label="Travel &amp; Leisure">
                        <option value="Event Catering">Event Catering</option>
                    </optgroup>
                    <optgroup label="Other">
                        <option value="Theme Park">Theme Park</option>
                        <option value="Offshore">Offshore</option>
                        <option value="Other">Other</option>
                    </optgroup>
                </select>
                @error('business_type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <hr>
        @if(!$manuallyAdressEnter)
        <div class="form-group row ">
            <div class="form-group col-md-9 mb-3">
                <input class="form-control @error('search_address_field') is-invalid @enderror @error('address_select') is-invalid @enderror" 
                    type="text" wire:model="search_address_field" placeholder="Search your address">
                @error('search_address_field')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                @error('address_select')
                        <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-3 mb-3">
                <a wire:click="findAddress" class="btn btn-dark btn-block">Find</a>
            </div>

            @if ($show_address_selection)
                <div class="form-group col-md-12 mb-3">
                    <select class="form-control " wire:model="address_select" aria-label="Default select example">


                        @if (count($companyOptions) > 0)
                            @foreach ($companyOptions as $option)
                                <option value="{{ $option['id'] }}">{{ $option['address'] }}</option>
                            @endforeach
                        @else
                            <option value="" selected>Select Your Address</option>
                        @endif

                    </select>
                    @error('address_select')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            @endif
        </div>
        <small>You can enter your address manually to <a wire:click="openManuallyAddress" style="cursor: pointer" class="color-warning"> Click Here</a>.</small>
        @endif
        @if($manuallyAdressEnter)
        <div class="form-group row mt-3">
            <div class="form-group col-md-12 mb-3">
                <input type="text" required="" class="form-control @error('address_line_1') is-invalid @enderror"
                    wire:model="address_line_1" placeholder="Address Line 1*">
                @error('address_line_1')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-12 mb-3">
                <input type="text" class="form-control @error('address_line_2') is-invalid @enderror"
                    wire:model="address_line_2" placeholder="Address Line 2">
                @error('address_line_2')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <input type="text" class="form-control @error('district') is-invalid @enderror"
                    wire:model="district" placeholder="District">
                @error('district')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <input type="text" class="form-control @error('county') is-invalid @enderror"
                    wire:model="county" placeholder="County">
                @error('county')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <input type="text" required="" class="form-control @error('postcode') is-invalid @enderror"
                    wire:model="postcode" placeholder="Postcode*">
                @error('postcode')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <select wire:model="country" required="" class="form-control @error('country') is-invalid @enderror col-2">
                    <option value="">Country*</option>
                    @foreach ($countryNames as $countryName)
                        <option value="{{ $countryName->name }}">{{ $countryName->name }}</option>
                    @endforeach
                </select>
                @error('country')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        @endif
        <hr>
        <div class="form-group row ">
            <div class="form-group col-md-12 mb-3">
                <input type="text" required="" class="form-control @error('email') is-invalid @enderror"
                    wire:model="email" placeholder="Company Email*">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <input class="form-control @error('password') is-invalid @enderror" required="" type="password"
                    wire:model="password" placeholder="Password*">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <input class="form-control @error('password_confirmation') is-invalid @enderror" required=""
                    type="password" wire:model="password_confirmation" placeholder="Password Confirmation*">
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="login_footer form-group mb-3">
            <div class="chek-form">
                <div class="custome-checkbox">
                    <input class="form-check-input" type="checkbox" wire:model="newsletter" id="exampleCheckbox1"
                        value="1">
                    <label class="form-check-label" for="exampleCheckbox1"><span>I would like to subscribe to
                            newsletter</span></label>
                </div>
            </div>
        </div>
        <div class="login_footer form-group mb-3">
            <div class="chek-form">
                <div class="custome-checkbox">
                    <input class="form-check-input " type="checkbox" wire:model="agreement" id="agreement"
                        value="1">
                    <label class="form-check-label @error('agreement') text-danger @enderror" for="agreement"><span>I
                            agree to the Markket <a class="text-info"
                                href="{{ route('terms_and_conditions') }}">Terms and conditions</a> and <a
                                class="text-info" href="{{ route('terms_and_conditions') }}">Privacy
                                policy</a>*</span></label>
                </div>

            </div>
        </div>

        <div class="form-group mb-3">
            <div wire:target="registerAttempt" wire:loading.block>Processing...</div>
            <button type="submit" class="btn btn-fill-out btn-block">Register</button>
        </div>
    </form>

</div>
