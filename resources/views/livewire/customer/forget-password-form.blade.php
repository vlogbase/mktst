<div>
    <form wire:submit.prevent="loginAttempt" >
        <div class="form-group mb-3">
            <input type="text" required="" class="form-control @error('email') is-invalid @enderror" wire:model="email" placeholder="Your Email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group mb-3">
            <div wire:target="loginAttempt" wire:loading.block>Processing...</div>
            <button  type="submit" class="btn btn-fill-out btn-block" >Send Reset Link</button>
        </div>
    </form>
</div>
