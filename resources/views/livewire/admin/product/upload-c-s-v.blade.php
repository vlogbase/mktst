<div>
    <form wire:submit.prevent="upload">
        @auth('admin')
        <div class="row">
            <div>
                Your categories image should be in the following format:
                <ul>
                    <li>Structure: <strong>Category Name.extension</strong></li>
                    <li>Ex:  <strong>Adult Drinks.jpeg</strong></li>
                    <li>Accept: <strong>png, webp, jpeg, jpg</strong></li>
                </ul>
            </div>

        </div>
        <!--begin::Input group-->
        <div class="row mt-6 mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Delete Old Data</label>
            <!--begin::Label-->
            <!--begin::Label-->
            <div class="col-lg-8 d-flex align-items-center">
                <div class="form-check form-check-solid form-switch fv-row">
                    <input wire:model="deleteOldData" class="form-check-input w-45px h-30px" type="checkbox"
                        id="best_seller" />
                    <label class="form-check-label" for="best_seller"></label>
                </div>
            </div>
            <!--begin::Label-->
        </div>
        <!--end::Input group-->
        @endauth
        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6">CSV File</label>
            <!--begin::Label-->
            <div class="col-lg-8">
                <div class="form-file  fv-row">
                    <input type="file" wire:model="csvFile"
                        class="form-control @error('csvFile') is-invalid @enderror">
                    @error('csvFile')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!--begin::Label-->
        </div>
        <!--end::Input group-->


        <div class="row">
            <!--begin::Label-->
            <div class="col-md-6 text-right">
                <button type="submit" class="btn btn-primary">Save</button>
                <div wire:loading> 
                    Uploading...
                </div>
            </div>
        </div>
    </form>
</div>
