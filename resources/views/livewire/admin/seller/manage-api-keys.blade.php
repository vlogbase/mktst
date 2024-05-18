<div>
    <form wire:submit.prevent="updateApiKey">
        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label  fw-bold fs-6">API Key</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <div class="input-group ">
                    <span class="input-group-text" id="basic-addon1">
                        <a wire:click="generateApiKey"
                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                            <span class="svg-icon svg-icon-3">
                                <i class="fa fa-key"></i>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                    </span>
                    <input type="text" wire:model="api_key"
                        class="form-control form-control-lg form-control-solid @error('api_key') is-invalid @enderror"
                        data-toggle="tooltip" data-placement="top" title="Add another Product to Change SKU" readonly />
                </div>
                @error('api_key')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label  fw-bold fs-6">Auto Extend</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 d-flex align-items-center">
                <div class="form-check form-check-solid form-switch fv-row">
                    <input wire:model="auto_extend" class="form-check-input w-45px h-30px" type="checkbox"
                        id="autoExtend" />
                    <label class="form-check-label" for="autoExtend"></label>
                </div>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        <!--end::Actions-->
    </form>
</div>
