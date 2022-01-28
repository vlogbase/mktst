@extends('admin.layouts.templates.panel')
@section('content')
    				<!--begin::Row-->
                    <div class="row gy-5 g-xl-8">
                        <!--begin::Col-->
                        <div class="col-xl-12">
                            <!--begin::Basic info-->
								<div class="card mb-5 mb-xl-10">
									<!--begin::Card header-->
									<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
										<!--begin::Card title-->
										<div class="card-title m-0">
											<h3 class="fw-bolder m-0">Edit @yield('title')</h3>
										</div>
										<!--end::Card title-->
									</div>
									<!--begin::Card header-->
									<!--begin::Content-->
									<div id="kt_account_profile_details" class="collapse show">
										@yield('form-content')
									</div>
									<!--end::Content-->
								</div>
								<!--end::Basic info-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
@endsection
