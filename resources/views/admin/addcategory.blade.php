@extends('admin_layout.layout')
@section('title')
    Add Category
@endsection

@section('con')

@include('include.admin.admincontentheader')

            

        <!-- Main content -->
       
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add category</small></h3>
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
                            {{-- <form> --}}
                            {!! Form::open(['action' => 'App\Http\Controllers\CategoryController@savecategory', 'method' => 'POST']) !!}
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    {{-- <label for="exampleInputEmail1">Category name</label>
                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Enter category"> --}}
                                    {{ Form::label('', 'Category name', ['for' => 'exempleInputEmail1']) }}
                                    {{ Form::text('category_name', '', ['class' => 'form-control', 'id' => 'exempleInputEmail1', 'placeholder' => 'Entrer category']) }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                {{-- <input type="submit" class="btn btn-primary" value="Save" > --}}
                                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                            </div>
                            {!! Form::close() !!}
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
        </section>
        <!-- /.content -->
    </div>

@endsection



@section('scripts')
    <!-- jquery-validation -->
    <script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../../plugins/jquery-validation/additional-methods.min.js"></script>

    <script>
        $(function() {
            $.validator.setDefaults({
                submitHandler: function() {
                    alert("Form successful submitted!");
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
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
