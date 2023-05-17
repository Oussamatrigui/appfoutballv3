
<section id="home-section" class="hero">
    <div class="owl-carousel home-slider">
            @foreach ($sliders as $slider)

                <div class="slider-item" style="background-image: url(/storage/slider_images/{{     $slider-> slider_image}});">
                            <div class="overlay">
                            </div>
                            <div class="container">
                                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                                    <div class="col-md-12 ftco-animate text-center">
                                        <h1 class="mb-2">{{ $slider -> description1 }}</h1>
                                        <h2 class="subheading mb-4">{{ $slider -> description2 }}</h2>
                                        <p><a href="" class="btn btn-primary">View Details</a></p>
                                    </div>
                                </div>
                            </div>
                </div>
            @endforeach
        </div>
    
</section> <br> <br> <br> <br>