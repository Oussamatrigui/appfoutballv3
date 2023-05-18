@extends('admin_layout.layout')
@section('title')
        Add News
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
          </div><br><br>

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
          <!-- /.card-header -->
          <!-- form start -->
          

            {!!Form::open(['action'=> 'App\Http\Controllers\NewsController@savenews', 'method' => 'POST' , 'enctype' => 'multipart/form-data'])!!}
              {{ csrf_field() }}

            <div class="card-body">
              <div class="form-group">


                {{Form::label('', 'Author name',['for'=>'example'])}}

                {{Form::text('auteur', '',['class'=>'form-control','id'=>'example','placeholder'=>'Enter Author name'])}}

              </div>
              <div class="form-group">

                {{Form::label('', 'News Title',['for'=>'example'])}}

                {{Form::text('news_title', '',['class'=>'form-control','id'=>'example','placeholder'=>'Enter News Title'])}}
              </div>
              <div class="form-group">
                {{-- <label>Product category</label> --}}

                {{Form::label('', 'News Content',['for'=>'example'])}}

                
                {{Form::text('news_content', '',['class'=>'form-control','id'=>'example','placeholder'=>'Enter News Content'])}}

              </div>
              <label for="exampleInputFile">Product image</label>
              <div class="input-group">
                <div class="custom-file">
                  {{-- <input type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label> --}}

                  {{Form::file('news_image' , ['class' => 'custom-file-input' ,                 'id' =>'exampleInputFile'])}}
                  
                  {{Form::label('', 'Choose file',['class' => 'custom-file-label' ,'for'=>'exampleInputFile'])}}

                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

                {{Form::submit('Save',['class'=>'btn btn-primary'])}}
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
        

