<div>
    <div class="row">
        @php
            $specialCategoryCount = $customerpagedata['categories']->where('special',1)->count();
        @endphp

        @foreach($customerpagedata['categories'] as $category)
            @if($category->special == 1)
            <div class="{{ $specialCategoryCount > 5 ?  'col-lg-4' : 'col-lg-2' }} col-md-6 col-6 mx-auto mt-4 mb-4" style="cursor:pointer;">
                 <!-- ============================ COMPONENT ITEM BG ================================= -->
                 <a href="{{route('category_products',$category->slug)}}">
                    <div class="categorybox card card-banner border-0">
                        <div class="text-center">
                            <img class="img-fluid lazy special-category-image" style="height:auto; animation: pulse 2s ease-in-out {{'0.'.$loop->index * 2}}s 3;" data-src="{{$category->image}}" alt="{{$category->name}}">
                        </div>
                    </div>
                 </a>
            </div>
            @endif
        @endforeach
    </div> <!-- row.// -->

    <div class="row mt-2">
        @foreach($customerpagedata['categories'] as $category)
            @if($category->special == 0)
            <div class="col-lg-2 col-md-3 col-6 mt-4 mb-4" style="cursor:pointer;">
                 <!-- ============================ COMPONENT ITEM BG ================================= -->
                 <a href="{{route('category_products',$category->slug)}}">
                    <div class="categorybox card card-banner border-0">
                        <div class="p-3 text-center">
                            <img class="img-fluid lazy special-category-image" data-src="{{$category->image}}" style="width:180px; max-width:100%; height:auto;" alt="{{$category->name}}">
                            <h5 class="mt-2 two-line-truncate">{{$category->name}}</h5>
                        </div>
                    </div>
                 </a>
            </div>
            @endif
        @endforeach
    </div>
</div>

<style>
    .special-category-image {
        height: auto;
    }

    @media (min-width: 992px) {
        .special-category-image {
            scale:1.4!important;
        }
    }

    .animate{
        animation: pulse 2s ease-in-out 3;
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.15);
        }
    }

    .two-line-truncate {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        text-overflow: ellipsis;
    }
</style>
