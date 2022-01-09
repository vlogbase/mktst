@if($current_category->parent)
@include('customer.product.breadcrum',['current_category' => $current_category->parent])
<li class="breadcrumb-item"><a href="{{route('category_products',$current_category->parent->slug)}}">{{$current_category->parent->name}}</a></li>
@endif
