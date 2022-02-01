<div>
    <form wire:submit.prevent="submit">
        <div class="row mb-5">
            @foreach($photos as $photo)
            <div class="col-md-3" >
                <!--begin::Image input-->
                <div class="image-input image-input-empty" wire:key="{{$loop->index}}" data-kt-image-input="true" style="background-image: url({{$photo->temporaryUrl()}})">
                    <!--begin::Image preview wrapper-->
                    <div class="image-input-wrapper w-200px h-125px"></div>
                    <!--end::Image preview wrapper-->

                    <!--begin::Edit button-->
                    <label wire:click="removeMe({{$loop->index}})" class="btn btn-icon btn-circle btn-active-color-danger w-25px h-25px bg-white shadow"
                    data-kt-image-input-action="change"
                    data-bs-toggle="tooltip"
                    data-bs-dismiss="click"
                    title="Remove Item">
                    <i class="bi bi-x fs-2"></i>
                    </label>
                    <!--end::Edit button-->
                </div>
                <!--end::Image input-->
            
            </div>
            @endforeach
        </div>
        <!--begin::Input group-->
        <div class="input-group mb-5">
            <input type="file" class="form-control" wire:model="photos" multiple>
            <button type="submit" class="btn btn-primary" >Save</button>
        </div>
        <!--end::Input group-->
        <div class="row" wire:loading wire:target="photos">
            <div class="col">
                <div x-show="isUploading">
                    <progress max="100" x-bind:value="progress"></progress>
                </div>
            </div>
        </div>
        @error('photos.*') <span class="error">{{ $message }}</span> @enderror
     
    </form>
</div>
