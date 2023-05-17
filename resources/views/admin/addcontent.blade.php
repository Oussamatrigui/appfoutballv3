 @extends('admin_layout.admin')
 @section('titre')
     add content
 @endsection


 @section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Content</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item active">Product</li>
                         </ol>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>

         <!-- Main content -->
         <section class="content">
             <div class="container-fluid">
                 <div class="row">
                     <!-- left column -->
                     <div class="col-md-12">
                         <!-- jquery validation -->
                         <div class="card card-success">
                             <div class="card-header">
                                 <h3 class="card-title">Add product</h3>
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
                             {!! Form::open([
                                 'action' => 'App\Http\Controllers\ContentController@savecontent',
                                 'method' => 'POST',
                                 'enctype' => 'multipart/form-data',
                             ]) !!}
                             {{ csrf_field() }}
                             {{-- <form id="quickForm"> --}}
                             <div class="card-body">
                                 <div class="form-group">
                                     {{-- <label for="exampleInputEmail1">titre article</label>
                                        <input type="text" name="titre_article" class="form-control"
                                            id="exampleInputEmail1" placeholder="titre d'article" min="1"> --}}
                                     {{ Form::label('', 'titre article', ['for' => 'exempleInputEmail1']) }}
                                     {{ Form::text('titre_article', '', ['class' => 'form-control', 'id' => 'exempleInputEmail1', 'placeholder' => 'Entrer titre']) }}
                                 </div>
                                 <div class="form-group">
                                     {{--<label for="exampleInputEmail1">article</label>
                                     <textarea name="article" class="form-control" id="exampleInputEmail1" placeholder="Enter product name" rows="10"
                                         cols="33">
                                         </textarea>--}}
                                     {{ Form::label('', 'article', ['for' => 'exempleInputEmail1']) }}
                                     {{ Form::textarea('article', '', ['class' => 'form-control', 'id' => 'exempleInputEmail1', 'placeholder' => 'Entrer ']) }}
                                 </div>
                                 <div class="form-group">
                                     {{-- <label for="exampleInputEmail1">non de l'auteur</label>
                                     <input type="text" name="nom_auteur" class="form-control" id="exampleInputEmail1"
                                         placeholder="non de l'auteur" min="1"> --}}
                                     {{ Form::label('', 'nom auteur', ['for' => 'exempleInputEmail1']) }}
                                     {{ Form::text('nom_auteur', '', ['class' => 'form-control', 'id' => 'exempleInputEmail1', 'placeholder' => 'Entrer nom']) }}
                                 </div>
                                {{-- <div class="form-group">
                                         <label>Product category</label>
                                         <select class="form-control select2" style="width: 100%;">
                                             <option selected="selected">Fruit</option>
                                             <option>Juice</option>
                                             <option>Vegetable</option>
                                         </select>
                                     </div>--}}
                                     <label for="exampleInputFile">content image</label>
                                     <div class="input-group">
                                         <div class="custom-file">
                                             {{--<input type="file" class="custom-file-input" id="exampleInputFile">
                                             <label class="custom-file-label" for="exampleInputFile">Choose file</label>--}}
                                             {{Form::file('content_image',['class' => 'custom-file-input', 'id' => 'exempleInputeFile'])}}
                                             {{Form::label('', 'Choose file', ['class' => 'custom-file-label','for' => 'exempleInputFile'])}}
                                         </div>
                                         <div class="input-group-append">
                                             <span class="input-group-text">Upload</span>
                                         </div>
                                     </div> 
                             </div>
                             <!-- /.card-body -->
                             <div class="card-footer">
                                 <!-- <button type="submit" class="btn btn-success">Submit</button> -->
                                 {{--<input type="submit" class="btn btn-success" value="ajouter">--}}
                                 {{Form::submit('Ajouter', ['class' => 'btn btn-success'])}}
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
     <!-- /.content-wrapper -->
 @endsection
