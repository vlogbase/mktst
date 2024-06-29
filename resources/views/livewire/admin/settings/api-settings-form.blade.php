<div>
    <!--begin::Form-->
    <form wire:submit.prevent="updateApiKey">
        <!--begin::Card body-->
        <div class="card-body border-top p-9">

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
                            data-toggle="tooltip" data-placement="top" title="click key icon to generate new key"
                            readonly />
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
                            id="autoExtend"
                             />
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
        </div>
        <!--end::Card body-->
    </form>
    <!--end::Form-->
</div>
<div>
    <!--begin::Modal-->
    <div wire:ignore.self class="modal fade" id="kt_modal_1" tabindex="-1" aria-labelledby="kt_modal_1_label"
        aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_1_label">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder modal-title"></h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <i class="fa fa-times"></i>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body" id="kt_modal_1_body">
                </div>
                <!--end::Modal body-->
            </div>
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal-->
</div>
<script>
    document.addEventListener('livewire:load', function () {
    Livewire.on('autoExtendSelected', data => {
        let message = `${data.line1}<br><br>${data.line2}<br>${data.line3}<br>${data.line4}<br>${data.line5}`;
        //alert(message);
        //show bootstrap modal
        $('#kt_modal_1').modal('show');
        $('#kt_modal_1 .modal-title').html(data.title);
        $('#kt_modal_1 .modal-body').html(message);  
    });
    Livewire.on('autoExtendNotSelected', data => {
        let message = `${data.line1}`;
        //alert(message);
        //show bootstrap modal
        $('#kt_modal_1').modal('show');
        $('#kt_modal_1 .modal-title').html(data.title);
        $('#kt_modal_1 .modal-body').html(message);  
    });
    //check if auto extend is not checked
    document.getElementById('autoExtend').addEventListener('change', function() {
        if (this.checked) {
            this.value = 1;
        } else {
            this.value = 0;
           
        //alert(message);
        //show bootstrap modal
        $('#kt_modal_1').modal('show');
        $('#kt_modal_1 .modal-title').html("Auto Extend Disabled");
        $('#kt_modal_1 .modal-body').html("Non-Extending API Key Selected <br> Your API key is set to expire in 30 days. Please note the following: <br> Manual Renewal Required: You must renew your key before it expires to avoid any service interruptions. <br> Expiration Reminder: You will receive an email notification 7 days before the key’s expiration. <br> Ensure you update your integrations with the new key upon renewal to maintain uninterrupted access.");
        }
    });
    
});
</script>
