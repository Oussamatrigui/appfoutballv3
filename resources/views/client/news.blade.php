@extends('client_layout.layout')
@section('title')
News | | | FIF | | | Equipe Nationale de Cote d-ivoire
@endsection

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
 <!-- Libraries Stylesheet -->
 <link rel="stylesheet" href="{{asset('client_front/style.css')}}">
    {{-- startcontent --}}
        <div class="hero-wrap hero-bread" style="background-image: url('{{ asset('images/actualite.jpg') }}');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs">
                        <span class="mr-2">
                        <a href="/">Accueil</a>
                    </span> <span>actualité</span>
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
                        <li><a href="{{ url('/news') }}" class="{{ request()->is('') ? 'active' : '' }}">All</a></li>
                    </ul>
                </div>
            </div>

<!-- Featured News Slider Start -->
<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">Most Viewed</h4>
            
        </div>
        <div class="owl-carousel news-carousel carousel-item-4 position-relative">

            @foreach ($contents as $content)

                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid h-100" src="/storage/news_images/{{ $content-> news_image}}" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                            href="{{url('/article/'.$content-> news_title)}}">{{ $content-> auteur}}</a>
                            <a class="text-white" href="{{url('/article/'.$content->news_title)}}"><small>{{ $content-> created_at}}</small></a>
                        </div>
                        <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="">{{ $content-> news_content}}</a>
                    </div>
                </div>

            @endforeach
            
        </div>
    </div>
</div>
<!-- Featured News Slider End -->
<br>
    <div class="container-fluid pt-5 mb-3 row">
        
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
