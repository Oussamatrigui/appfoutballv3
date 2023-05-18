@extends('admin_layout.layout')
@section('title')
        Edit profile
@endsection

@section('con')

    @include('include.admin.admincontentheader')
    <!-- Main content -->

  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>
          </div>
          <br><br>

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
              <div class="col-sm-3 alert alert-primary">
                {{Session::get('status')}}
              </div>
          @endif
          <!-- /.card-header -->
          <!-- form start -->


            {!!Form::open(['action'=> 'App\Http\Controllers\AdminController@update_profile_client', 'method' => 'POST' , 'enctype' => 'multipart/form-data'])!!}
              {{ csrf_field() }}
              
            <div class="card-body">
              <div class="form-group">

                {{Form::hidden('id' , $client ->id )}}
                {{Form::label('', 'Name',['for'=>'example'])}}
                {{Form::text('name', $client->name ,['class'=>'form-control','id'=>'name','placeholder'=>'Enter your name'])}}
              </div>
              <div class="form-group">

                {{ Form::label('email', 'Email') }}
                {{ Form::email('email', $client->email , ['class' => 'form-control', 'placeholder' => 'Enter your email']) }}  
            
                
              </div>

              <div class="form-group">
            
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
              </div>

                </div>
                
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <!-- <button type="submit" class="btn btn-success">Submit</button> -->
              {{-- <input type="submit" class="btn btn-success" value="Save"> --}}

              {{Form::submit('Update',['class'=>'btn btn-primary'])}}
            </div>
              {!!Form::close()!!}

            </div>
          {{-- </form> --}}
        </div>
        <!-- /.card -->
        </div>
      <!--/.col (left) -->
      <!-- right column -->
      <div class="col-md-6">

      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->

@endsection
        

