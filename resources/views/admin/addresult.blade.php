@extends('admin_layout.layout')
@section('title')
    Add result
@endsection
@section('con')
    @include('include.admin.admincontentheader')

    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Add result</h3>
                    </div>
                    @if (count($errors) > 0)
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
                                    {{ Session::get('status') }}
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- /.card-header -->
                    <!-- form start -->
                    <!-- /.card-header -->
                    <!-- form start -->
                    {!! Form::open([
                        'action' => 'App\Http\Controllers\ResultController@saveresult',
                        'method' => 'POST',
                        'enctype' => 'multipart/form-data',
                    ]) !!}
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('', 'equipe 1', ['for' => 'example']) }}

                            {{ Form::text('equipe1', '', ['class' => 'form-control', 'id' => 'example', 'placeholder' => 'Enter nom equipe 1']) }}
                            {{-- <label for="exampleInputEmail1"> equipe 1</label>
                                <input type="text" name="equipe1" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter nom equipe 1"> --}}
                        </div>
                        <label for="exampleInputFile">logo equipe 1</label>
                        <div class="input-group">
                            <div class="custom-file">
                                {{ Form::file('equipe1_logo', ['class' => 'custom-file-input', 'id' => 'exempleInputeFile']) }}
                                {{ Form::label('', 'Choose file', ['class' => 'custom-file-label', 'for' => 'exempleInputFile']) }}
                                {{-- <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label> --}}
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('', 'equipe 2', ['for' => 'example']) }}

                            {{ Form::text('equipe2', '', ['class' => 'form-control', 'id' => 'example', 'placeholder' => 'Enter nom equipe 2']) }}
                            {{--  <label for="exampleInputEmail1">equipe 2</label>
                                <input type="text" name="equipe2" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter nom equipe 2"> --}}
                        </div>
                        <label for="exampleInputFile">logo equipe 2</label>
                        <div class="input-group">
                            <div class="custom-file">
                                {{ Form::file('equipe2_logo', ['class' => 'custom-file-input', 'id' => 'exempleInputeFile']) }}
                                {{ Form::label('', 'Choose file', ['class' => 'custom-file-label', 'for' => 'exempleInputFile']) }}
                                {{-- <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label> --}}
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('', 'Result', ['for' => 'example']) }}

                            {{ Form::text('Result', '', ['class' => 'form-control', 'id' => 'example', 'placeholder' => 'Enter nom equipe 2']) }}
                            {{-- <label for="exampleInputEmail1">Result</label>
                              <input type="text" name="description2" class="form-control" id="exampleInputEmail1"
                                  placeholder="Enter la résultat du match"> --}}

                        </div>
                        <div class="form-group">
                            {{ Form::label('', 'datedematch', ['for' => 'example']) }}

                            {{ Form::date('datematch', '', ['class' => 'form-control', 'id' => 'example', 'placeholder' => ' Entrer date match']) }}
                            {{-- <label for="exampleInputEmail1">date du match</label>
                                <input type="date" name="datematch" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter date match"> --}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('', 'heure', ['for' => 'example']) }}

                            {{ Form::text('heure', '', ['class' => 'form-control', 'id' => 'example', 'placeholder' => ' Entrer heure de match']) }}
                            {{-- <label for="exampleInputEmail1">heure</label>
                              <input type="text" name="heure" class="form-control" id="exampleInputEmail1"
                                  placeholder="Enter l'heure du match"> --}}
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <!-- <button type="submit" class="btn btn-warning">Submit</button> -->
                        {{ Form::submit('Save', ['class' => 'btn btn-success']) }}

                    </div>
                    {!! Form::close() !!}

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
