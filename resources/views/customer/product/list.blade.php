@extends('customer.layouts.master')
@section('title', (request()->routeIs('products') ? 'Products' : $categoryCurrent->name) . ' - Markket')
@section('content')
    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section page-title-mini" style="background-color:chocolate;">
        <div class="container">
            <!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-12 text-center">
                    <div class="page-title">
                        <h1 class="text-uppercase text-white">{{ request()->routeIs('products') ? 'Products' : $categoryCurrent->name }}</h1>
                    </div>
                </div>
                {{-- <div class="col-md-8">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        @if (request()->routeIs('products'))
                            <li class="breadcrumb-item active">Products</li>
                            <li class="breadcrumb-item active">Products</li>
                        @else
                            @include('customer.product.breadcrum', [
                                'current_category' => $categoryCurrent,
                            ])
                            <li class="breadcrumb-item active">{{ $categoryCurrent->name }}</li>
                        @endif
                    </ol>
                </div> --}}
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- END SECTION BREADCRUMB -->


    <!-- START MAIN CONTENT -->
    <div class="main_content">

        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container-fluid px-5">
                @livewire('customer.product-page', ['categoryCurrent' => $categoryCurrent])
            </div>
        </div>
        <!-- END SECTION SHOP -->


    </div>
    <!-- END MAIN CONTENT -->
@endsection

