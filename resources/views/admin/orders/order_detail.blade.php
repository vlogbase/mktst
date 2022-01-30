@extends('admin.layouts.templates.panel')
@section('title','Order')
@section('sub-title','Detail')
@section('content')
    				<!--begin::Row-->
                    <div class="row gy-5 g-xl-8">
                        <!--begin::Col-->
                        <div class="col-xl-12">
                            @livewire('admin.order.order-detail-update',['order'=>$order])
                        
                        
                        <div class="card mt-5 mb-5 mb-xl-10" id="kt_profile_details_view">
                                                            
                            <!--begin::Card header-->
                            <div class="card-header cursor-pointer">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">Order Products </h3>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Action-->
                                <div class="align-self-center">
                                   
                                </div>
                                <!--end::Action-->
                            </div>
                            <!--begin::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body p-9">
                                <!--begin::Row-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-12">
                                        <table class="table table-striped gy-7 gs-7">
                                            <thead>
                                                <tr class="fw-bolder fs-6 text-gray-800">
                                                    <th>Image</th>
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Price</th>
                                                    <th>Sub Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($order->orderproducts as $item)
                                                <tr>
                                                    <td><img src="{{$item->product->getCoverImage()}}" style="width:50px;" alt=""></td>
                                                    <td>{{$item->product->name}} <br>
                                                        <span class="text-muted">{{$item->product->sku}}</span>
                                                    </td>
                                                    <td>{{$item->quantity}}</td>
                                                    <td>£{{number_format($item->sold_price,2)}}</td>
                                                    <td>£{{number_format($item->sold_price*$item->quantity,2)}}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><strong>Cart</strong></td>
                                                    <td><strong>£{{$order->cart_price}}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><strong>Vat</strong></td>
                                                    <td><strong>£{{$order->vat_price}}</strong></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><strong>Shipment</strong></td>
                                                    <td><strong>£{{$order->shipment_price}}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><strong>Discount</strong></td>
                                                    <td><strong>-£{{$order->discount_price}}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><strong>Total</strong></td>
                                                    <td><strong>£{{$order->total_price}}</strong></td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::details View-->
                        
                        
                        
                        <div class="card mt-5 mb-5 mb-xl-10" id="kt_profile_details_view">
                                                            
                            
                            <!--begin::Card body-->
                            <div class="card-body p-9">
                                <!--begin::Row-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <h4>Shipping</h4>
                                        <hr>
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-bold text-muted">Name Surname</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 text-end">
                                                <p>{{$order->ordershipping->name. ' ' .$order->ordershipping->surname}}</p>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-bold text-muted">Mobile & Phone</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 text-end">
                                                <p>{{$order->ordershipping->mobile. ' | ' .$order->ordershipping->phone}}</p>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-bold text-muted">Email</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 text-end">
                                                <p>{{$order->ordershipping->email}}</p>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-bold text-muted">Country</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 text-end">
                                                <p>{{$order->ordershipping->address->country}}</p>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <!--end::Row-->
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-bold text-muted">District & County</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 text-end">
                                                <p>{{$order->ordershipping->address->district. ' - ' .$order->ordershipping->address->county}}</p>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-bold text-muted">Address</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 text-end">
                                                <p>{{$order->ordershipping->address->formatted_address}}</p>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-bold text-muted">Postcode</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 text-end">
                                                <p>{{$order->ordershipping->address->postcode}}</p>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <h4>Billing</h4>
                                        <hr>
                                        
                                        
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-bold text-muted">Company Name</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 text-end">
                                                <p>{{$order->orderbilling->company_name}}</p>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-bold text-muted">VAT</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 text-end">
                                                <p>{{$order->orderbilling->vat}}</p>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-bold text-muted">Registeration</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 text-end">
                                                <p>{{$order->orderbilling->registeration}}</p>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-bold text-muted">Country</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 text-end">
                                                <p>{{$order->orderbilling->address->country}}</p>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <!--end::Row-->
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-bold text-muted">District & County</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 text-end">
                                                <p>{{$order->orderbilling->address->district. ' - ' .$order->orderbilling->address->county}}</p>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-bold text-muted">Address</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 text-end">
                                                <p>{{$order->orderbilling->address->formatted_address}}</p>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-bold text-muted">Postcode</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 text-end">
                                                <p>{{$order->orderbilling->address->postcode}}</p>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                      
                                        
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::details View-->
                        </div>
                        <!--end::Col-->
                    </div>
@endsection
