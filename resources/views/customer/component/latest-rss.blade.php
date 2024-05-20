@foreach ($feeds as $feed)
<div class="col-lg-4 col-md-6">
    <div class="blog_post blog_style1 box_shadow1">
        <div class="blog_img">
            <a target="_blank" href="{{$feed['permalink']}}">
                <img class="lazy" data-src="{{ $feed['image'] }}" alt="{{ $feed['title'] }}">
            </a>
        </div>
        <div class="blog_content bg-white">
            <div class="blog_text">
                <h5 class="blog_title"><a
                    target="_blank"  href="{{$feed['permalink']}}">
                    @if(strlen($feed['title']) < 80)
                                @php
                                    Log::info($feed['title']);
                                    $space = 80 - strlen($feed['title']);
                                @endphp
                                {{$feed['title']}}
                                @for ($i = 0; $i < $space; $i++)
                                    &nbsp;
                                @endfor
                                
                            @else
                                {!!substr($feed['title'], 0, 80).'...'!!}
                            @endif
                    {{-- {{ $feed['title'] }} --}}
                    </a>
                </h5>
                <ul class="list_none blog_meta">
                    <li class="text-secondary"><i class="ti-calendar"></i>
                        {{ $feed['humanDate'] }}</li>
                <li class="text-secondary"><i class="ti-comment"></i> {{ $feed['name'] }} </li>
                </ul>
                
            </div>
            <a target="_blank" href="{{$feed['permalink']}}"
                class="mt-3 btn btn-fill-out rounded-0  ">Read More</a>
        </div>
    </div>
</div>
@endforeach


