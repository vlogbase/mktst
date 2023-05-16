<div class="card-body">
    @foreach ($items as $item)
        <div class="row mt-4">
            <div class="col d-flex justify-content-between">
                <div class="">
                    {{ strtoupper($item->brand) }} **** {{ $item->last4 }}
                    @if ($item->is_default)
                        <span class="badge bg-success">Default</span>
                    @endif
                    <br>
                    Expires {{ $item->getExpirationDateFormatted() }}
                </div>
                <div>
                    @if (!$item->is_default)
                        <button wire:click="defaultCard({{$item->id}})" class="btn btn-primary btn-sm">Default</button>
                    @endif

                    <button class="btn btn-danger btn-sm">Delete</button>
                </div>
            </div>
        </div>
    @endforeach
</div>
