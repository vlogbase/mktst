<div>
    <div class="container-fluid mb-5">
        <!--begin::Table container-->
        <div class="row mt-3 mb-5">
           <!--begin::Col-->
           <div class="col-md-12 col-xl-12 mb-5">
                  <!--begin::Row-->
    <div class="row g-6 g-xl-9 mt-5">
        <!--begin::Col-->
        @foreach ($items as $item)
        <div class="col-md-6 col-xl-4">
            <div class="card card-flush shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">#{{$loop->index+1}}</h3>
                    <div class="card-toolbar">
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
                    </div>
                </div>
                <div class="card-body py-5">
                    <div class="text-center px-4 mb-5">
                        <img class="mw-100 mh-300px card-rounded-bottom" src="{{$item->path}}"/>
                    </div>
                </div>
               
            </div>
        </div>
        <!--end::Col-->
        @endforeach
    </div>

    <!--begin::Row-->
    <div class="row g-6 g-xl-9 mt-5">
        <!--begin::Col-->
        <div class="col-md-12 col-xl-12">
            {{ $items->links() }}
        </div>
    </div>
            </div>
        </div>
    </div>
</div>
