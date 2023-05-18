@extends('client_layout.client')
@section('title')
    Register | | | FIF | | | Equipe Nationale de Cote d-ivoire
@endsection
@section('content')

<br><br>
<main class="register-form ftco-animate">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Register Client</h3>
                    @if (count($errors) > 0 )
                    
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                            
                        </div>
                        
                    @endif

                    <div class="card-body">
                        @if (Session::has('status'))
                            <div class="row justify-content-center">
                                <div class="col-md-8 alert alert-success">
                                {{Session::get('status')}}
                                </div>
                            </div>
                        @endif
                        
                                {{-- {!!Form::open(['action'=> 'App\Http\Controllers\ClientController@saveuser', 'method' => 'POST' , 'enctype' => 'multipart/form-data'])!!} --}}
                            <form class="action" action="{{url('/saveuser')}}" method="POST">
                                
                                    @csrf

                                <div class="form-group mb-3">
                                
                                    {{Form::text('name', '',['class'=>'form-control','id'=>'name','placeholder'=>'Your name'])}}
                                </div>

                                <div class="form-group mb-3">

                                    {{Form::text('email', '',['class'=>'form-control','id'=>'name','placeholder'=>'Email or Username'])}}
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                </div>
                                <div class="form-group mb-3">
                                    <a class="col-md-7 col-form-label text-md-right" href="{{ url('login_client') }}">
                                        {{ __('Already registered?') }}
                                    </a>
                        
                                    {{Form::submit('Register',['class'=>'btn btn-primary'])}}
                                </div>
                                {{-- {!!Form::close()!!} --}}
                            </form>
                       
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection