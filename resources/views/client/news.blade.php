@extends('client.client_layout.index')
@section('title')
    News
@endsection

@section('con')
    {{-- startcontent --}}
        <div class="hero-wrap hero-bread" style="background-image: url('{{ asset('images/actualite.jpg') }}');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Accueil</a></span> <span>actualité</span>
                    </p>
                    <h1 class="mb-0 bread">actualité</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 mb-5 text-center">
                    <ul class="product-category">
                        <li><a href="{{ url('/shop') }}" class="{{ request()->is('shop') ? 'active' : '' }}">All</a></li>
                       {{-- @foreach ($categories as $category)
                            <li>
                                <a href="{{ url('/select_par_cat/' . $category->category_name) }} "
                                    class="{{ request()->is('select_par_cat/' . $category->category_name) ? 'active' : '' }}">{{ $category->category_name }}</a>
                            </li>
                        @endforeach--}}
                    </ul>
                </div>
            </div>
            <div class="row">
              @foreach ($contents as $content)
              <div class="col-md-6 col-lg-3 ftco-animate">
                  <div class="product">
                      <a href="#" class="img-prod"><img class="img-fluid"
                              src="/storage/news_images/{{ $content->news_image }}" alt="News">
                          <div class="overlay"></div>
                      </a>
                      <div class="text py-3 pb-4 px-3 text-center">
                          <p>{{ $content->news_title }}</p>

                          <p><span>auteur:{{ $content->auteur }}</span>
                          </p>
                          <p><a href="{{ url('/article/' . $content->news_title) }}" class="btn btn-primary">voir
                                  plus</a></p>


                      </div>
                  </div>
              </div>
          @endforeach
            </div>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </section>

    {{-- endcontent --}}
@endsection
