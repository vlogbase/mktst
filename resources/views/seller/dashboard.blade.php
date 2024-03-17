@extends('admin.layouts.templates.panel')
@section('title', 'Dashboard')
@section('sub-title', '')
@section('content')

<!--begin::Summary-->
<div class="row gy-5 g-xl-8">
    <!--begin::Col-->
    <div class="col-xl-6 col-md-6 col-6">
     <div class="card mt-5 mb-5 mb-xl-10" id="kt_profile_details_view">    
      <!--begin::Card Body-->
          <div class="card-body">
              <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                  <!--begin::Number-->
                  <div class="d-flex align-items-center">
                      <span class="svg-icon svg-icon-2 svg-icon-success me-2">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                             <path opacity="0.3" d="M18.041 22.041C18.5932 22.041 19.041 21.5932 19.041 21.041C19.041 20.4887 18.5932 20.041 18.041 20.041C17.4887 20.041 17.041 20.4887 17.041 21.041C17.041 21.5932 17.4887 22.041 18.041 22.041Z" fill="black"/>
                             <path opacity="0.3" d="M6.04095 22.041C6.59324 22.041 7.04095 21.5932 7.04095 21.041C7.04095 20.4887 6.59324 20.041 6.04095 20.041C5.48867 20.041 5.04095 20.4887 5.04095 21.041C5.04095 21.5932 5.48867 22.041 6.04095 22.041Z" fill="black"/>
                             <path opacity="0.3" d="M7.04095 16.041L19.1409 15.1409C19.7409 15.1409 20.141 14.7409 20.341 14.1409L21.7409 8.34094C21.9409 7.64094 21.4409 7.04095 20.7409 7.04095H5.44095L7.04095 16.041Z" fill="black"/>
                             <path d="M19.041 20.041H5.04096C4.74096 20.041 4.34095 19.841 4.14095 19.541C3.94095 19.241 3.94095 18.841 4.14095 18.541L6.04096 14.841L4.14095 4.64095L2.54096 3.84096C2.04096 3.64096 1.84095 3.04097 2.14095 2.54097C2.34095 2.04097 2.94096 1.84095 3.44096 2.14095L5.44096 3.14095C5.74096 3.24095 5.94096 3.54096 5.94096 3.84096L7.94096 14.841C7.94096 15.041 7.94095 15.241 7.84095 15.441L6.54096 18.041H19.041C19.641 18.041 20.041 18.441 20.041 19.041C20.041 19.641 19.641 20.041 19.041 20.041Z" fill="black"/>
                             </svg>
                      </span>
                      <div class="fs-1 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{$data['all_orders_cnt']}}" >0</div>
                  </div>
                  <!--end::Number-->
              
                  <!--begin::Label-->
                  <div class="fw-bold fs-3 ">Total Products </div>
                  <!--end::Label-->
              </div>
          </div>
      <!--end::Card body-->
      </div>
     <!--end::details View-->
     </div>
     <!--end::Col-->
 </div>
 <!--end::Summary-->
 

@endsection
