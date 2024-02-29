<div>
    <form wire:submit.prevent="submit">
        <!--begin::Input group-->
        <div class="input-group ">
            <input type="text" class=" form-control form-control-lg form-control-solid @error('name') is-invalid @enderror" wire:model="name">
            <select wire:model="category" class="border-l border-dark form-control form-control-solid @error('category') is-invalid @enderror">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->head}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary" >Save</button>
        </div>
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        @error('category') <span class="text-danger">{{ $message }}</span> @enderror
    </form>
</div>
