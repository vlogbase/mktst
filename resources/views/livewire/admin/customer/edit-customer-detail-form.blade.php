<div>
    <form wire:submit.prevent="submit">
          <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label  fw-bold fs-6">Company Name</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row">
            <input type="text" wire:model="name"
                class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror" />
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-7">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label  fw-bold fs-6">Company Vat</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row">
            <input type="text" wire:model="vat"
                class="form-control form-control-lg form-control-solid @error('vat') is-invalid @enderror" />
            @error('vat')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-7">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label  fw-bold fs-6">Company Registeration</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row">
            <input type="text" wire:model="registeration"
                class="form-control form-control-lg form-control-solid @error('registeration') is-invalid @enderror" />
            @error('registeration')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-7">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label  fw-bold fs-6">Registered Email</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 d-flex align-items-center">
            <input type="text" wire:model="email"
                class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" />
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-7">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label  fw-bold fs-6">Point</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 d-flex align-items-center">
            <input type="number" step="0.01" wire:model="point"
                class="form-control form-control-lg form-control-solid @error('point') is-invalid @enderror" />
            @error('point')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-7">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label  fw-bold fs-6">Mobile</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 d-flex align-items-center">
            <input type="text" wire:model="mobile"
                class="form-control form-control-lg form-control-solid @error('mobile') is-invalid @enderror" />
            @error('mobile')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-7">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label  fw-bold fs-6">Phone</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 d-flex align-items-center">
            <input type="text" wire:model="phone"
                class="form-control form-control-lg form-control-solid @error('phone') is-invalid @enderror" />
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-7">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label  fw-bold fs-6">Type</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 d-flex align-items-center">
            <select class="form-control form-control-lg form-control-solid @error('type') is-invalid @enderror" wire:model="type">
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
            @error('type')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Actions-->
    <div class="card-footer d-flex justify-content-end py-6 px-9">
        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save</button>
    </div>
    <!--end::Actions-->
    </form>
</div>
