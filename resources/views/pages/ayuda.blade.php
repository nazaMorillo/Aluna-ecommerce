@extends("layouts.master")

@section('content')
<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2 id="contact" class="mt-2">{{ __(trans('idioma.helpt')) }}</h2></div>
                
                <!-- <h2 id="contact">INICIO SESIÓN</h2> -->
            </div>
        </div>
        <div class="col-md-10">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header bg-dark" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-outline-dark text-white" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                {{trans('idioma.helpb1')}}
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <h3>{{trans('idioma.helph0')}}</h3>
                            {{trans('idioma.helpdiv1')}}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-dark" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-outline-dark text-white collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            {{trans('idioma.helpb2')}}
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <h3>{{trans('idioma.helph1')}}</h3>
                            {{trans('idioma.helpdiv2')}}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-dark" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-outline-dark text-white collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            {{trans('idioma.helpb3')}}
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <h3>{{trans('idioma.helph2')}}</h3>
                            {{trans('idioma.helpdiv3')}}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-dark" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-outline-dark text-white" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            {{trans('idioma.helpb4')}}
                            </button>
                        </h2>
                    </div>

                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                        <div class="card-body">
                            <h3>{{trans('idioma.helph3')}}</h3>
                            {{trans('idioma.helpdiv4')}}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-dark" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-outline-dark text-white" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            {{trans('idioma.helpb5')}}
                            </button>
                        </h2>
                    </div>

                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                        <div class="card-body">
                            <h3>{{trans('idioma.helph4')}}</h3>
                            {{trans('idioma.helpdiv5')}}
                        </div>
                    </div>
                </div>
            </div>
<<<<<<< HEAD
            <h4>{{trans('idioma.helpQuestion')}}</h4>
=======
            <!-- <h4>Te sivió la información?</h4>
>>>>>>> allmarket_naza
            <form>
                <fieldset class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                <label class="form-check-label" for="gridRadios1">
                                {{trans('idioma.yes')}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                <label class="form-check-label" for="gridRadios2">
                                {{trans('idioma.no')}}
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary bg-dark">{{trans('idioma.helpSend')}}</button>
                    </div>
                </div>
            </form> -->

        </div>
    </div>
</div>
@endsection

@section("agregarCarritoGuess")
@auth
<?php session_start(); ?>
    @if(isset($_SESSION['Producto']))
    <script>console.log("versiesta..");
function agregarCarritoGuess(productid){
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'/agregarProducto',
                type:'POST',
                data:{productid},
                success: function(response){  
                    console.log("productoAgregado");
            },error: function (e) {
                console.log(e);
            }
        });
    };
function verSiEstaCart(productid){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        url:'/agregarSiNoCart',
        type:'POST',
        data:{productid},
        success: function(response){  
            console.log(response);
            if(response == 'true'){
                agregarCarritoGuess(productid);
                    $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/cantCarrito",
                        type: "GET",
                        success: function (response) {												
                            console.log(parseInt(response));
                            document.getElementById('cantCarrito').setAttribute('value',parseInt(response));
                            document.getElementById('cantCarrito').innerHTML = parseInt(response);
                            },
                        error: function (e) {
                            console.log(e);
                        }
                    });
            }else{
                console.log("Ya está en el carrito");
                $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/cantCarrito",
                        type: "GET",
                        success: function (response) {												
                            console.log(parseInt(response));
                            document.getElementById('cantCarrito').setAttribute('value',parseInt(response));
                            document.getElementById('cantCarrito').innerHTML = parseInt(response);
                            },
                        error: function (e) {
                            console.log(e);
                        }
                    });
            }
        },
        error: function (e) {
            console.log(e);
        }
    });
};
    verSiEstaCart(<?php echo $_SESSION['Producto'] ?>);
        </script>
    @else
    <script>
    $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/cantCarrito",
                        type: "GET",
                        success: function (response) {												
                            console.log(parseInt(response));
                            document.getElementById('cantCarrito').setAttribute('value',parseInt(response));
                            document.getElementById('cantCarrito').innerHTML = parseInt(response);
                            },
                        error: function (e) {
                            console.log(e);
                        }
                    });
    </script>
    @endif
    <?php session_destroy(); ?>
    
@endauth
@endsection