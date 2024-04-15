@extends('customer.layouts.master')
@section('title', (request()->routeIs('products') ? 'Products' : $categoryCurrent->name) . ' - Markket')
@section('content')

    @include('customer.component.breadcrumb' , ['title' => request()->routeIs('products') ? 'Products' : $categoryCurrent->name])


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

