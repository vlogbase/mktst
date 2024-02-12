<div>
    <form wire:submit.prevent="submit">
        <!--begin::Input group-->
        <div class="input-group ">
            <input type="text" class=" form-control form-control-lg form-control-solid @error('name') is-invalid @enderror" wire:model="name">
            <button type="submit" class="btn btn-primary" >Save</button>
        </div>
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </form>
</div>
