<div>
    <form wire:submit.prevent="updateMember">
       
        <div class="form-group row ">
            <div class="form-group col-md-12 mb-3">
                <input class="form-control @error('name') is-invalid @enderror" required="" type="text"
                    wire:model="name" placeholder="Full Name*">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-12 mb-3">
                <input type="text" required="" class="form-control @error('email') is-invalid @enderror"
                    wire:model="email" placeholder="Company Email*">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        

        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <div wire:target="updateMember" wire:loading.block>Processing...</div>
            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save</button>
        </div>
    </form>
</div>
