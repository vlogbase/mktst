<div>
    <div>
        <form wire:submit.prevent="registerAttempt">
            <div class="form-group col-md-12 mb-3">
                <input class="form-control @error('name') is-invalid @enderror" required="" type="text"
                    wire:model="name" placeholder="Company Name*">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group row mb-3">
                <div class="form-group col-md-3 mb-3">
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
                <div class="form-group col-md-9 mb-3">
                    <input type="text" required="" id="phone"
                        class="col-8 form-control @error('phone') is-invalid @enderror" wire:model="phone"
                        placeholder="Your Mobile*">
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <hr>
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
                <div class="form-group col-md-12 mb-3">
                    <textarea class="form-control @error('address') is-invalid @enderror" wire:model="address"
                        placeholder="Address">
                    </textarea>
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
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
    
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <div wire:target="registerAttempt" wire:loading.block>Processing...</div>
                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save</button>
            </div>
        </form>
    
    </div>
    
</div>
