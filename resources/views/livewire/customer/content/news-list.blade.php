<div>
    <div class="row">
        @if (count($items) > 0 )
        @foreach ($items as $item)
        <div class="col-lg-4 col-md-6">
            <div class="blog_post blog_style1 box_shadow1">
                <div class="blog_img">
                    <a href="{{route('news.detail',$item->slug)}}">
                        <img src="{{$item->image}}" alt="{{$item->name}}">
                    </a>
                </div>
                <div class="blog_content bg-white">
                    <div class="blog_text">
                        <h5 class="blog_title"><a href="{{route('news.detail',$item->slug)}}">@if(strlen($item->name) < 50)
                                @php
                                    $space = 50 - strlen($item->name);
                                @endphp
                                {{$item->name}}
                                @for ($i = 0; $i < $space; $i++)
                                    &nbsp;
                                @endfor
                                
                            @else
                                {{!!substr($item->name, 0, 50).'...'!!}}
                            @endif
                        </a></h5>
                        <ul class="list_none blog_meta">
                            <li class="text-secondary"><i class="ti-calendar"></i> {{$item->humanTime()}}</li>
                            
                        </ul>
                        <p>{!!substr($item->text, 0, 200).'...'!!}</p>
                    </div>
                    <a href="{{route('news.detail',$item->slug)}}" class="mt-3 btn btn-dark ">Read More</a>
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
            {{ $items->links() }}
        </div>
    </div>
    
</div>
