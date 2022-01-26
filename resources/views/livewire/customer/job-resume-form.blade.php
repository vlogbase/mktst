<div>
    <form wire:submit.prevent="messageAttempt">
        <div class="row">
            <div class="form-group col-md-6 mb-3">
                <input  placeholder="Enter Name *"  class="form-control @error('name') is-invalid @enderror" wire:model="name" type="text">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
             </div>
             <div class="form-group col-md-6 mb-3">
                <input  placeholder="Enter Surname *"  class="form-control @error('surname') is-invalid @enderror" wire:model="surname" type="text">
                @error('surname') <span class="text-danger">{{ $message }}</span> @enderror
             </div>
            <div class="form-group col-md-12 mb-3">
                <input  placeholder="Enter Email *" class="form-control @error('email') is-invalid @enderror" wire:model="email" type="email">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <input  placeholder="Enter Phone *"  class="form-control @error('phone') is-invalid @enderror" wire:model="phone">
                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-6 mb-3">
                <select class="form-control @error('department') is-invalid @enderror" wire:model="department" aria-label="Default select example">
                    <option value="NULL">Select Department</option>
                    <option value="IT">IT</option>
                    <option value="SALES">SALES</option>
                    <option value="MARKETING">MARKETING</option>
                    <option value="FINANCE">FINANCE</option>
                    <option value="OTHER">OTHER</option>
                </select>
                @error('department') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-12 mb-3">
                <textarea  placeholder="Message *"  class="form-control @error('message') is-invalid @enderror" wire:model="message" rows="4"></textarea>
                @error('message') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-12 mb-3">
                
                <input  class="form-control @error('resume') is-invalid @enderror" wire:model="resume" type="file">
                <small>Only PDF Resume accepted</small>
                @error('resume') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-12 mb-3">
                <button type="submit" title="Submit Your Message!" class="btn btn-fill-out" >Send Message</button>
            </div>
        </div>
    </form>	
</div>
