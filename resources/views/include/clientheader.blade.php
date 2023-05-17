	{{--<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 1235 2355 98</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">youremail@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 Business days delivery &amp; Free Returns</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>--}}
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
			<a href="/home"><img src="images/store.jpg" width="140" height="76"></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->is('home') ? 'cta cta-colored' : '' }}"><a href="{{ url('/home') }}"
                    class="nav-link">home</a></li>
					<li class="nav-item {{ request()->is('shop') ? 'cta cta-colored' : '' }}"><a href="{{ url('/shop') }}"
						class="nav-link">boutique</a></li>
	         
	          <li class="nav-item {{request()->is('panier') ? 'cta cta-colored' : ''}} ">
                <a href="{{url('/panier')}}" class="nav-link">
                    <span class="icon-shopping_cart">
                        [ {{ Session::has('cart') ? Session::get('cart')->totalQty : 0}} ]
                    </span>    
              @if (Session::has('client'))
			  <li class="nav-item "><a href="{{url('/logout')}}" class="nav-link">Logout</a></li>
  
			  @else
			  <li class="nav-item "><a href="{{url('/login1')}}" class="nav-link">Login</a></li>

			  @endif
	        </ul>
	      </div>
	    </div>
	  </nav>