<div>
    @if ($showModal)
        <div class="modal fade show " tabindex="-1" role="dialog"
            style="display: block; opacity: 1; background-color:rgba(0,0,0,0.5)!important;" id="myModal">
            <div class="modal-dialog modal-dialog-centered" style="" tabindex="6">
                <div class="modal-content"
                    style="width: 500px; border-width:7px!important;border-color:black!important; background-color:rgb(255, 241, 223)!important;border-radius:10px!important;">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark fs-4">Special Offer for YOU!</h5>
                        <button type="button" class="close " data-dismiss="modal" wire:click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       <img src="/upload/popup/MARKKET.jpg" alt="">
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-warning btn-block" href="/category/markket-specials">
                            <span class="fs-3 fw-bold">Go for Specials!</span>
                        </a>
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
