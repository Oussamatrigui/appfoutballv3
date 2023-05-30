@extends('client_layout.layout')
@section('title')
    FIF | | | News | | | Equipe Nationale de la cote d'ivoire
@endsection

@section('newsdetail')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="http://wael-toumi.me/social_share_button.css" rel="stylesheet">
    <link href="http://wael-toumi.me/word-wrap.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('word-break/word-wrap.css')}}">
    
    
    <div class="container-fluid mt-5 mb-3 pt-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Breaking News End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- News Detail Start -->

                    @foreach ($contents as $content)
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100 ftco-animate" src="/storage/news_images/{{ $content-> news_image}}" style="object-fit: cover;">
                            <div class="bg-white border border-top-0 p-4">
                                <div class="mb-3">
                                    <a class="badge badge-success text-uppercase font-weight-semi-bold p-2 mr-2 ftco-animate"
                                        href="">
                                        {{ $content->auteur}}
                                    </a>
                                    <a class="text-body ftco-animate">
                                        {{ $content-> created_at->diffForHumans()}}
                                    </a>
                                </div>
                                <h4 class="mb-3 text-secondary text-uppercase font-weight-bold ftco-animate">
                                    {{ $content-> news_title}}
                                </h4>
                                <div class='word-wrap ftco-animate'> 
                                    {{ $content-> news_content}} 
                                </div>
                            </div>
                            <div class="bg-white border border-top-0 p-4">
                                <div class="d-flex align-items-center">
                                    <div class="ftco-animate" style=".social-buttons {
                                        display: flex;
                                        justify-content: space-between;
                                        margin-top: 50px;
                                      }">
                                      <div class="container">
                                            <div class="row justify-content-md-center">
                                                <div class="col col-lg-2">
                                                    <a href="#" class="social-button facebook">
                                                    <i class="fab fa-facebook-f"></i>
                                                    </a>
                                                </div>
                                                <div class="col col-lg-2">
                                                    <a href="#" class="social-button twitter">
                                                    <i class="fab fa-twitter"></i>
                                                    </a>
                                                </div>
                                                <div class="col col-lg-2">
                                                    <a href="#" class="social-button linkedin">
                                                    <i class="fab fa-linkedin-in"></i>
                                                    </a>
                                                </div>
                                                <div class="col col-lg-2">
                                                    <a href="#" class="social-button pinterest">
                                                    <i class="fab fa-pinterest"></i>
                                                    </a>
                                                </div>
                                            </div>
                                      </div>
                                      </div>
                                    {{-- <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                    <span>John Doe</span> --}}

                                </div>
                                <div class="d-flex align-items-center">
                                    {{-- <span class="ml-3"><i class="far fa-eye mr-2"></i>12345</span>
                                    <span class="ml-3"><i class="far fa-comment mr-2"></i>123</span> --}}
                                </div>
                            </div>
                        </div>
                    
                    <!-- News Detail End -->

                    <!-- Comment List Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold ftco-animate">Recent Comments ({{ $content->comments_count }}):</h4>
                        </div>
                        @if (isset($comments[$content->id]))
                            @foreach ($comments[$content->id] as $comment)
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="media mb-4">
                                        <div class="media-body">
                                            <h6>
                                                <a class="text-secondary font-weight-bold ftco-animate" href="">{{ $comment->name }}
                                                </a> 
                                                <small>
                                                    <i>
                                                        {{$comment->created_at->diffForHumans()}}
                                                    </i>
                                                </small>
                                            </h6>
                                            <p>
                                                {{ $comment->message }}
                                            </p>     
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- Comment List End -->
                    @if (count($errors) > 0 )
                    
                                      <div class="alert alert-danger">
                                          <ul>
                                              @foreach ($errors->all() as $error)
                                                  <li> {{ $error }} </li>
                                              @endforeach
                                          </ul>
                                          
                                      </div>
                            
                    @endif
          
                    @if (Session::has('status'))
                    <div class="row align-items-center justify-content-center">
                        <div class="container-fluid ">
                            <div class="col-md-12 text-center alert alert-success ">
                            {{Session::get('status')}}
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- Comment Form Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold ftco-animate">Leave a comment</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-4">
                            {!!Form::open(['action'=> 'App\Http\Controllers\IndexController@save_comment', 'method' => 'POST' , 'enctype' => 'multipart/form-data'])!!}
                            {{ csrf_field() }}
                            <input type="hidden" name="news_id" value="{{ $content->id }}">
                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            
                                            {{Form::label('', 'Name *',['for'=>'example'])}}
                                            
                                            {{Form::text('name', '',['class'=>'form-control','id'=>'name','placeholder'=>''])}}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                           
                                            {{Form::label('', 'Email *',['for'=>'email'])}}
                                            
                                            {{Form::text('email', '',['class'=>'form-control','id'=>'email','placeholder'=>''])}}
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    
                                    {{Form::label('', 'Message *',['for'=>'message'])}}

                                    
                                    {{Form::textarea('message', '',['class'=>'form-control','id'=>'message','placeholder'=>''])}}
                                </div>
                                <div class="form-group mb-0">

                                    {{Form::submit('Leave a comment',['class'=>'btn btn-success'])}}

                                </div>
                            {!!Form::close()!!}
                        </div>
                    </div>
                    <!-- Comment Form End -->
                </div>
                @endforeach

                <div class="col-lg-4">
                    <!-- Popular News Start -->
                    
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase ftco-animate">Latest News</h4>
                        </div>
                        
                        <div class="bg-white border border-top-0 p-3">

                            @foreach ($latestNews as $latestNews)
                           
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid ftco-animate" src="/storage/news_images/{{ $latestNews-> news_image}}" alt="" style="width:110px;height:110px;">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0 ftco-animate">
                                    <div class="mb-2">
                                        <a class="badge badge-success text-uppercase font-weight-semi-bold p-1 mr-2" href="{{url('/article/'.$latestNews->news_title)}}">{{ $latestNews-> auteur}}</a>
                                        <a class="text-body" href="">
                                            <small>{{ $latestNews-> created_at->diffForHumans()}}</small>
                                        </a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold ftco-animate" href="">{{ $latestNews-> news_title}}</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Popular News End -->
                    <!-- Social Follow Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase">Follow Us</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            
                            <a href="" class="d-block w-100 text-white text-decoration-none" style="background: #055570;">
                                <i class="fab fa-vimeo-v text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Followers</span>
                            </a>
                        </div>
                    </div>
                    <!-- Social Follow End -->

                    <!-- Ads Start -->
                    
                    <!-- Ads End -->

                    <!-- Newsletter Start -->
                    
                    <!-- Newsletter End -->

                    <!-- Tags Start -->
                    
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->


    <!-- Footer Start -->
    
    <!-- Footer End -->


    <!-- Back to Top -->
    


    {{-- <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script> --}}


    @endsection

