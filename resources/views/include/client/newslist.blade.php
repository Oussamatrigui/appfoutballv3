<section class="ftco-section">
    <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
      <div class="col-md-12 heading-section text-center ftco-animate">
          <span class="subheading">Latests News</span>
        <h2 class="mb-4">News</h2>
        <p> ----- </p>
      </div>
    </div>   		
    </div>
    <div class="container">
        <div class="row">

            @foreach($news as $news)

                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="{{url('/news/'.$news->id)}}" class="img-prod">
                            <img class="img-fluid" style="height : 300px; " src="/storage/news_images/{{ $news-> news_image}}" alt="">
                            
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="#">{{ $news-> auteur}} / {{ $news-> created_at}} </a></h3>
                            
                            <div class="d-flex px-3">
                                <div class="m-auto d-flex">
                                    
                                    <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <button class="btn btn-primary">Decouvrir</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach


        </div>
    </div>
</section>	