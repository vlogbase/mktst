<div class="swiper caraouselSlideer">
    <div class="swiper-wrapper">
        @foreach ($sliders as $slider)
        <div class="swiper-slide">
            <img src="{{$slider->image}}" alt="">
        </div>
        @endforeach
    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

<!-- Add Pagination -->


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".caraouselSlideer", {
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

<style>
    .    .swiper,
    .swiper-wrapper{
        width: 100%;
        height: 500px;
    }

    .swiper-slide {
        width: 800px;
        height: 500px;
    }

    .swiper-slide img {
        display: block;
        margin: 0 auto;
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .swiper-slide-prev,
    .swiper-slide-next {
        filter: blur(6px) brightness(50%);
    }

    .swiper-button-next,
    .swiper-button-prev {
        color: #fff;
        font-size: 12px;
        background: orange;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        text-align: center;
        line-height: 40px;
        position: absolute;
        top: 50%;
        margin-top: -20px;
        z-index: 10;
    }

    @media (max-width: 768px) {
        .swiper-slide {
            width: 100%;
            height: 100%;
        }
    }
</style>
