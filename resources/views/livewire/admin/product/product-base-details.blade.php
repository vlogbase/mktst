<div>


    <!--begin::Form-->
    <form id="kt_account_profile_details_form" class="form" wire:submit.prevent="submit">
        <!--begin::Card body-->
        <div class="card-body border-top p-9">
            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-bold fs-6">Product Name</label>
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
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-bold fs-6">SKU</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <div class="input-group ">
                        <span class="input-group-text" id="basic-addon1">
                            <a wire:click="generateCode"
                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <i class="far fa-lightbulb "></i>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                        </span>
                        <input type="text" wire:model="sku"
                            class="form-control form-control-lg form-control-solid @error('sku') is-invalid @enderror" />
                    </div>
                    @error('sku')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-bold fs-6">Unit Price</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <input type="number" step="0.01" wire:model="unit_price"
                        class="form-control form-control-lg form-control-solid @error('unit_price') is-invalid @enderror" />
                    @error('unit_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-bold fs-6">Discount</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <input type="number" step="0.01" wire:model="discount"
                        class="form-control form-control-lg form-control-solid @error('discount') is-invalid @enderror" />
                    @error('discount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-bold fs-6">Stock</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <input type="number" step="0.01" wire:model="stock"
                        class="form-control form-control-lg form-control-solid @error('stock') is-invalid @enderror" />
                    @error('stock')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-bold fs-6">Re-Order Stock</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <input type="number" step="0.01" wire:model="reorder"
                        class="form-control form-control-lg form-control-solid @error('reorder') is-invalid @enderror" />
                    @error('reorder')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-bold fs-6">Tax</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <input type="number" step="0.01" wire:model="taxrate"
                        class="form-control form-control-lg form-control-solid @error('taxrate') is-invalid @enderror" />
                    @error('taxrate')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-bold fs-6">Unit</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <input type="number" step="0.01" wire:model="per_unit"
                        class="form-control form-control-lg form-control-solid @error('per_unit') is-invalid @enderror" />
                    @error('per_unit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-bold fs-6">Status</label>
                <!--begin::Label-->
                <!--begin::Label-->
                <div class="col-lg-8 d-flex align-items-center">
                    <div class="form-check form-check-solid form-switch fv-row">
                        <input wire:model="status" class="form-check-input w-45px h-30px" type="checkbox"
                            id="allowmarketing" />
                        <label class="form-check-label" for="allowmarketing"></label>
                    </div>
                </div>
                <!--begin::Label-->
            </div>
            <!--end::Input group-->

            @auth('admin')
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-bold fs-6">Seller</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <div wire:ignore>
                        <select class="form-select form-select-solid" id="select2" data-placeholder="Select a brand">
                            <option>Select Seller</option>
                            @foreach ($sellers as $seller)
                                <option {{ $seller_select === $seller->id ? ' selected="selected"' : '' }}
                                    value="{{ $seller->id }}">{{ $seller->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('brand_select')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!--end::Col-->
            </div>
            <!--end::Row-->
            @endauth

            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-bold fs-6">Brand</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <div wire:ignore>
                        <select class="form-select form-select-solid" id="select2" data-placeholder="Select a brand">
                            <option>Select Brand</option>
                            @foreach ($brands as $brand)
                                <option {{ $brand_select === $brand->id ? ' selected="selected"' : '' }}
                                    value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('brand_select')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label fw-bold fs-6">Categories</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8" wire:ignore>

                    <select class="form-select form-select-solid" id="select22" multiple
                        data-placeholder="Select categories">
                        @foreach ($categories as $category)
                            <option {{ collect($categories_select)->contains($category->id) ? 'selected' : '' }}
                                value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <small>You can enter name of category. Multiple selection is available.</small>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->


        </div>
        <!--end::Card body-->
        <!--begin::Actions-->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save</button>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#select2').select2();
            $('#select2').on('change', function(e) {
                var data = $('#select2').select2("val");
                @this.set('brand_select', data);
            });

            $('#select22').select2();
            $('#select22').on('change', function(e) {
                var data = $('#select22').select2("val");
                @this.set('categories_select', data);
            });
        });
    </script>
@endpush
