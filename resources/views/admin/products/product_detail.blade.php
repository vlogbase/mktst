@extends('admin.layouts.templates.panel')
@section('title','Product')
@section('sub-title','Detail')
@section('content')
<!--begin::Toolbar-->
<div class="d-flex flex-wrap flex-stack mb-6">
    <!--begin::Heading-->
    <h3 class="fw-bolder my-2">Product Detail</h3>
    <!--end::Heading-->
    <!--begin::Actions-->
    <div class="d-flex flex-wrap my-2">
        @livewire('admin.product.delete-product',['itemid' => $id])
        <a href="{{route('admin.products.list')}}" class="btn btn-primary btn-sm">Back to List</a>
        @if($getBackCategoryUrl != null)
        <a href="{{'/'.$getBackCategoryUrl}}" class="btn btn-secondary btn-sm">Back to Category</a>
        @endif
        @if($getBackSellerUrl != null)
        <a href="{{'/'.$getBackSellerUrl}}" class="btn btn-secondary btn-sm">Back to Seller</a>
        @endif

    </div>
    <!--end::Actions-->
</div>
<!--end::Toolbar-->

<!--begin::Row-->
<div class="row gy-5 g-xl-8">
    <!--begin::Col-->
    <div class="col-xl-12">
        <!--begin::Basic info-->
        <div class="card mb-5 mb-xl-10">

            <!--begin::Content-->
            <div id="kt_account_profile_details1" class="collapse show">

                <!--end::Row-->
                <div class="row">
                    <div class="col-md-3 mt-5">
                        <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column me-5 mb-3 mb-md-0 fs-6">
                            <li class="nav-item me-0 mb-md-2">
                                <a class="nav-link active btn btn-flex btn-active-light-success" data-bs-toggle="tab" href="#kt_vtab_pane_4">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M6.5 11C8.98528 11 11 8.98528 11 6.5C11 4.01472 8.98528 2 6.5 2C4.01472 2 2 4.01472 2 6.5C2 8.98528 4.01472 11 6.5 11Z" fill="black" />
                                            <path opacity="0.3" d="M13 6.5C13 4 15 2 17.5 2C20 2 22 4 22 6.5C22 9 20 11 17.5 11C15 11 13 9 13 6.5ZM6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22ZM17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22Z" fill="black" />
                                        </svg>
                                    </span>
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-4 fw-bolder">Base Details</span>
                                        <span class="fs-7">Stock,Status..</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item me-0 mb-md-2">
                                <a class="nav-link btn btn-flex btn-active-light-info" data-bs-toggle="tab" href="#kt_vtab_pane_5">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M17 10H11C10.4 10 10 9.6 10 9V8C10 7.4 10.4 7 11 7H17C17.6 7 18 7.4 18 8V9C18 9.6 17.6 10 17 10ZM22 4V3C22 2.4 21.6 2 21 2H11C10.4 2 10 2.4 10 3V4C10 4.6 10.4 5 11 5H21C21.6 5 22 4.6 22 4ZM22 15V14C22 13.4 21.6 13 21 13H11C10.4 13 10 13.4 10 14V15C10 15.6 10.4 16 11 16H21C21.6 16 22 15.6 22 15ZM18 20V19C18 18.4 17.6 18 17 18H11C10.4 18 10 18.4 10 19V20C10 20.6 10.4 21 11 21H17C17.6 21 18 20.6 18 20Z" fill="black" />
                                            <path d="M8 5C8 6.7 6.7 8 5 8C3.3 8 2 6.7 2 5C2 3.3 3.3 2 5 2C6.7 2 8 3.3 8 5ZM5 4C4.4 4 4 4.4 4 5C4 5.6 4.4 6 5 6C5.6 6 6 5.6 6 5C6 4.4 5.6 4 5 4ZM8 16C8 17.7 6.7 19 5 19C3.3 19 2 17.7 2 16C2 14.3 3.3 13 5 13C6.7 13 8 14.3 8 16ZM5 15C4.4 15 4 15.4 4 16C4 16.6 4.4 17 5 17C5.6 17 6 16.6 6 16C6 15.4 5.6 15 5 15Z" fill="black" />
                                        </svg>
                                    </span>
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-4 fw-bolder">Description</span>
                                        <span class="fs-7">Long Description</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link btn btn-flex btn-active-light-danger" data-bs-toggle="tab" href="#kt_vtab_pane_6">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="black" />
                                            <path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="black" />
                                        </svg>
                                    </span>
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-4 fw-bolder">Advanced Details</span>
                                        <span class="fs-7">Weight,Meta..</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link btn btn-flex btn-active-light-success" data-bs-toggle="tab" href="#kt_vtab_pane_7">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M22 8.20267V15.7027C22 19.1027 19.2 22.0026 15.7 22.0026H8.2C4.8 22.0026 2 19.2027 2 15.7027V8.20267C2 4.80267 4.8 2.0026 8.2 2.0026H15.7C19.2 1.9026 22 4.70267 22 8.20267ZM12 7.30265C9.5 7.30265 7.39999 9.40262 7.39999 11.9026C7.39999 14.4026 9.5 16.5026 12 16.5026C14.5 16.5026 16.6 14.4026 16.6 11.9026C16.6 9.30262 14.5 7.30265 12 7.30265ZM17.9 5.0026C17.3 5.0026 16.9 5.4026 16.9 6.0026C16.9 6.6026 17.3 7.0026 17.9 7.0026C18.5 7.0026 18.9 6.6026 18.9 6.0026C18.9 5.5026 18.4 5.0026 17.9 5.0026Z" fill="black" />
                                            <path d="M12 17.5026C8.9 17.5026 6.39999 15.0026 6.39999 11.9026C6.39999 8.80259 8.9 6.30261 12 6.30261C15.1 6.30261 17.6 8.80259 17.6 11.9026C17.6 15.0026 15.1 17.5026 12 17.5026ZM12 8.30261C10 8.30261 8.39999 9.90259 8.39999 11.9026C8.39999 13.9026 10 15.5026 12 15.5026C14 15.5026 15.6 13.9026 15.6 11.9026C15.6 9.90259 14 8.30261 12 8.30261Z" fill="black" />
                                        </svg>
                                    </span>
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-4 fw-bolder">Images</span>
                                        <span class="fs-7">Product Images</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link btn btn-flex btn-active-light-info" data-bs-toggle="tab" href="#kt_vtab_pane_8">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M17.1 10.5H11.1C10.5 10.5 10.1 10.1 10.1 9.5V8.5C10.1 7.9 10.5 7.5 11.1 7.5H17.1C17.7 7.5 18.1 7.9 18.1 8.5V9.5C18.1 10.1 17.7 10.5 17.1 10.5ZM22.1 4.5V3.5C22.1 2.9 21.7 2.5 21.1 2.5H11.1C10.5 2.5 10.1 2.9 10.1 3.5V4.5C10.1 5.1 10.5 5.5 11.1 5.5H21.1C21.7 5.5 22.1 5.1 22.1 4.5ZM22.1 15.5V14.5C22.1 13.9 21.7 13.5 21.1 13.5H11.1C10.5 13.5 10.1 13.9 10.1 14.5V15.5C10.1 16.1 10.5 16.5 11.1 16.5H21.1C21.7 16.5 22.1 16.1 22.1 15.5ZM18.1 20.5V19.5C18.1 18.9 17.7 18.5 17.1 18.5H11.1C10.5 18.5 10.1 18.9 10.1 19.5V20.5C10.1 21.1 10.5 21.5 11.1 21.5H17.1C17.7 21.5 18.1 21.1 18.1 20.5Z" fill="black" />
                                            <path d="M5.60001 10.5C5.30001 10.5 5.00002 10.4 4.80002 10.2C4.60002 9.99995 4.5 9.70005 4.5 9.30005V5.40002C3.7 5.90002 3.40001 6 3.10001 6C2.90001 6 2.6 5.89995 2.5 5.69995C2.3 5.49995 2.20001 5.3 2.20001 5C2.20001 4.6 2.4 4.40005 2.5 4.30005C2.6 4.20005 2.80001 4.10002 3.10001 3.90002C3.50001 3.70002 3.8 3.50005 4 3.30005C4.2 3.10005 4.40001 2.89995 4.60001 2.69995C4.80001 2.39995 4.9 2.19995 5 2.19995C5.1 2.09995 5.30001 2 5.60001 2C5.90001 2 6.10002 2.10002 6.30002 2.40002C6.50002 2.60002 6.5 2.89995 6.5 3.19995V9C6.6 10.4 5.90001 10.5 5.60001 10.5ZM7.10001 21.5C7.40001 21.5 7.69999 21.4 7.89999 21.2C8.09999 21 8.20001 20.8 8.20001 20.5C8.20001 20.2 8.10002 19.9 7.80002 19.8C7.60002 19.6 7.3 19.6 7 19.6H5.10001C5.30001 19.4 5.50002 19.2 5.80002 19C6.30002 18.6 6.69999 18.3 6.89999 18.1C7.09999 17.9 7.40001 17.6 7.60001 17.2C7.80001 16.8 8 16.3 8 15.9C8 15.6 7.90002 15.3 7.80002 15C7.70002 14.7 7.50002 14.5 7.30002 14.2C7.10002 14 6.80001 13.8 6.60001 13.7C6.20001 13.5 5.70001 13.4 5.10001 13.4C4.60001 13.4 4.20002 13.5 3.80002 13.6C3.40002 13.7 3.09999 13.9 2.89999 14.2C2.69999 14.4 2.50002 14.7 2.30002 15C2.20002 15.3 2.10001 15.6 2.10001 15.9C2.10001 16.3 2.29999 16.5 2.39999 16.6C2.59999 16.8 2.80001 16.9 3.10001 16.9C3.50001 16.9 3.70002 16.7 3.80002 16.6C3.90002 16.4 4.00001 16.2 4.10001 16C4.20001 15.8 4.20001 15.7 4.20001 15.7C4.40001 15.4 4.59999 15.3 4.89999 15.3C4.99999 15.3 5.20002 15.3 5.30002 15.4C5.40002 15.5 5.50001 15.5 5.60001 15.7C5.70001 15.8 5.70001 15.9 5.70001 16.1C5.70001 16.2 5.70001 16.4 5.60001 16.6C5.50001 16.8 5.40001 16.9 5.20001 17.1C5.00001 17.3 4.80001 17.5 4.60001 17.6C4.40001 17.7 4.20002 17.9 3.80002 18.3C3.40002 18.6 3.00001 19 2.60001 19.5C2.50001 19.6 2.30001 19.8 2.20001 20.1C2.10001 20.4 2 20.6 2 20.7C2 21 2.10002 21.3 2.30002 21.5C2.50002 21.7 2.80001 21.8 3.20001 21.8H7.10001V21.5Z" fill="black" />
                                        </svg>
                                    </span>
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-4 fw-bolder">Extra Informations</span>
                                        <span class="fs-7">Color,Size...</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link btn btn-flex btn-active-light-warning" data-bs-toggle="tab" href="#kt_vtab_pane_9">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="black" />
                                        </svg>
                                    </span>
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-4 fw-bolder">Feature Settings</span>
                                        <span class="fs-7">Special Offers</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9 mt-5">
                        <div class="tab-content " id="myTabContent">
                            <div class="tab-pane fade show active" id="kt_vtab_pane_4" role="tabpanel">
                                
                                @livewire('admin.product.product-base-details',['itemid' => $id])

                            </div>

                            <div class="tab-pane fade" id="kt_vtab_pane_5" role="tabpanel">
                                @livewire('admin.product.product-description',['itemid' => $id])
                            </div>

                            <div class="tab-pane fade" id="kt_vtab_pane_6" role="tabpanel">
                                @livewire('admin.product.product-advanced-details',['itemid' => $id])
                            </div>

                            <div class="tab-pane fade" id="kt_vtab_pane_7" role="tabpanel">
                                @livewire('admin.product.product-gallery-add',['itemid' => $id])
                                @livewire('admin.product.product-gallery-list',['itemid' => $id])
                            </div>

                            <div class="tab-pane fade" id="kt_vtab_pane_8" role="tabpanel">
                                @livewire('admin.product.product-info-add',['itemid' => $id])
                                @livewire('admin.product.product-info-list',['itemid' => $id])
                            </div>

                            <div class="tab-pane fade" id="kt_vtab_pane_9" role="tabpanel">
                                @livewire('admin.product.product-feature-settings',['itemid' => $id])
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!--end::Content-->
        </div>
        <!--end::Basic info-->
    </div>
    <!--end::Col-->
</div>



@endsection