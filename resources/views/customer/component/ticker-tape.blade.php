@if ($customerpagedata['ticker_tapes']->count() > 0)
    <div class="page-head__ticker">
        <div class="marquee">
            <div class="marquee-content">
                @foreach ($customerpagedata['ticker_tapes'] as $item)
                    @if($item->tickerTapeCategory)
                    <div>
                        <span> {{ $item->tickerTapeCategory->head }}</span>
                    </div>
                    @endif
                    <p>{{ $item->text }}</p>
                @endforeach
            </div>
        </div>
    </div>
@endif


<style>
    /**
 * Ticker
 */

    .page-head__ticker {
        font-size: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: "Arial";
        font-size: 24px;
        font-weight: Bold;
        height: 50px;
        width: 100%;
        line-height: 1;
        text-transform: uppercase;
        background-color: orange;
    }

    .marquee {
        overflow: hidden;
        position: relative;
        width: 100%;
        height: 100%;
    }

    .marquee-content {
        margin-top: 0px;
        display: flex;
        position: absolute;
        white-space: nowrap;
        animation: marquee 20s linear infinite;
    }

    .marquee-content p {
        margin-top: 10px;
        color: white;
    }

    .marquee-content div {
        color: orange;
        background-color: black;
        padding: 10px;
        margin-right: 25px;
        font-size: 30px;
        font-weight: 800;
    }

    /* Animasyon hızını değiştirmek için süreyi ayarlayın (örneğin, 10s) */
    @keyframes marquee {
        from {
            left: 100%;
        }

        to {
            left: -100%;
        }
    }

    /* Yazı stillerini özelleştirmek için */
    .marquee-content p {
        margin-right: 25px;
        /* Yazılar arası mesafeyi ayarlayın */
    }
</style>
