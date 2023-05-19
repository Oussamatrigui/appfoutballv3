<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a href="/"><img src="images/cot.png" width="80" height="86"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->is('/') ? 'cta cta-colored' : '' }}"><a href="{{ url('/') }}"
                        class="nav-link">home</a>
                </li>
                <li class="nav-item {{ request()->is('/home') ? 'cta cta-colored' : '' }}">
                    <a href="/home" target="_blan" class="nav-link">shop</a>
                </li>
                <li class="nav-item {{ request()->is('/news') ? 'cta cta-colored' : '' }}">
                    <a href="{{ url('/news') }}"
                        class="nav-link">news
                    </a>
                </li>
                <li class="nav-item {{ request()->is('/contact') ? 'cta cta-colored' : '' }}">
                    <a href="{{ url('/contact') }}" class="nav-link">contactez-nous</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
