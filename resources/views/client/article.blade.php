@extends('client_layout.client')
@section('title')
    FIF | | | News | | | 
@endsection
@section('newsdetail')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
        <link href="http://wael-toumi.me/social_share_button.css" rel="stylesheet">
        <link href="http://wael-toumi.me/word-wrap.css" rel="stylesheet">
        <link href="http://wael-toumi.me/responsive.css" rel="stylesheet">

        
        <div class="container-fluid">
            <div class="container news-section">
                
                <div class="row">
                    <div class="col-lg-8 news-details">
            @foreach ($contents as $content)
            
                <!-- News Detail Start -->
                <div class="position-relative" style="height: 300px;">
                    <br>
                    <h4 class="mb-3 text-secondary text-uppercase font-weight-bold">{{ $content-> news_title}}</h4>
                    <img class="img-fluid h-100 " src="/storage/news_images/{{ $content-> news_image}}" style="object-fit: cover;">
                    <div class="bg-white border border-top-0 p-4">
                        
                        <div class="mb-3">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href="">{{ $content->auteur}}</a>
                            <a class="text-body" href="">{{ $content-> created_at}}</a>
                        </div>
                        <div class='word-wrap'> {{ $content-> news_content}} </div>
                    </div>
                    <a href="{{ url('/article', ['news_title' => $content-> news_title]) }}" class="btn btn-primary">Share News</a>
                </div>
            @endforeach
                    </div>
            
    </div>

    
        <div class="col-lg-8 trending-news">
            <!-- Popular News Start -->
            <div class="mb-3 ">
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">Latest News</h4>
                </div>
                <div class="bg-white border border-top-0 p-3">
                 
                    @foreach ($latestNews as $latestNews)
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                            <img class="img-fluid" src="/storage/news_images/{{ $latestNews-> news_image}}" style=" height:110px; width:110px; " alt="">
                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">{{ $latestNews-> auteur}}</a>
                                    <a class="text-body" href="">
                                        <small>{{ $latestNews-> created_at}}</small></a>
                                </div>
                                <p class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">{{ $latestNews-> news_title}}
                                </p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <!-- Popular News End -->
            
        <div class="container">

            <div class="row">
                <div class="col-sm">

                    {{-- Social Share --}}
                                    
                        {{-- @include('include.client.soc_button') --}}

                    {{-- Social Share --}}

                </div>
            </div>

        </div>


        
<div class=" trending-news">
    @include('include.client.social')</div>            
<!-- Social Follow Start -->

<!-- Social Follow End -->

<!-- Ads Start -->
<div class="mb-3">
<div class="section-title mb-0">
<h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
</div>
<div class="bg-white text-center border border-top-0 p-3">
<a href=""><img class="img-fluid" src="img/news-800x500-2.jpg" alt=""></a>
</div>
</div>
<!-- Ads End -->






</div>
</div>
</div>
</div>




@endsection

