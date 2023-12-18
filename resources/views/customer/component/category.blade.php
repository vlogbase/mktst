
<div>
    <div class="row">
        @php
            $specialCategoryCount = $customerpagedata['categories']->where('special',1)->count();
            @endphp
        @foreach($customerpagedata['categories'] as $category)
            
            @if($category->special == 1)
            <div class="{{ $specialCategoryCount > 5 ?  'col-md-4' : 'col-md-2' }} mx-auto col-6 mt-4 mb-4" style="cursor:pointer;" >
                 <!-- ============================ COMPONENT ITEM BG ================================= -->
                 <a href="{{route('category_products',$category->slug)}}">
                    <div style="background:transparent!important;" class="categorybox card card-banner border-0">
                        <div class="text-center "  style="{{ $specialCategoryCount > 5 ?  'width:90%;' : 'width:125%;' }}">
                            <img 
                            style="{{ $specialCategoryCount > 5 ?  '0.9' : 'scale:1.3;' }};animation: pulse 2s ease-in-out {{'0.'.$loop->index * 2}}s 3;" data-src="{{$category->image}}" class="lazy"   alt="{{$category->name}}">
                        </div>
                    </div>
                    </a>
                    <!-- ============================ COMPONENT ITEM BG  END .// =========================== -->
            </div>
            @endif
        @endforeach
    </div> <!-- row.// -->
    <div class="row mt-2">
        @foreach($customerpagedata['categories'] as $category)
            @if($category->special == 0)
            <div class="col-md-2 col-4 mt-4 mb-4" style="cursor:pointer;" >
                 <!-- ============================ COMPONENT ITEM BG ================================= -->
                 <a href="{{route('category_products',$category->slug)}}">
                    <div class="categorybox card card-banner border-0">
                        <div class="p-3 text-center" style="width:125%">
                            <img class="lazy" data-src="{{$category->image}}"  style="width:180px;" alt="{{$category->name}}">
                            <h5 class="mt-2 two-line-truncate">{{$category->name}}</h5>
                        </div>
                    </div>
                    </a>
                    <!-- ============================ COMPONENT ITEM BG  END .// =========================== -->
            </div>
            @endif
        @endforeach
    </div>
</div>

<style>
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