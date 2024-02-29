<div>
    <form wire:submit.prevent="submit">
        <!--begin::Input group-->
        <div class="input-group mb-4">
            <input type="text" placeholder="heading" class="form-control form-control-lg form-control-solid @error('head') is-invalid @enderror" wire:model="head">
        </div>
        <div class="input-group mb-4">
            <select wire:model="category" class="border-l border-dark form-control form-control-solid @error('category') is-invalid @enderror">
                @foreach($list as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group ">
            <input type="text" placeholder="feed url" class="form-control form-control-lg form-control-solid @error('url') is-invalid @enderror" wire:model="url">
            <button type="submit" class="btn btn-primary" >Save</button>
        </div>
        @error('text') <span class="text-danger">{{ $message }}</span> @enderror
        @error('url') <span class="text-danger">{{ $message }}</span> @enderror
    </form>
</div>
