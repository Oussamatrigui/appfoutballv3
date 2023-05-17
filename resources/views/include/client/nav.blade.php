<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
    
    <a class="navbar-brand" href="{{url('/')}}"> 
        <img src="https://wael-toumi.me/images/logo.png" style="height : 70px; width : 50px" class="img-circle elevation-2" alt="User Image"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item {{request()->is('/') ? 'cta cta-colored menu-open' : ''}}">
            <a href="{{url('/')}}" class="nav-link">Home</a></li>
        <li class="nav-item {{request()->is('shop') ? 'cta cta-colored' : ''}}"><a href="{{url('/shop')}}" class="nav-link">shop</a></li>

        <li class="nav-item {{request()->is('panier') ? 'cta cta-colored' : ''}} ">
            <a href="{{url('/panier')}}" class="nav-link">
                <span class="icon-shopping_cart">
                    [ {{ Session::has('cart') ? Session::get('cart')->totalQty : 0}} ]
                </span>
                

                
            </a>
        </li>


        <li class="nav-item {{request()->is('news') ? 'cta cta-colored' : ''}}"><a href="{{url('/news')}}" class="nav-link">News</a></li>
        <li class="nav-item {{request()->is('news_live') ? 'cta cta-colored' : ''}}"><a href="{{url('/news')}}" class="nav-link">Live Preview</a></li>
        
        <li class="nav-item {{request()->is('login_client') ? 'cta cta-colored' : ''}}">
            @if (Session::has('client'))
                <a href="{{url('/logout')}}" class="nav-link">Logout</a></li>
            @else
                <a href="{{url('/login_client')}}" class="nav-link">Login</a></li>   
            @endif
            
        
        </ul>
    </div>
    </div>
</nav>