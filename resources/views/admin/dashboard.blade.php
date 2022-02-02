@extends('admin.layouts.templates.panel')
@section('title','Dashboard')
@section('sub-title','')
@section('content')
<!--begin::Summary-->
<div class="row gy-5 g-xl-8">
   <!--begin::Col-->
   <div class="col-xl-2 col-md-4 col-6">
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
                     <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{$data['all_orders_cnt']}}" >0</div>
                 </div>
                 <!--end::Number-->
             
                 <!--begin::Label-->
                 <div class="fw-bold fs-6 ">Total <br> Orders </div>
                 <!--end::Label-->
             </div>
         </div>
     <!--end::Card body-->
     </div>
    <!--end::details View-->
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-xl-2 col-md-4 col-6">
        <div class="card mt-5 mb-5 mb-xl-10" id="kt_profile_details_view">    
     <!--begin::Card Body-->
         <div class="card-body">
             <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                <!--begin::Number-->
                <div class="d-flex align-items-center">
                    <span class="svg-icon svg-icon-2 svg-icon-primary me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z" fill="black"/>
                            <path opacity="0.3" d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z" fill="black"/>
                            <path opacity="0.3" d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z" fill="black"/>
                            </svg>
                    </span>
                    <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{$data['all_orders_month_cnt']}}" >0</div>
                </div>
                <!--end::Number-->
            
                <!--begin::Label-->
                <div class="fw-bold fs-6 ">Monthly Orders</div>
                <!--end::Label-->
            </div>
         </div>
     <!--end::Card body-->
     </div>
    <!--end::details View-->
    </div>
    <!--end::Col-->
     <!--begin::Col-->
     <div class="col-xl-2 col-md-4 col-6">
        <div class="card mt-5 mb-5 mb-xl-10" id="kt_profile_details_view">    
         <!--begin::Card Body-->
             <div class="card-body">
                 <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                     <!--begin::Number-->
                     <div class="d-flex align-items-center">
                         <span class="svg-icon svg-icon-2 svg-icon-success me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M20 18H4C3.4 18 3 17.6 3 17V7C3 6.4 3.4 6 4 6H20C20.6 6 21 6.4 21 7V17C21 17.6 20.6 18 20 18ZM12 8C10.3 8 9 9.8 9 12C9 14.2 10.3 16 12 16C13.7 16 15 14.2 15 12C15 9.8 13.7 8 12 8Z" fill="black"/>
                                <path d="M18 6H20C20.6 6 21 6.4 21 7V9C19.3 9 18 7.7 18 6ZM6 6H4C3.4 6 3 6.4 3 7V9C4.7 9 6 7.7 6 6ZM21 17V15C19.3 15 18 16.3 18 18H20C20.6 18 21 17.6 21 17ZM3 15V17C3 17.6 3.4 18 4 18H6C6 16.3 4.7 15 3 15Z" fill="black"/>
                                </svg>
                         </span>
                         <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{$data['all_orders_earning']}}" data-kt-countup-prefix="£">0</div>
                     </div>
                     <!--end::Number-->
                 
                     <!--begin::Label-->
                     <div class="fw-bold fs-6 ">Total Earnings</div>
                     <!--end::Label-->
                 </div>
                
             </div>
         <!--end::Card body-->
         </div>
        <!--end::details View-->
        </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-xl-2 col-md-4 col-6">
        <div class="card mt-5 mb-5 mb-xl-10" id="kt_profile_details_view">    
         <!--begin::Card Body-->
             <div class="card-body">
                
                 <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                    <!--begin::Number-->
                    <div class="d-flex align-items-center">
                        <span class="svg-icon svg-icon-2 svg-icon-primary me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z" fill="black"/>
                                <path opacity="0.3" d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z" fill="black"/>
                                <path d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z" fill="black"/>
                                </svg>
                        </span>
                        <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{$data['all_orders_month_earning']}}" data-kt-countup-prefix="£">0</div>
                    </div>
                    <!--end::Number-->
                
                    <!--begin::Label-->
                    <div class="fw-bold fs-6 ">Monthly Earnings</div>
                    <!--end::Label-->
                </div>
             </div>
         <!--end::Card body-->
         </div>
        <!--end::details View-->
        </div>
    <!--end::Col-->
     
       <!--begin::Col-->
       <div class="col-xl-2 col-md-4 col-6">
        <div class="card mt-5 mb-5 mb-xl-10" id="kt_profile_details_view">    
         <!--begin::Card Body-->
             <div class="card-body">
                 <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                     <!--begin::Number-->
                     <div class="d-flex align-items-center">
                         <span class="svg-icon svg-icon-2 svg-icon-info me-2">
                            
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="black"/>
                                    <rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="black"/>
                                    <path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="black"/>
                                    <rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="black"/>
                                    </svg>
                         </span>
                         <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{$data['all_customer_cnt']}}" >0</div>
                     </div>
                     <!--end::Number-->
                 
                     <!--begin::Label-->
                     <div class="fw-bold fs-6 ">Total Customers</div>
                     <!--end::Label-->
                 </div>
                
             </div>
         <!--end::Card body-->
         </div>
        <!--end::details View-->
        </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-xl-2 col-md-4 col-6 ">
        <div class="card mt-5 mb-5 mb-xl-10" id="kt_profile_details_view">    
         <!--begin::Card Body-->
             <div class="card-body">
                
                 <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                    <!--begin::Number-->
                    <div class="d-flex align-items-center">
                        <span class="svg-icon svg-icon-2 svg-icon-primary me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black"/>
                                <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black"/>
                                </svg>
                        </span>
                        <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{$data['all_customer_month_cnt']}}" >0</div>
                    </div>
                    <!--end::Number-->
                
                    <!--begin::Label-->
                    <div class="fw-bold fs-6 ">This Month Customer</div>
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

<!--begin::Graphs-->
<div class="row gy-5 g-xl-8">
    <!--begin::Col-->
    <div class="col-xl-9">
        <div class="card mt-5 mb-5 mb-xl-10" id="kt_profile_details_view">    
                <div class="card-body">
                    <canvas id="kt_chartjs_1" class="mh-250px"></canvas>
                </div>
        </div>
    </div>
    <!--end::Col-->

     <!--begin::Col-->
    <div class="col-xl-3">
        <div class="card mt-5 mb-5 mb-xl-10" id="kt_profile_details_view">  
                <div class="card-body text-center">
                    <h5 >Order From</h5>
                    <canvas id="kt_chartjs_3" class="mh-400px"></canvas>
                </div>
        </div>
    </div>
    <!--end::Col-->
</div>        
<!--end::Graphs-->


@if($items->count() > 0)
<!--begin::Details-->
<div class="row gy-5 g-xl-8">
    <!--begin::Col-->
    <div class="col-xl-12">
        <div class="card mt-5 mb-5 mb-xl-10" id="kt_profile_details_view">    
                <div class="card-body">
                    <h5>Stock Alerts</h5>
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
                                                <span class=" fw-bolder text-danger mb-1 fs-5">Left <strong>{{$item->calcStock()}}</strong> Stock</span>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <a href="/admin/products/{{$item->id}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
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
    </div>
    <!--end::Col-->
</div>        
<!--end::Details-->
@endif
@endsection
@section('js')
<script>
var ctx = document.getElementById('kt_chartjs_3');
var ctx_2 = document.getElementById('kt_chartjs_1');

// Define colors
var primaryColor = KTUtil.getCssVariableValue('--bs-primary');
var dangerColor = KTUtil.getCssVariableValue('--bs-danger');
var successColor = KTUtil.getCssVariableValue('--bs-success');
var warningColor = KTUtil.getCssVariableValue('--bs-warning');
var infoColor = KTUtil.getCssVariableValue('--bs-info');

// Define fonts
var fontFamily = KTUtil.getCssVariableValue('--bs-font-sans-serif');


// Chart data
const data_pie = {
    labels: ['Web', 'App',],
    datasets: [{
    label: 'Order From',
    data: [@json($data['web_order']), @json($data['app_order']),],
    backgroundColor: [
        primaryColor,
        successColor,
        warningColor,
        infoColor,
    ],
    hoverOffset: 4
  }]
};

const data_bar = {
  labels: @json($data['dates_only_graph_date']),
  datasets: [{
    label: 'Order Count',
    data: @json($data['dates_only_graph_count']),
    backgroundColor: [
        successColor,
    ],
    borderColor: [
      'rgb(75, 192, 192)',
    ],
    borderWidth: 1
  },
  {
    label: 'Order Revenue',
    data: @json($data['dates_only_graph_earn']),
    backgroundColor: [
        primaryColor,
    ],
    borderColor: [
        'rgb(54, 162, 235)',
    ],
    borderWidth: 1
  }]
};

// Chart config
const config_pie = {
    type: 'pie',
    data: data_pie,
    options: {
        plugins: {
            title: {
                display: false,
            }
        },
        responsive: true,
    },
    defaults:{
        global: {
            defaultFont: fontFamily
        }
    }
};

const config_bar = {
  type: 'bar',
  data: data_bar,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    },
    responsive: true,
  },
};

var myChart = new Chart(ctx, config_pie);
var myChart2 = new Chart(ctx_2, config_bar);
</script>


@endsection