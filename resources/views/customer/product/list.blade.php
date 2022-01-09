@extends('customer.layouts.master')
@section('title',(request()->routeIs('products') ? 'Products' : $categoryCurrent->name). ' - SavoyFoods')
@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-4">
                <div class="page-title">
            		<h1>{{(request()->routeIs('products') ? 'Products' : $categoryCurrent->name)}}</h1>
                </div>
            </div>
            <div class="col-md-8">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    @if(request()->routeIs('products'))
                    <li class="breadcrumb-item active">Products</li>
                    <li class="breadcrumb-item active">Products</li>
                    @else
                    @include('customer.product.breadcrum',['current_category' => $categoryCurrent])
                    <li class="breadcrumb-item active">{{$categoryCurrent->name}}</li>
                    @endif
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->


<!-- START MAIN CONTENT -->
<div class="main_content">
    
<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
        @livewire('customer.product-page',['categoryCurrent' => $categoryCurrent])
    </div>
</div>
<!-- END SECTION SHOP -->


</div>
<!-- END MAIN CONTENT -->   
@endsection
@section('js')
<script type="text/javascript">
            
    window.onscroll = function (ev) {
        var productList = document.getElementById("product-list");
        if ((window.innerHeight + window.scrollY) >= productList.scrollHeight ) {
            window.livewire.emit('loadMore')
        
     }
    };

</script>
@endsection