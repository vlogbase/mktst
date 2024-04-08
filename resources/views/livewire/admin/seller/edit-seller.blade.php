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
                    <select wire:model="code" required=""
                        class="form-control @error('code') is-invalid @enderror col-2">
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
                    <textarea class="form-control @error('address') is-invalid @enderror" wire:model="address" placeholder="Address">
                    </textarea>
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-bold fs-6">Activation</label>
                <!--begin::Label-->
                <!--begin::Label-->
                <div class="col-lg-8 d-flex align-items-center">
                    <div class="form-check form-check-solid form-switch fv-row">
                        <input wire:model="activation" class="form-check-input w-45px h-30px" type="checkbox"
                            id="activation" />
                        <label class="form-check-label" for="activation"></label>
                    </div>
                </div>
                <!--begin::Label-->
            </div>
            <!--end::Input group-->

            <!--begin::Row-->
            <div class="row mb-7 @auth('seller') hidden @endauth" >
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label fw-bold fs-6">Brands</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8" wire:ignore>

                    <select class="form-select form-select-solid" id="select123" multiple
                        data-placeholder="Select brands">
                        @foreach ($brands as $brand)
                            <option {{ collect($brand_select)->contains($brand->id) ? 'selected' : '' }}
                                value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>

                    <small>You can enter name of brand. Multiple selection is available.</small>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
    
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <div wire:target="registerAttempt" wire:loading.block>Processing...</div>
                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save</button>
            </div>
        </form>
    
    </div>
    
</div>

@push('scripts')
    <script>
        $(document).ready(function() {

            $('#select123').select2();
            $('#select123').on('change', function(e) {
                var data = $('#select123').select2("val");
                @this.set('brand_select', data);
            });

          
        });
    </script>
@endpush
