<div>
    <form wire:submit.prevent="submit" >
        <div class="form-group mb-3">
            <input  type="text" required="" class="form-control @error('title') is-invalid @enderror" wire:model="title" placeholder="Title">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group mb-3">
            <input required="" type="text" required="" class="form-control @error('description') is-invalid @enderror" wire:model="description" placeholder="Description">
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group mb-3">
            <select required="" class="form-control form-control-solid @error('topic') is-invalid @enderror" wire:model="topic">
                <option value="">Select Topic</option>
                <option value="General">General</option>
                <option value="Technical">Technical</option>
                <option value="Order">Order</option>
                <option value="Billing">Billing</option>
                <option value="Other">Other</option>
            </select>
            @error('topic') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group mb-3">
            <textarea required="" class="form-control @error('ticket_message') is-invalid @enderror" wire:model="ticket_message" placeholder="Message">
            </textarea>
            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group mb-3">
            <div wire:target="loginAttempt" wire:loading.block>Processing...</div>
            <button  type="submit" class="btn btn-fill-out btn-block" >Create</button>
        </div>
    </form>
</div>
