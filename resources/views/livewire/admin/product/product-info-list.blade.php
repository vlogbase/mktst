<div>
    <div class="container-fluid">
         <!--begin::Table container-->
         <div class="row mt-3">
            <!--begin::Col-->
            <div class="col-md-12 col-xl-12">
                <input type="text" class="form-control form-control-lg form-control-solid " placeholder="Search" wire:model="search">
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle gs-0 gy-5">
                        <!--begin::Table head-->
                        <thead>
                            <tr>
                            
                                <th class="p-0 min-w-200px"></th>
                                <th class="p-0 min-w-40px"></th>
                                <th class="p-0 min-w-40px"></th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                
                                <td>
                                    <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$item->key}}</span>
                                    
                                </td>
                                <td>
                                    <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$item->value}}</span>
                                  
                                </td>
                                <td class="text-end">
                                    <a wire:click="deleteItem({{$item->id}})" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            </div>
        </div>

        <!--begin::Row-->
        <div class="row mt-3">
            <!--begin::Col-->
            <div class="col-md-12 col-xl-12">
                {{ $items->links() }}
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
     	Livewire.on('deletedInfoOkay', postId => {
			Swal.fire({
				icon: 'info',
				title: 'Are you sure?',
				showCancelButton: true,
				confirmButtonText: 'Yes, do it!'
			}).then((result) => {
				if (result.isConfirmed) {
					Livewire.emit('processInfoDone', postId)
				}
			})
		})

</script>
@endpush
