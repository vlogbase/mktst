<div class="d-none d-md-block">
    @foreach ($adverts as $advert)
        @if ($advert->side == $side)
            <a href="{{ $advert->redirect_url }}" target="_blank">
                <img src="{{ $advert->getImageUrl() }}" style="width:170px" class=" my-4">
            </a>
        @endif
    @endforeach

</div>
<div class="d-md-none advertSlider swiper">
    <div class="swiper-wrapper" style="align-items: center;">
        @foreach ($adverts as $advert)
                <div class="swiper-slide" >
                    <a href="{{ $advert->redirect_url }}" target="_blank">
                        <img src="{{ $advert->getImageUrl() }}" style="width:170px;margin: auto;" class=" my-4">
                    </a>
                </div>
        @endforeach
    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>



<script>
    var swiper = new Swiper(".advertSlider", {
        loop: true,
        speed: 1000,
        autoplay: {
            delay: 3000,
        },
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
            rotate: 0,
            stretch: 80,
            depth: 200,
            modifier: 1,
            slideShadows: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        // Diğer seçenekler ve özelleştirmeler
    });
</script>
