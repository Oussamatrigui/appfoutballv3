@extends('client_layout.client')
@section('title')
    BackOffice | | | FIF | | | Equipe Nationale de Cote d-ivoire
@endsection
@section('content')
<br><br>
<main class="login-form ftco-animate">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">BackOffice</h3>
                    <div class="card-body">
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
                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                    autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-primary btn-block">Signin</button>
                            </div>
                        </form>
                        <br>
                        <a class="col-md-7 col-form-label text-md-right" href="{{ url('register_journalist') }}">
                            {{ __('Journalist Form ') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection