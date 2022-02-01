<div>
    <div class="container-fluid mb-5">
        <!--begin::Table container-->
        <div class="row mt-3 mb-5">
           <!--begin::Col-->
           <div class="col-md-12 col-xl-12 mb-5">
                <form wire:submit.prevent="submit">
                    <!--begin::Input group-->
                    <div class="input-group ">
                        <input type="text" placeholder="KEY" class="form-control form-control-lg  form-control-solid @error('key') is-invalid @enderror" wire:model="key">
                        <input type="text" placeholder="VALUE" class="form-control form-control-lg  form-control-solid @error('value') is-invalid @enderror" wire:model="value">
                        <button type="submit" class="btn btn-primary" >Save</button>
                    </div>
                    @error('key') <span class="text-danger">{{ $message }}</span><br> @enderror
                    @error('value') <span class="text-danger">{{ $message }}</span> @enderror
                </form>
            </div>
        </div>
    </div>
    
</div>