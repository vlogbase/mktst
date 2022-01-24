<div>
    <form wire:submit.prevent="updateAttempt" >
        <div class="row">
            <div class="form-group col-md-6 mb-3">
                <label>First Name <span class="required">*</span></label>
                <input type="text" required="" class="form-control @error('name') is-invalid @enderror" wire:model="name" >
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
             </div>
             <div class="form-group col-md-6 mb-3">
                <label>Last Name <span class="required">*</span></label>
                <input type="text" required="" class="form-control @error('surname') is-invalid @enderror" wire:model="surname" >
                @error('surname') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <label>Mobile <span class="required">*</span></label>
                <input type="text" required="" id="mobile" class="form-control phone @error('mobile') is-invalid @enderror" wire:model="mobile" >
                @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <label>Phone </label>
                <input type="text"  id="phone" class="form-control phone @error('phone') is-invalid @enderror" wire:model="phone"  >
                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-12 mb-3">
                <label>Company Name <span class="required">*</span></label>
                <input  class="form-control @error('company_name') is-invalid @enderror" required="" type="text" wire:model="company_name" >
                @error('company_name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <label>Vat Number</label>
                <input type="text"  class="form-control @error('vat') is-invalid @enderror" wire:model="vat" >
                @error('vat') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <label>Registeration Number</label>
                <input type="text" class="form-control @error('registeration') is-invalid @enderror" wire:model="registeration" >
                @error('registeration') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-12 mb-3">
                <label>Email Address <span class="required">*</span></label>
                <input type="text" required="" class="form-control @error('email') is-invalid @enderror" wire:model="email" >
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-12 mb-3">
                <select class="form-control @error('business_type') is-invalid @enderror" wire:model="business_type" aria-label="Default select example">
                    <optgroup label="Business">
                        <option value="Office Canteen">Office Canteen</option>
                        <option value="Wholesaler">Wholesaler</option>
                    </optgroup>
                    <optgroup label="Education">
                        <option value="School">School</option>
                    </optgroup><optgroup label="Health &amp; Care">
                        <option value="Hospital">Hospital</option>
                        <option value="Care/Nursing Homes">Care/Nursing Homes</option>
                    </optgroup><optgroup label="Hotel">
                        <option value="Hotel">Hotel</option>
                    </optgroup><optgroup label="Pubs">
                        <option value="Pub">Pub</option>
                    </optgroup><optgroup label="Quick Service">
                        <option value="Cafe">Cafe</option>
                        <option value="Chinese Takeaway">Chinese Takeaway</option>
                        <option value="Sandwich Bar">Sandwich Bar</option>
                        <option value="Mobile Van">Mobile Van</option>
                    </optgroup><optgroup label="Restaurant">
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
                    </optgroup><optgroup label="Shop">
                        <option value="Bakery">Bakery</option>
                        <option value="Butcher">Butcher</option>
                        <option value="Supermarket">Supermarket</option>
                        <option value="Convenience Store">Convenience Store</option>
                        <option value="Retail">Retail</option>
                    </optgroup><optgroup label="Travel &amp; Leisure">
                        <option value="Event Catering">Event Catering</option>
                    </optgroup><optgroup label="Other">
                        <option value="Theme Park">Theme Park</option>
                        <option value="Offshore">Offshore</option>
                        <option value="Other">Other</option>
                    </optgroup>
                  </select>
                @error('business_type') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Save</button>
            </div>
        </div>
    </form>
</div>
