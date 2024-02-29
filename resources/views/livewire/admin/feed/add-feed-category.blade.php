<div>
    <div class="mb-5 row">
        <div class="col-md-12">
            <form wire:submit.prevent="submit">
                <!--begin::Input group-->
                <div class="input-group mb-4">
                    <input type="text" placeholder="heading"
                        class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror"
                        wire:model="name">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </form>
        </div>
    </div>
    <div class="border-t p-5">
        <div class="row">
            @foreach ($items as $item)
                <div class="col-md-6 my-4">
                    <div class="card border p-2">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h3 class="card-title">{{ $item->name }}</h3>
                            <button wire:click="deleteItem({{$item->id}})" class="btn btn-sm btn-danger">X</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
