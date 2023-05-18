@extends('admin_layout.layout')
@section('title')
  Edit slider
@endsection
@section('con')
       <!-- Content Wrapper. Contains page content -->
       @include('include.admin.admincontentheader')

      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit slider</h3>
              </div>
              @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          @if (Session::has('status'))
              <div class="alert alert-success">
                  {{Session::get('status') }}
              </div>
          @endif
              <!-- /.card-header -->
              <!-- form start -->
              {{--<form >--}}
                {!!Form::open(['action' => 'App\Http\Controllers\SliderController@updateslider', 'method' => 'POST','enctype' => 'multipart/form-data' ])!!}
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    {{--<label for="exampleInputEmail1">Slider description 1</label>
                    <input type="text" name="description1" class="form-control" id="exampleInputEmail1" placeholder="Enter slider description">--}}
                    {{Form::hidden('id', $slider->id)}}
                    {{Form::label('', 'Description one', ['for' => 'exempleInputEmail1'])}}
                    {{Form::text('description1', $slider->description1, ['class' => 'form-control', 'id' => 'exempleInputEmail1', 'placeholder' =>'Entrer description one'])}}
                  </div>
                  <div class="form-group">
                    {{--<label for="exampleInputEmail1">Slider description 2</label>
                    <input type="text" name="description2" class="form-control" id="exampleInputEmail1" placeholder="Enter slider description">--}}
                    {{Form::label('', 'Description two', ['for' => 'exempleInputEmail1'])}}
                    {{Form::text('description2', $slider->description2, ['class' => 'form-control', 'id' => 'exempleInputEmail1', 'placeholder' =>'Entrer description two'])}}
                  </div>
                  <label for="exampleInputFile">Slider image</label>
                  <div class="input-group">
                    <div class="custom-file">
                     {{-- <input type="file" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>--}}
                    {{Form::file('slider_image',['class' => 'custom-file-input', 'id' => 'exempleInputeFile'])}}
                    {{Form::label('', 'Choose file', ['class' => 'custom-file-label','for' => 'exempleInputFile'])}}
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-warning">Submit</button> -->
                  {{--<input type="submit" class="btn btn-warning" value="Save" >--}}
                  {{Form::submit('Update', ['class' => 'btn btn-success'])}}
                </div>
               {!!Form::close()!!}
              {{-- </form>--}}
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('scripts')
      <!-- jquery-validation -->
<script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../plugins/jquery-validation/additional-methods.min.js"></script>

<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
@endsection
