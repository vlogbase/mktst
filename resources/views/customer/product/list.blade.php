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
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="text-muted mt-4">Coming Soon!</h3>
            </div>
        </div>
        <div class="row mt-3">
            @for($i = 0; $i<3;$i++)
            <div class="card col-md-3 mx-auto" aria-hidden="true">
                <div style="background-color: gray; height:150px;" src="#" class="card-img-top mt-2" alt="..."></div>
                <div class="card-body">
                  <h5 class="card-title placeholder-glow">
                    <span class="placeholder col-6"></span>
                  </h5>
                  <p class="card-text placeholder-glow">
                    <span class="placeholder col-7"></span>
                    <span class="placeholder col-4"></span>
                    <span class="placeholder col-4"></span>
                    <span class="placeholder col-6"></span>
                    <span class="placeholder col-8"></span>
                  </p>
                  <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                </div>
            </div>
            @endfor
           
        </div>
        
        {{-- @livewire('customer.product-page',['categoryCurrent' => $categoryCurrent]) --}}
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