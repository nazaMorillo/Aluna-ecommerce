@extends("layouts.master")

@section("content")

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2 id="contact" class="mt-2">{{ __(trans('idioma.contactTitle')) }}</h2>
                </div>

                <!-- <h2 id="contact">INICIO SESIÓN</h2> -->
                <div align="center" class="star-navy">
                    <i class="fa fa-star"></i>
                </div>

                <div class="card-body">
                    <div class="col-md-8 mx-auto">
                        <form class="text-left mb-3" id="contacto" action="{{ route('contacto') }}" 
                        method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName">{{trans('idioma.contactName')}}</label>
                                <input type="text" name="name" class="form-control" id="exampleInputName" value="{{ old('name') }}">
                                {!! $errors->first('name', '<small>:message</small><br>') !!}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTelephone">{{trans('idioma.contactPhone')}}</label>
                                <input type="number" name="phone" class="form-control" id="exampleInputTelephone" value="{{ old('phone') }}">
                                {!! $errors->first('phone', '<small>:message</small><br>') !!}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAddress">{{trans('idioma.contactAddress')}}</label>
                                <input type="text" name="address" class="form-control" id="exampleInputAddress" value="{{ old('address') }}">
                                {!! $errors->first('address', '<small>:message</small><br>') !!}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputSubject">{{trans('idioma.contactSubject')}}</label>
                                <input type="text" name="subject" class="form-control" id="exampleInputSubject" value="{{ old('subject') }}">
                                {!! $errors->first('subject', '<small>:message</small><br>') !!}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{trans('idioma.contactEmail')}}</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{ old('email') }}">
                                {!! $errors->first('email', '<small>:message</small><br>') !!}
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{trans('idioma.contactMessage')}}</label>
                                <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3" style="resize: none;">{{ old('message') }}</textarea>
                                {!! $errors->first('message', '<small>:message</small><br>') !!}
                            </div>
                            <div class="form-group">
                                <div class="alert alert-info alert-dismissible show" style="visibility: hidden;" role="alert">
                                    <strong>{{trans('idioma.contactThanks')}}!</strong><hr> {{trans('idioma.contactTanksText')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-8 form-group" style="margin-left: auto; display: flex; justify-content:space-between">
                                <button type="reset" class="col-5 col-md-5 col-lg-4 btn btn-outline-primary">{{trans('idioma.contactDelete')}}</button>
                                <button type="submit" class="col-5 col-md-5 btn col-lg-4 btn-primary">{{trans('idioma.contactSend')}}</button>
                            </div>


                        </form>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d107134.56934196998!2d-60.76667965536046!3d-32.95218976027299!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b6539335d7d75b%3A0xec4086e90258a557!2sRosario%2C%20Santa%20Fe!5e0!3m2!1ses-419!2sar!4v1574038843464!5m2!1ses-419!2sar" width="100%" height="300px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
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

@section("scripts")
<script>
     $('.alert').hide();
    function ValidateEmail(mail) {
        var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (mail.value.match(mailFormat)) {
            return (true);
        }
        return (false);
    }
    $(document).ready(function() {
        console.log(document.forms);
        elementos = document.getElementById("contacto").elements;
        console.log(elementos);
        console.log("Hola");
        var errores = 0;
        for (var i = 0; i < elementos.length - 1; i++) {
            elementos[i].addEventListener("blur", function() {
                if (this.id == "exampleInputName") {
                    if (this.value.length < 4) {
                        if (!this.parentNode.querySelector("span")) {
                            this.style.borderColor = "red";
                            let spanError = document.createElement("span");
                            spanError.setAttribute("class", "text-danger");
                            if(document.querySelector('html').lang == 'en'){
                                spanError.append(document.createTextNode("4 at least"));
                            }else{
                                spanError.append(document.createTextNode("Al menos 4"));
                            }                            
                            this.parentNode.append(spanError);
                            errores += 1;
                        }
                        console.log(errores);
                    } else {
                        if (this.parentNode.querySelector("span")) {
                            this.style.borderColor = "";
                            this.parentNode.removeChild(this.parentNode.querySelector("span"));
                            errores -= 1;
                        }
                        console.log(errores);
                    }
                } else if (this.id == "exampleInputAddress") {
                    if (this.value.length < 6) {
                        if (!this.parentNode.querySelector("span")) {
                            this.style.borderColor = "red";
                            let spanError = document.createElement("span");
                            spanError.setAttribute("class", "text-danger");
                            if(document.querySelector('html').lang == 'en'){
                                spanError.append(document.createTextNode("6 at least"));
                            }else{
                                spanError.append(document.createTextNode("Al menos 6"));
                            }                              
                            this.parentNode.append(spanError);
                            errores += 1;
                        }
                        console.log(errores);
                    } else {
                        if (this.parentNode.querySelector("span")) {
                            this.style.borderColor = "";
                            this.parentNode.removeChild(this.parentNode.querySelector("span"));
                            errores -= 1;
                        }
                        console.log(errores);
                    }
                } else if (this.id == "exampleInputTelephone") {
                    if (this.value.length < 7) {
                        if (!this.parentNode.querySelector("span")) {
                            this.style.borderColor = "red";
                            let spanError = document.createElement("span");
                            spanError.setAttribute("class", "text-danger");
                            if(document.querySelector('html').lang == 'en'){
                                spanError.append(document.createTextNode("Invalid phone"));
                            }else{
                                spanError.append(document.createTextNode("Teléfono no válido"));
                            }
                            this.parentNode.append(spanError);
                            errores += 1;
                        }
                        console.log(errores);
                    } else {
                        if (this.parentNode.querySelector("span")) {
                            this.style.borderColor = "";
                            this.parentNode.removeChild(this.parentNode.querySelector("span"));
                            errores -= 1;
                        }
                        console.log(errores);
                    }
                } else if (this.id == "exampleFormControlTextarea1") {
                    if (this.value.length < 20) {
                        if (!this.parentNode.querySelector("span")) {
                            this.style.borderColor = "red";
                            let spanError = document.createElement("span");
                            spanError.setAttribute("class", "text-danger");
                            if(document.querySelector('html').lang == 'en'){
                                spanError.append(document.createTextNode("20 at least"));
                            }else{
                                spanError.append(document.createTextNode("Al menos 20"));
                            }
                            this.parentNode.append(spanError);
                            errores += 1;
                        }
                        console.log(errores);
                    } else {
                        if (this.parentNode.querySelector("span")) {
                            this.style.borderColor = "";
                            this.parentNode.removeChild(this.parentNode.querySelector("span"));
                            errores -= 1;
                        }
                        console.log(errores);
                    }
                } else if (this.id == "exampleInputEmail1") {
                    if (!ValidateEmail(this)) {
                        if (!this.parentNode.querySelector("span")) {
                            this.style.borderColor = "red";
                            let spanError = document.createElement("span");
                            spanError.setAttribute("class", "text-danger");
                            if(document.querySelector('html').lang == 'en'){
                                spanError.append(document.createTextNode("Invalid Email"));
                            }else{
                                spanError.append(document.createTextNode("Email no válido"));
                            }
                            this.parentNode.append(spanError);
                            errores += 1;
                        }
                        console.log(errores);
                    } else {
                        if (this.parentNode.querySelector("span")) {
                            this.style.borderColor = "";
                            this.parentNode.removeChild(this.parentNode.querySelector("span"));
                            errores -= 1;
                        }
                        console.log(errores);
                    }
                }
            });
        }
        var banderaNoVacio;
        elementos[elementos.length - 1].addEventListener("click", function(e) {
            for (var i = 0; i < 5; i++) {
                console.log(elementos[i].value.length);
                if(elementos[i].value.length == 0){
                    banderaNoVacio = false;
                    break;
                };
                banderaNoVacio = true;
            }
            console.log(banderaNoVacio);
            if (errores > 0) {
                e.preventDefault();
                console.log("Hay errores en tus datos");
            }else if(!banderaNoVacio){
                e.preventDefault();
                console.log("Tienes campos requeridos vacios");
            }else {
                e.preventDefault();
                console.log("Información correcta");
                document.querySelector('.alert').style.visibility= "visible";
                $('.alert').show();
                let contacto = document.getElementById('contacto');
                contacto.reset();
            }
        })

       function beforeSend(e) {
           e.preventDefault();
           alert("prevengo que se envíe");
           this.reset();
       };

       let contacto = document.getElementById('contacto');
       document.querySelector('form').addEventListener('submit', beforeSend, true);

   })
</script>
@endsection