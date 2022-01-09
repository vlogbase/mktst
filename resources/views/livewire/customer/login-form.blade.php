<div>
    <form wire:submit.prevent="loginAttempt" >
        <div class="form-group mb-3">
            <input type="text" required="" class="form-control @error('email') is-invalid @enderror" wire:model="email" placeholder="Your Email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group mb-3">
            <input class="form-control @error('password') is-invalid @enderror" required="" type="password" wire:model="password" placeholder="Password">
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="login_footer form-group mb-3">
            <div class="chek-form">
                <div class="custome-checkbox">
                    <input class="form-check-input" type="checkbox" wire:model="rememberme" id="exampleCheckbox1" value="1">
                    <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                </div>
            </div>
            <a href="{{route('forget_password')}}">Forgot password?</a>
        </div>
        <div class="form-group mb-3">
            <button type="submit" class="btn btn-fill-out btn-block" >Log in</button>
        </div>
    </form>
</div>
