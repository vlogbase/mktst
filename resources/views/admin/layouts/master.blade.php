<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<!--begin::Head-->
	<head><base href="">
		<title>@yield('title',config('app.name'))</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="/upload/logos/savoyicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->

		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/plugins/global/plugins.dark.bundle.css" rel="stylesheet" type="text/css" />

		<link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/css/style.dark.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		@livewireStyles
        @yield('css')
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	@yield('body')
	@livewireScripts
	<script>
		Livewire.on('succesAlert', postId => {
			Swal.fire({
				icon: 'success',
				title: 'Success',
				text: postId,
			})
		})

		Livewire.on('errorAlert', postId => {
			Swal.fire({
				icon: 'error',
				title: 'Error',
				text: postId,
			})
		})

		Livewire.on('infoAlert', postId => {
			Swal.fire({
				icon: 'info',
				title: 'Information',
				text: postId,
			})
		})

		Livewire.on('deletedOkay', postId => {
			Swal.fire({
				icon: 'info',
				title: 'Are you sure?',
				showCancelButton: true,
				confirmButtonText: 'Yes, do it!'
			}).then((result) => {
				if (result.isConfirmed) {
					Livewire.emit('processDone', postId)
				}
			})
		})


		

		
		
		
		</script>
	<!--end::Body-->
</html>