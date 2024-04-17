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
                    <input type="text" wire:model="name" class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror" @if($name && ($routeName=='admin.products.detail' || $routeName=='seller.products.detail' )) data-toggle="tooltip" data-placement="top" title="Add another Product to Change Product Name" readonly @endif />
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
                            <a wire:click="generateCode" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <i class="far fa-lightbulb "></i>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                        </span>
                        <input type="text" wire:model="sku" class="form-control form-control-lg form-control-solid @error('sku') is-invalid @enderror" @if($sku && ($routeName=='admin.products.detail' || $routeName=='seller.products.detail' )) data-toggle="tooltip" data-placement="top" title="Add another Product to Change SKU" readonly @endif />
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
                    <input type="number" step="0.01" wire:model="unit_price" class="form-control form-control-lg form-control-solid @error('unit_price') is-invalid @enderror" />
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
                    <input type="number" step="0.01" wire:model="discount" class="form-control form-control-lg form-control-solid @error('discount') is-invalid @enderror" />
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
                    <input type="number" step="0.01" wire:model="stock" class="form-control form-control-lg form-control-solid @error('stock') is-invalid @enderror" @if($stock && ($routeName=='admin.products.detail' || $routeName=='seller.products.detail' )) data-toggle="tooltip" data-placement="top" title="Add another Product to Change Stock Value" readonly @endif />
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
                    <input type="number" step="0.01" wire:model="reorder" class="form-control form-control-lg form-control-solid @error('reorder') is-invalid @enderror" @if($reorder && ($routeName=='admin.products.detail' || $routeName=='seller.products.detail' )) data-toggle="tooltip" data-placement="top" title="Add another Product to Change Re-Order Stock Value" readonly @endif />
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
                    <input type="number" step="0.01" wire:model="taxrate" class="form-control form-control-lg form-control-solid @error('taxrate') is-invalid @enderror" @if($taxrate && ($routeName=='admin.products.detail' || $routeName=='seller.products.detail' )) data-toggle="tooltip" data-placement="top" title="Add another Product to Change Tax" readonly @endif />
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
                    <input type="number" step="0.01" wire:model="per_unit" class="form-control form-control-lg form-control-solid @error('per_unit') is-invalid @enderror" @if($per_unit && ($routeName=='admin.products.detail' || $routeName=='seller.products.detail' )) data-toggle="tooltip" data-placement="top" title="Add another Product to Change Unit Value" readonly @endif />
                    @error('per_unit')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            @auth('admin')
            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-bold fs-6">Status</label>
                <!--begin::Label-->
                <!--begin::Label-->
                <div class="col-lg-8 d-flex align-items-center">
                    <div class="form-check form-check-solid form-switch fv-row">
                        <input wire:model="status" class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" @if($status && ($routeName=='admin.products.detail' || $routeName=='seller.products.detail' )) disabled @endif />
                        <label class="form-check-label" for="allowmarketing"></label>
                    </div>
                </div>
                <!--begin::Label-->
            </div>
            <!--end::Input group-->
            @endauth



            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-bold fs-6">Brand</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">

                    <div wire:ignore>
                        {{-- Segregation Code, This code segregates add and view routes --}}
                        <select class="form-select form-select-solid" id="select2" data-placeholder="Select a brand" @if($routeName=='admin.products.detail' || $routeName=='seller.products.detail' ) data-toggle="tooltip" data-placement="top" title="Add another Product to Change Brand" disabled @endif>
                            <option>Select Brand</option>
                            @if(auth()->guard('admin')->user() !== null && ($routeName=='admin.products.detail' || $routeName=='admin.products.add'))
                            @auth('admin')

                            @foreach ($brands as $brand)
                            <option {{ $brand_select === $brand->id ? ' selected="selected"' : '' }} value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach

                            @endauth

                            @elseif(auth()->guard('seller')->user() !== null && ($routeName=='seller.products.detail' || $routeName=='seller.products.add'))
                            @auth('seller')
                            @if($brands_seller !== null)
                            @foreach ($brands_seller as $brand)
                            <option {{ $brand_select === $brand->id ? ' selected="selected"' : '' }} value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                            @endif
                            @endauth
                            @endif

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

                    <select class="form-select form-select-solid" id="select22" multiple data-placeholder="Select categories" @if($routeName=='admin.products.detail' || $routeName=='seller.products.detail' ) data-toggle="tooltip" data-placement="top" title="Add another Product to Change Categories" disabled @endif>

                        @foreach ($categories as $category)
                        <option {{ collect($categories_select)->contains($category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                    </select>

                    <small>You can enter name of category. Multiple selection is available.</small>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->



            @if (auth()->guard('seller')->user() !== null && auth()->guard('seller')->user()->is_master && $routeName!='admin.products.add' && $routeName!='admin.products.detail')
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-bold fs-6">Team Member</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <div wire:ignore>
                        <select class="form-select form-select-solid" id="select222" data-placeholder="Select a team member" @if($routeName=='admin.products.detail' || $routeName=='seller.products.detail' ) data-toggle="tooltip" data-placement="top" title="Add another Product to Change Team Member" disabled @endif>
                            <option value="">Select a team member</option>
                            @foreach ($seller_team_members as $seller)
                            <option {{ $seller_select === $seller->id ? ' selected="selected"' : '' }} value="{{ $seller->id }}">{{ $seller->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    @error('seller_select')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!--end::Col-->
            </div>
            <!--end::Row-->

            @endif


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

        $('#select222').select2();
        $('#select222').on('change', function(e) {
            var data = $('#select222').select2("val");
            console.log(data);
            @this.set('seller_select', data);
        });
    });
</script>
@endpush