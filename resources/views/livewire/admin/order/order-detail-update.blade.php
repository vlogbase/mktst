<div>
    <form wire:submit.prevent="submit">
    <div class="card mt-5 mb-5 mb-xl-10" id="kt_profile_details_view">                     
        <!--begin::Card header-->
        <div class="card-header cursor-pointer">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">Order Number: {{$order->ordercode}} - <span class="text-muted">{{$order->humanTime()}}</span></h3>
            </div>
            <!--end::Card title-->
            <!--begin::Action-->
            <div class="align-self-center">
                <a href="{{route('admin.orders.list')}}" class="btn btn-info ">Back to List</a>
                <a wire:click="deleteItem({{$order->id}})" class="btn btn-danger ">Delete</a>
                <button type="submit" class="btn btn-primary ">Update</button>
            </div>
            <!--end::Action-->
        </div>
        <!--begin::Card header-->
        <!--begin::Card body-->
        <div class="card-body p-9">
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Status</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <select class="form-select form-select-solid" wire:model="status" aria-label="Select example">
                        <option {{$order->status == 'New Order' ? 'selected' : ''}} value="New Order">New Order</option>
                        <option {{$order->status == 'Ready Order' ? 'selected' : ''}} value="Ready Order">Ready Order</option>
                        <option {{$order->status == 'Shipping Order' ? 'selected' : ''}} value="Shipping Order">Shipping Order</option>
                        <option {{$order->status == 'Completed Order' ? 'selected' : ''}} value="Completed Order">Completed Order</option>
                        <option {{$order->status == 'Canceled Order' ? 'selected' : ''}} value="Canceled Order">Canceled Order</option>
                    </select>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Payment Status</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <select class="form-select form-select-solid" wire:model="pay_status" aria-label="Select example">
                        <option {{$order->status == 'WAIT' ? 'selected' : ''}} value="WAIT">WAIT</option>
                        <option {{$order->status == 'PAID' ? 'selected' : ''}} value="PAID">PAID</option>
                       
                    </select>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Platform</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bold text-gray-800 fs-6">{{$order->platform}}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Weight</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bold text-gray-800 fs-6">{{$order->weight}}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            

            

            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Given Point</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bold text-gray-800 fs-6">{{$order->earn_point}}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            @if($order->couponcode != '')
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Used Coupon</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bold text-gray-800 fs-6">{{$order->couponcode}}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            @endif
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Notes</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bold text-gray-800 fs-6">{{$order->notes}}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

        </div>
        <!--end::Card body-->
    </div>
    <!--end::details View-->
</form>
</div>
