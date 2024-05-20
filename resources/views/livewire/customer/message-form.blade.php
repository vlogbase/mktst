<div>
    <form wire:submit.prevent="messageAttempt">
        <div class="row">
            <div class="form-group col-md-12 mb-3">
                <input  placeholder="Enter Name Surname *"  class="form-control @error('name') is-invalid @enderror" wire:model="name" type="text">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
             </div>
            <div class="form-group col-md-12 mb-3">
                <input  placeholder="Enter Email *" class="form-control @error('email') is-invalid @enderror" wire:model="email" type="email">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-12 mb-3">
                <input  placeholder="Enter Phone"  class="form-control @error('phone') is-invalid @enderror" wire:model="phone">
                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-12 mb-3">
                <input placeholder="Enter Subject"  class="form-control @error('subject') is-invalid @enderror" wire:model="subject">
                @error('subject') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-12 mb-3 d-none">
                <textarea  placeholder="Message *"  class="form-control @error('message') is-invalid @enderror" wire:model="message" rows="4"></textarea>
                @error('message') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-12 mb-3">
                <button type="submit" title="Submit Your Message!" class="btn btn-fill-out" >Send Message</button>
            </div>
        </div>
    </form>		
</div>
