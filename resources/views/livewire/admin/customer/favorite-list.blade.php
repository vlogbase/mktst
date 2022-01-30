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
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>
                                <div class="symbol symbol-50px me-2">
                                    <span class="symbol-label">
                                        <img src="{{$item->getCoverImage()}}" class="h-50 align-self-center" alt="" />
                                    </span>
                                </div>
                            </td>
                            <td>
                                <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$item->name}}</span>
                                <span class="text-muted fw-bold d-block fs-7">{{$item->sku}}</span>
                            </td>
                            <td>
                                <div class="d-flex flex-column w-100 me-2">
                                    
                                        <span class="text-dark fw-bolder text-hover-primary mb-1 fs-5">£{{$item->showPrice()}}</span>
                                        
                                    
                                </div>
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
