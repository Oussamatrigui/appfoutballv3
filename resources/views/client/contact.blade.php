@extends('client.client_layout.index')
@section('title')
    FIF | | | Contact
@endsection

@section('con')
    <!-- start content -->
    <div class="hero-wrap hero-bread" style="background-image: url('images/telephone.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span>
                        <span>Contact</span>
                    </p>
                    <h1 class="mb-0 bread">Contact</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 ftco-animate">
                    @if (Session::has('status'))
                        <div class="alert alert-succes">
                            {{ Session::get('status') }}
                    @endif
                    <form action="{{ url('/contact') }}" method="POST" class="billing-form" novalidate>
                        {{ csrf_field() }}

                        <div class="row align-items-end">
                            <h3 class="mb-4 billing-heading">Contactez-nous</h3>
                            <div class="row align-items-end">
                                <div class="col-md-12 {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <div class="form-group">
                                        <label for="name" class=>name</label>
                                        <input type="text" class="form-control" id="card-name" name="name">
                                        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">email</label>
                                        <input type="text" class="form-control" id="card-name" name="email">
                                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="msg">message</label>
                                        <textarea class="form-control" id="card-number" rows="10" cols="50" name="msg">
                                    </textarea>
                                        {!! $errors->first('msg', '<span class="help-block">:message</span>') !!}

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Envoyer">
                                    </div>
                                </div>
                            </div>
                    </form><!-- END -->
                </div>
            </div>
        </div>
    </section> <!-- .section -->
@endsection





@section('script')
    <script>
        $(document).ready(function() {

            var quantitiy = 0;
            $('.quantity-right-plus').click(function(e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>
@endsection

</body>

</html>
