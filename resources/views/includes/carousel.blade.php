<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="bd-placeholder-img" width="100%" src="/storage/slider/shoping.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" alt="shoping">
            <div class="container">
                <div class="carousel-caption text-left">
                    <h2>All Market</h2>
                    <p>{{ trans('idioma.carousel1p') }}</p>
                    <!-- <p><a class="btn btn-lg btn-primary" href="#" role="button">Conocer más</a></p> -->
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="bd-placeholder-img" width="100%" src="/storage/slider/perchero.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" alt="shoping">
            
            <div class="container">
                <div class="carousel-caption">
                    <h2>{{ trans('idioma.carousel2t') }}</h2>
                    <p>{{ trans('idioma.carousel2p') }}</p>
                    <!-- <p><a class="btn btn-lg btn-primary" href="#" role="button">Conocer más</a></p> -->
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="bd-placeholder-img" width="100%" src="/storage/slider/phone.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" alt="shoping">
            <div class="container">
                <div class="carousel-caption text-right">
                    <h2>{{ trans('idioma.carousel3t') }}</h2>
                    <p>{{ trans('idioma.carousel3p') }}</p>
                    @guest
                    <p><a class="btn btn-lg btn-primary" href="/register" role="button">{{ trans('idioma.carousel3p2') }}</a></p>
                    @endguest
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>