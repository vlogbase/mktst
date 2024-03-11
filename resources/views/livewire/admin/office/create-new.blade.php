<div>
    <form wire:submit.prevent="AddAddressAttempt">
        <div class="form-group row ">
            <div class="form-group col-md-12 mb-3">
                <label>Office Name <span class="required">*</span></label>
                <input type="text" required=""
                    class="form-control @error('office_name') is-invalid @enderror"
                    wire:model="office_name">
                @error('office_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <label>First Name <span class="required">*</span></label>
                <input type="text" required=""
                    class="form-control @error('name') is-invalid @enderror" wire:model="name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <label>Last Name <span class="required">*</span></label>
                <input type="text" required=""
                    class="form-control @error('surname') is-invalid @enderror" wire:model="surname">
                @error('surname')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-2 mb-3">
                <label>Code<span class="required">*</span> </label>
                <select wire:model="code" required="" class="form-control required @error('code') is-invalid @enderror col-2">
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
                <label>Mobile<span class="required">*</span> </label>
                <input type="text" required="" id="mobile"
                    class="col-8 form-control required @error('mobile') is-invalid @enderror" wire:model="mobile"
                    placeholder="Your Mobile*">
                @error('mobile')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <label>Phone </label>
                <input type="text" id="phone"
                    class="form-control phone @error('phone') is-invalid @enderror" wire:model="phone">
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-12 mb-3">
                <label>Email Address <span class="required">*</span></label>
                <input type="text" required=""
                    class="form-control @error('email') is-invalid @enderror" wire:model="email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            @if (!$manuallyAdressEnter)
                <div class="form-group col-md-9 mb-3">
                    <input class="form-control @error('zipcode') is-invalid @enderror" required=""
                        type="text" wire:model="zipcode" placeholder="Zipcode*">
                    @error('zipcode')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-md-3 mb-3">
                    <a wire:click="findAddress" class="btn btn-dark btn-block">Find</a>
                </div>

                <div class="form-group col-md-12 mb-3">
                    <select class="form-control " wire:model="address_select"
                        aria-label="Default select example">


                        @if (count($companyOptions) > 0)
                            @foreach ($companyOptions as $option)
                                <option value="{{ $loop->index }}">{{ $option }}</option>
                            @endforeach
                        @else
                            <option selected>Select Your Address</option>
                        @endif

                    </select>
                    @error('address_select')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <small class="mb-3">You can enter your address manually to <a
                        wire:click="openManuallyAddress" style="cursor: pointer" class="color-warning">
                        Click Here</a>.</small>
            @endif
            @if ($manuallyAdressEnter)
                <div class="form-group row mt-3">
                    <div class="form-group col-md-12 mb-3">
                        <input type="text" required=""
                            class="form-control @error('address_line_1') is-invalid @enderror"
                            wire:model="address_line_1" placeholder="Address Line 1*">
                        @error('address_line_1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <input type="text"
                            class="form-control @error('address_line_2') is-invalid @enderror"
                            wire:model="address_line_2" placeholder="Address Line 2">
                        @error('address_line_2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <input type="text"
                            class="form-control @error('district') is-invalid @enderror"
                            wire:model="district" placeholder="District">
                        @error('district')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <input type="text"
                            class="form-control @error('county') is-invalid @enderror"
                            wire:model="county" placeholder="County">
                        @error('county')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <input type="text" required=""
                            class="form-control @error('postcode') is-invalid @enderror"
                            wire:model="postcode" placeholder="Postcode*">
                        @error('postcode')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <select wire:model="country" required=""
                            class="form-control @error('country') is-invalid @enderror col-2">
                            <option value="">Country*</option>
                            @foreach ($countryNames as $countryName)
                                <option value="{{ $countryName->name }}">{{ $countryName->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('country')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            @endif
            <div class ="mt-4 form-group col-md-12">
                <button type="submit" class="btn btn-primary" name="submit"
                    value="Submit">Add</button>
                <a wire:click="cancelEdit" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
</div>
