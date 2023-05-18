@extends('admin_layout.layout')
@section('title')
        Edit News
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


            {!!Form::open(['action'=> 'App\Http\Controllers\NewsController@updatenews', 'method' => 'POST' , 'enctype' => 'multipart/form-data'])!!}
              {{ csrf_field() }}


            <div class="card-body">
              <div class="form-group">

                {{Form::hidden('id' , $news -> id )}}
                {{Form::label('', 'Auteur',['for'=>'example'])}}
                {{Form::text('auteur', $news->auteur ,['class'=>'form-control','id'=>'example','placeholder'=>'Enter Autor name'])}}
              </div>
              <div class="form-group">
            
                {{Form::label('', 'News Title',['for'=>'example'])}}
           

                {{Form::text('news_title', $news->news_title,['class'=>'form-control','id'=>'example','placeholder'=>'Enter news_title'])}}
              </div>
              <div class="form-group">
                

                {{Form::label('', 'News Content',['for'=>'example'])}}

                {{Form::textarea('news_content',  $news -> news_content , ['class' => 'form-control','id'=>'example','placeholder'=>'Enter news_title'])}}

              </div>
              <label for="exampleInputFile">News image</label>
              <div class="input-group">
                <div class="custom-file">

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
        

