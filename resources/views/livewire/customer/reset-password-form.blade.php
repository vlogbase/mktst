<div>
    <form wire:submit.prevent="submit" >

        <div class="form-group row ">
            
            <div class="form-group col-md-12 mb-3">
                <input class="form-control @error('password') is-invalid @enderror" required="" type="password" wire:model="password" placeholder="Password*">
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-12 mb-3">
                <input class="form-control @error('password_confirmation') is-invalid @enderror" required="" type="password" wire:model="password_confirmation" placeholder="Password Confirmation*">
                @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        
        <div class="form-group mb-3">
            <div wire:target="submit" wire:loading.block>Processing...</div>
            <button type="submit" class="btn btn-fill-out btn-block" >Reset</button>
        </div>
    </form>
</div>
