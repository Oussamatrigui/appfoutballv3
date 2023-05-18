@extends('client_layout.client')
@section('title')
    Login | | | FIF | | | Equipe Nationale de Cote d-ivoire
@endsection
@section('content')
<br><br>
<main class="login-form ftco-animate">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Login Client</h3>
                        
                    <div class="card-body">

                        @if (Session::has('status'))
                                <div class="row justify-content-center">
                                    <div class="col-md-8 alert alert-success">
                                    {{Session::get('status')}}
                                    </div>
                                </div>
                        @endif


                        @if (count($errors) > 0 )
                    
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li> {{ $error }} </li>
                                    @endforeach
                                </ul>
                                
                            </div>
                            
                        @endif
                        {{-- <form method="POST" action="{{ route('adduser') }}"> --}}
                        <form  action="{{ url('/verify') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                    autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>

                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <a class="col-md-7 col-form-label text-md-right" href="{{ url('register_client') }}">
                                    Not yet registered?
                                </a>

                                {{Form::submit('Login',['class'=>'btn btn-primary'])}}
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection