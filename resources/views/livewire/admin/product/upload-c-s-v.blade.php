<div>
    <form wire:submit.prevent="upload">
        <div class="row">
            <div class="col-md-6">
                <input type="file" wire:model="csvFile" class="form-control @error('csvFile') is-invalid @enderror">
                @error('csvFile')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6 text-right">
                <button disabled type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>
