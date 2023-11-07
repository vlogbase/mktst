<div>
    @if ($showModal)
        <div class="modal fade show" tabindex="5" role="dialog" style="display: block;" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="width: 500px;">
                    <div class="modal-header">
                        <h5 class="modal-title">Do you want Re-Order?</h5>
                        <button type="button" class="close " data-dismiss="modal" wire:click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Last Order - {{ $lastOrder->ordercode }}</p>
                        <hr>
                        <div class="row">
                            @foreach ($lastOrder->orderproducts as $item)
                                <div class="col-6 border p-3 mt-2">
                                    <div class="text-center">
                                        <div>
                                            <img style="height:100px;" src="{{ $item->product->getCoverImage() }}"
                                                alt="{{ $item->product->name }}">
                                        </div>
                                        <div class="flex">
                                            <div class="product_price">
                                                <span> <span
                                                        style="font-size: 20px;">{{ intval($item->quantity) }}</span>x</span>
                                                <span style="font-size: 25px;"
                                                    class="price">£{{ $item->product->showPrice() }}</span>
                                                @if ($item->product->discount > 0)
                                                    <del>£{{ $item->product->unit_price }}</del>
                                                @endif
                                            </div>
                                            <span>{{ $item->product->name }}</span>
                                        </div>
                                        <div class="mt-2">
                                            @if ($item->product->calcStock() > 0)
                                                @if ($cartItems->contains('id', $item->product->id))
                                                    <p>Added to Cart</p>
                                                @else
                                                    <button wire:click="addToCart({{ $item->product->id }})"
                                                        class="btn btn-md py-2 btn-dark  rounded-0 ">
                                                        <i class="icon-basket-loaded"></i> Add to Cart
                                                    </button>
                                                @endif
                                            @else
                                                <a class="btn btn-sm btn-light  rounded-0  align-left"
                                                    href="{{ route('contact_us') }}">Contact
                                                    Us</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button wire:click="addAllOfThem" type="button" class="btn btn-success btn-block">Add All of
                            Them</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            // Modal açıldığında
            $('#myModal').on('shown.bs.modal', function() {
                // JavaScript olaylarını burada etkinleştirin
            });

            // Modal kapatıldığında
            $('#myModal').on('hidden.bs.modal', function() {
                // JavaScript olaylarını burada kapatın veya sıfırlayın
            });
        });
    </script>
@endpush
