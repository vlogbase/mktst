<div>
    <!--begin::Table container-->
    <div class="row mt-3">
        <!--begin::Col-->
        <div class="col-md-12 col-xl-12">
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle gs-0 gy-5">
                    <!--begin::Table head-->
                    <thead>
                        <tr>
                            <th class="p-0 w-50px"></th>
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
                                <div class="symbol symbol-45px me-2">
                                    <span class="symbol-label">
                                        <!--begin::Svg Icon | path: assets/media/icons/duotune/ecommerce/ecm005.svg-->
                                    <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M20 22H4C3.4 22 3 21.6 3 21V2H21V21C21 21.6 20.6 22 20 22Z" fill="black"/>
                                        <path d="M12 14C9.2 14 7 11.8 7 9V5C7 4.4 7.4 4 8 4C8.6 4 9 4.4 9 5V9C9 10.7 10.3 12 12 12C13.7 12 15 10.7 15 9V5C15 4.4 15.4 4 16 4C16.6 4 17 4.4 17 5V9C17 11.8 14.8 14 12 14Z" fill="black"/>
                                        </svg></span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                            </td>
                            <td>
                                <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$item->ordercode}}</span>
                                <span class="text-muted fw-bold d-block fs-7">{{$item->status}} | {{$item->humanTime()}}</span>
                            </td>
                            <td>
                                <div class="d-flex flex-column w-100 me-2">
                                    
                                        <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6">£{{$item->total_price}}</span>
                                        <span class="text-muted fw-bold d-block fs-7">{{$item->orderproducts->count()}} Item</span>
                                    
                                </div>
                            </td>
                            <td class="text-end">
                                <a href="{{route('admin.orders.detail',$item->id)}}" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
                                            <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
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
