<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<!--begin::Head-->
	<head><base href="">
		<title>@yield('title',config('app.name'))</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->

		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/global/plugins.dark.bundle.css" rel="stylesheet" type="text/css" />

		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.dark.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->

        @yield('css')
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class=" page-loading-enabled page-loading header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed " style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">

<!--layout-partial:layout/_loader.html-->
	@include('admin.layouts.partials._loader')

<!--layout-partial:layout/master.html-->
	@include('admin.layouts.partials._master')

<!--layout-partial:layout/engage/_main.html-->


<!--layout-partial:layout/_scrolltop.html-->
@include('admin.layouts.partials._scrolltop')

		<!--begin::Modals-->

<!--layout-partial:partials/modals/_upgrade-plan.html-->


<!--layout-partial:partials/modals/create-app/_main.html-->


<!--layout-partial:partials/modals/_invite-friends.html-->


<!--layout-partial:partials/modals/users-search/_main.html-->

		<!--end::Modals-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="assets/js/custom/widgets.js"></script>
		<script src="assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/js/custom/intro.js"></script>
		<script src="assets/js/custom/modals/upgrade-plan.js"></script>
		<script src="assets/js/custom/modals/create-app.js"></script>
		<script src="assets/js/custom/modals/users-search.js"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->

        @yield('js')
	</body>
	<!--end::Body-->
</html>