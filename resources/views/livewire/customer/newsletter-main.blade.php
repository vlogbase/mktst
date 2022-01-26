<div class="section bg_default small_pt small_pb">
	<div class="container">	
    	<div class="row align-items-center">	
            <div class="col-md-6">
                <div class="heading_s1 mb-md-0 heading_light">
                    <h3>Subscribe Our Newsletter</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="newsletter_form">
                    <form wire:submit.prevent="newsletterAttempt">
                        
                        <input type="text" wire:model="email" class="form-control rounded-0 @error('email') is-invalid @enderror" placeholder="Enter Email Address">
                        <button type="submit" class="btn btn-dark rounded-0" >Subscribe</button>
                    </form>
                    @error('email') <span class="text-white">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
    </div>
</div>