<section class="ftco-section">
    <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
      <div class="col-md-12 heading-section text-center ftco-animate">
          <span class="subheading">Featured Products</span>
        <h2 class="mb-4">Our Products</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
      </div>
    </div>   		
    </div>
    <div class="container">
        <div class="row">

            @foreach ($products as $product)

                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="{{url('/product/'.$product->id)}}" class="img-prod">
                            <img class="img-fluid" style="height : 300px; " 
                             src="/storage/product_images/{{ $product-> product_image}}" alt="">
                            <span class="status">%</span>
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="#">{{ $product -> product_name }}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price">
                                        <span class="mr-2 price-dc">
                                            {{ $product -> product_price }} TND</span>
                                        <span class="price-sale">{{ $product -> product_price }} TND</span></p>
                                </div>
                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="{{url('/add_to_panier/'.$product->id)}}" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
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