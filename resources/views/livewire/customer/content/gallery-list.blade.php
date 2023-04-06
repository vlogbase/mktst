<div>
    <div class="row">
        @if (count($items) > 0 )
        @foreach ($items as $item)
        <div class="col-lg-4 col-md-6 text-center">
            <div class="blog_post blog_style2 box_shadow1">
                <div class="blog_img">
                        <img src="{{$item->image}}" alt="blog_small_img3">
                </div>
            </div>
        </div>
        @endforeach
        @else
            <div class="col-lg-12 text-center">
                <h5 class="text-muted">Coming Soon</h5>
            </div>     
        @endif
    </div>
    <div class="row">
        <div class="col-12 mt-2 mt-md-4 justify-content-center">
            {{ $items->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
