
<div class="row">
    @foreach($customerpagedata['categories'] as $category)
        @if($category->name == 'Markket Specials' || $category->name == 'Markket Clearance' || $category->name == 'Markket Exclusives' || $category->name == 'Featured Brands' || $category->name == 'Markket Best Sellers' || $category->name == 'Markket New Arrivals' || $category->name == 'Farmers Markket' )
        <div class="animate col-md-2 mx-auto col-6 mt-4 mb-4" style="cursor:pointer;" >
             <!-- ============================ COMPONENT ITEM BG ================================= -->
             <a href="{{route('category_products',$category->slug)}}">
                <div class="categorybox card card-banner border-0">
                    <div class="p-3 text-center" style="width:125%">
                        <img src="{{$category->image}}" style="width:180px;" alt="{{$category->name}}">
                        <h4 class="mt-2">{{$category->name}}</h4>
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
        @if($category->name != 'Markket Specials' && $category->name != 'Markket Clearance' && $category->name != 'Markket Exclusives' && $category->name != 'Featured Brands' && $category->name != 'Markket Best Sellers' && $category->name != 'Markket New Arrivals' && $category->name != 'Farmers Markket' )
        <div class="animative col-md-2 col-4 mt-4 mb-4" style="cursor:pointer;" >
             <!-- ============================ COMPONENT ITEM BG ================================= -->
             <a href="{{route('category_products',$category->slug)}}">
                <div class="categorybox card card-banner border-0">
                    <div class="p-3 text-center" style="width:100%">
                        <img src="{{$category->image}}" style="width:180px;" alt="{{$category->name}}">
                        <h4 class="mt-2 two-line-truncate">{{$category->name}}</h4>
                    </div>
                </div>
                </a>
                <!-- ============================ COMPONENT ITEM BG  END .// =========================== -->
        </div>
        @endif
    @endforeach
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
        transform: scale(1.1);
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