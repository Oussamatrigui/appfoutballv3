@extends('client.client_layout.index')
@section('title')
    FIF | | | Equipe Nationale de la cote d-ivoire
@endsection
@section('con')
    <section id="home-section" class="hero">
        <div class="home-slider owl-carousel">
            @foreach ($sliders as $slider)
                <div class="slider-item" style="background-image: url(/storage/slider_image/{{ $slider->slider_image }});">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                            <div class="col-md-12 ftco-animate text-center">
                                <h1 class="mb-2">{{ $slider->description1 }}</h1>
                                <h2 class="subheading mb-4">{{ $slider->description2 }}</h2>
                                <p><a href="/shop" class="btn btn-primary">Voir les détails</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach



        </div>
    </section>
    <section class="resultat">
       
        <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Résultats des matchs</h2>
        </div>
        
    
        <table class="col-md-12 heading-section text-center ftco-animate">
            <thead>
                <tr>
                    <th>Équipe domicile</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Équipe visiteur</th>
                    <th>Résultat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <img class="team-logo" src="images/cot.png" alt="Logo équipe 1">
                        <br>
                        Équipe 1
                    </td>
                    <td>15 mai 2023</td>
                    <td>18:00</td>
                    <td>
                        <img class="team-logo" src="images/tun.png" alt="Logo équipe 2">
                        <br>
                        Équipe 2
                    </td>
                    <td>3 - 2</td>
                </tr>
                <tr>
                    <td>
                        <img class="team-logo" src="images/cam.png" alt="Logo équipe 3">
                        <br>
                        Équipe 3
                    </td>
                    <td>20 mai 2023</td>
                    <td>20:30</td>
                    <td>
                        <img class="team-logo" src="images/cot.png" alt="Logo équipe 4">
                        <br>
                        Équipe 4
                    </td>
                    <td>1 - 1</td>
                </tr>
            </tbody>
        </table>
    </section>
    <section class="resultat">
        
        <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Prochain match</h2>
        </div>
        <table class="col-md-12 heading-section text-center ftco-animate">
            <thead>
                <tr>
                    <th>Équipe domicile</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Équipe visiteur</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <img class="team-logo" src="images/cot.png" alt="Logo équipe 5">
                        <br>
                        Équipe 5
                    </td>
                    <td>25 mai 2023</td>
                    <td>19:00</td>
                    <td>
                        <img class="team-logo" src="images/Nigeria.png" alt="Logo équipe 6">
                        <br>
                        Équipe 6
                    </td>
                </tr>
            </tbody>
        </table>
    </section>



    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">News</h2>
                </div>
            </div>
        </div>
        <div class="container">
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

                <div class="col-lg-4 ftco-animate">
                    <div class="product">
                        <div class="ratio ratio-9x9">
                            <iframe src="https://www.youtube.com/embed/QOlJ2WaDzGY" title="YouTube video"
                                allowfullscreen></iframe>
                        </div>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="#">Fruit Juice</a></h3>

                            <div class="d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="#"
                                        class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <button class="btn btn-primary">Decouvrir</button>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>



                <div class="col-lg-4 ftco-animate">
                    <div class="product">

                        <div class="ratio ratio-9x9">
                            <iframe src="https://www.youtube.com/embed/Pt1oKcj6r1U" title="YouTube video"
                                allowfullscreen></iframe>
                        </div>


                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="#">Fruit Juice</a></h3>

                            <div class="d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="#"
                                        class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <button class="btn btn-primary">Decouvrir</button>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section img" style="background-image: url(images/maillotslider.png);">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
                    <h2 class="mb-4">N'hésiter pas à réserver les produits des élèphants</h2>
                    <p class="paragraph">Vous trouverez ci-dessous tous les types et les tailles de produits de l'equipe
                        national ivoirienne</p>
                    <p><a href="{{ url('/home') }}" target="_blan" class="btn btn-primary">Decouvrir</a></p>
                    <span class="price"> <a href="#">10% de réduction</a></span>

                </div>
            </div>
        </div>
    </section>

    {{-- <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Testimony</span>
                    <h2 class="mb-4">Our satisfied customer says</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts. Separated they live in</p>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Marketing Manager</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(images/person_2.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Interface Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(images/person_3.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">UI Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Web Developer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">System Analyst</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <hr>

    <section class="ftco-section ftco-partner">
        <div class="container">
            <div class="row">
                <div class="col-sm ftco-animate">
                    <a href="https://www.cafonline.com/" class="partner"><img src="images/images-(5).jpg"
                            class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="https://www.fifa.com/fr" class="partner"><img src="images/FIFA-Logo.jpg" class="img-fluid"
                            alt="Colorlib Template"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="https://eu.puma.com/fr/fr/home" class="partner"><img src="images/télé.jpg"
                            class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="https://www.canalplus.com/" class="partner"><img src="images/CANA.jpg" class="img-fluid"
                            alt="Colorlib Template"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="https://www.totalenergies.fr/" class="partner"><img src="images/téléchargement-(7).jpg"
                            class="img-fluid" alt="Colorlib Template"></a>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
        <div class="container py-4">
            <div class="row d-flex justify-content-center py-5">
                <div class="col-md-6">
                    <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
                    <span>Get e-mail updates about our latest shops and special offers</span>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <form action="#" class="subscribe-form">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" placeholder="Enter email address">
                            <input type="submit" value="Subscribe" class="submit px-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
