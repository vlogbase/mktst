<div>
    <div class="row">
        @foreach ($items as $item)
        <div class="col-lg-4 col-md-6 text-center">
            <div class="blog_post blog_style2 box_shadow1">
                <div class="blog_img">
                        <img src="{{$item->image}}" alt="blog_small_img3">
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-12 mt-2 mt-md-4 justify-content-center">
            {{ $items->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
