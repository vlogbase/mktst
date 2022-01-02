		
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">

<!--layout-partial:layout/aside/_base.html-->
@include('admin.layouts.partials._base')

				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

<!--layout-partial:layout/header/_base.html-->
@include('admin.layouts.partials._head')

					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

<!--layout-partial:layout/toolbars/_toolbar-1.html-->

						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">

<!--layout-partial:layout/_content.html-->
							<div id="kt_content_container" class="container-xxl">
								@yield('content')
							</div>	
						</div>
						<!--end::Post-->
					</div>
					<!--end::Content-->

<!--layout-partial:layout/_footer.html-->
@include('admin.layouts.partials._footer')

				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Drawers-->

<!--layout-partial:layout/topbar/partials/_activity-drawer.html-->

	
		
		<!--end::Drawers-->
		<!--end::Main-->
		