<div>
    @if ($showModal)
        <div class="modal fade show " tabindex="-1" role="dialog"
            style="display: block; opacity: 1; background-color:rgba(0,0,0,0.5)!important;" id="myModal">
            <div class="modal-dialog modal-dialog-centered" style="" tabindex="6">
                <div class="modal-content"
                    style="width: 500px; border-width:7px!important;border-color:black!important; background-color:rgb(255, 241, 223)!important;border-radius:10px!important;">
                    <div class="modal-header">
                        <h5 class="modal-title">Do you want Re-Order?</h5>
                        <button type="button" class="close " data-dismiss="modal" wire:click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-black">Order Num: {{ $lastOrder->ordercode }}</p>
                        <hr>
                        <div class="row">
                            @foreach ($lastOrder->orderproducts as $item)
                                <div class="border px-4 text-dark my-2">
                                    <div class="px-2 py-4 d-flex justify-content-between align-items-center">
                                        <div class="" style="width: 200px;">
                                            {{ $item->product->sku }}
                                            <br>
                                            {{ $item->product->name }}
                                        </div>
                                        <div>
                                            {{ intval($item->quantity) }}x£{{ $item->product->showPrice() }}
                                        </div>
                                        <div  class="text-center" style="width: 70px;">
                                            @if ($item->product->calcStock() > 0)
                                                @if ($cartItems->contains('id', $item->product->id))
                                                    <i class="icon-check"></i>
                                                @else
                                                    <button wire:click="addToCart({{ $item->product->id }})"
                                                        class="btn btn-sm  btn-warning rounded-0 ">
                                                        <i class="icon-basket-loaded"></i>
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
                        <h5 class="mt-2 mb-4">
                            Total Price (Included VAT): £54.00
                        </h5>
                        <button wire:click="addAllOfThem" type="button" class="btn btn-success btn-block">Add All of
                            Them</button><br>
                        <a class="btn btn-warning btn-block" href="/products">Add Products to Your Order</a>
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

            });

            // Modal kapatıldığında
            $('#myModal').on('hidden.bs.modal', function() {
                // JavaScript olaylarını burada kapatın veya sıfırlayın
            });
        });
    </script>
@endpush
