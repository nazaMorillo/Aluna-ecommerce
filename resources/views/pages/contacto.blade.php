@extends("layouts.master")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2 id="contact" class="mt-2">{{ __(trans('idioma.contactTitle')) }}</h2></div>
                
                <!-- <h2 id="contact">INICIO SESIÓN</h2> -->
                <div align="center" class="star-navy">
                    <i class="fa fa-star"></i>
                </div>

                <div class="card-body">
                    <div class="col-md-8 mx-auto">
                        <form class="text-left mb-3" id="contacto">
                            <div class="form-group">
                                <label for="exampleInputName">{{trans('idioma.contactName')}}</label>
                                <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTelephone">{{trans('idioma.contactPhone')}}</label>
                                <input type="number" class="form-control" id="exampleInputTelephone">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAddress">{{trans('idioma.contactAddress')}}</label>
                                <input type="telephone" class="form-control" id="exampleInputAddress">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{trans('idioma.contactEmail')}}</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{trans('idioma.contactMessage')}}</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="resize: none;"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">{{trans('idioma.contactSend')}}</button>
                        </form>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d107134.56934196998!2d-60.76667965536046!3d-32.95218976027299!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b6539335d7d75b%3A0xec4086e90258a557!2sRosario%2C%20Santa%20Fe!5e0!3m2!1ses-419!2sar!4v1574038843464!5m2!1ses-419!2sar" width="100%" height="300px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-10">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header bg-dark" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-outline-dark text-white" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                NOSOTROS
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <h3>Quienes somos?</h3>
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                            moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                            proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                            aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-dark" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-outline-dark text-white collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                PRODUCTOS
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <h3>Garantias de los Productos?</h3>
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                            moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                            proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                            aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-dark" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-outline-dark text-white collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                COMPRAS
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <h3>Como compro?</h3>
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                            moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                            proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                            aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-dark" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-outline-dark text-white" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                PAGOS
                            </button>
                        </h2>
                    </div>

                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                        <div class="card-body">
                            <h3>Metodos de pagos?</h3>
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                            moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                            proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                            aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-dark" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-outline-dark text-white" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                ENVIOS
                            </button>
                        </h2>
                    </div>

                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                        <div class="card-body">
                            <h3>Modos de envios?</h3>
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                            moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                            proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                            aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
            </div>
            <h4>Te sivió la información?</h4>
            <form>
                <fieldset class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    SI
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                <label class="form-check-label" for="gridRadios2">
                                    NO
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary bg-dark">ENVIAR</button>
                    </div>
                </div>
            </form>

        </div> -->
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
function ValidateEmail(mail){
    var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(mail.value.match(mailFormat)){
        return (true);
        }
    return (false);
    }
        $(document).ready(function(){
            console.log(document.forms);
            elementos = document.getElementById("contacto").elements;
            console.log(elementos);
            console.log("Hola");
            var errores = 0;
            for(var i = 0; i < elementos.length -1; i++){
                elementos[i].addEventListener("blur",function(){
                    if(this.id == "exampleInputName"){
                        if(this.value.length < 4){                        
                        if(!this.parentNode.querySelector("span")){
                            this.style.borderColor = "red";
                            let spanError = document.createElement("span");
                            spanError.setAttribute("class","text-danger");
                            spanError.append(document.createTextNode("Al menos 4"));
                            this.parentNode.append(spanError);
                            errores += 1;
                            }
                            console.log(errores);
                        }else{
                            if(this.parentNode.querySelector("span")){
                                this.style.borderColor = "";
                                this.parentNode.removeChild(this.parentNode.querySelector("span"));
                                errores -= 1;
                            }
                            console.log(errores);
                        }
                    }else if(this.id == "exampleInputAddress"){
                        if(this.value.length < 6){                        
                        if(!this.parentNode.querySelector("span")){
                            this.style.borderColor = "red";
                            let spanError = document.createElement("span");
                            spanError.setAttribute("class","text-danger");
                            spanError.append(document.createTextNode("Al menos 6"));
                            this.parentNode.append(spanError);
                            errores += 1;                                
                            }
                            console.log(errores);
                        }else{                            
                            if(this.parentNode.querySelector("span")){
                                this.style.borderColor = "";
                                this.parentNode.removeChild(this.parentNode.querySelector("span"));
                                errores -= 1;
                            }
                            console.log(errores);
                        }
                    }else if(this.id == "exampleInputTelephone"){
                        if(this.value.length < 7){                        
                        if(!this.parentNode.querySelector("span")){
                            this.style.borderColor = "red";
                            let spanError = document.createElement("span");
                            spanError.setAttribute("class","text-danger");
                            spanError.append(document.createTextNode("Teléfono no válido"));    
                            this.parentNode.append(spanError);
                            errores += 1; 
                            }
                            console.log(errores);                   
                        }else{                            
                            if(this.parentNode.querySelector("span")){
                                this.style.borderColor = "";
                                this.parentNode.removeChild(this.parentNode.querySelector("span"));
                                errores -= 1;
                            }
                            console.log(errores);
                        }
                    }else if(this.id == "exampleFormControlTextarea1"){
                        if(this.value.length < 20){                        
                        if(!this.parentNode.querySelector("span")){
                            this.style.borderColor = "red";
                            let spanError = document.createElement("span");
                            spanError.setAttribute("class","text-danger");
                            spanError.append(document.createTextNode("Al menos 20"));     
                            this.parentNode.append(spanError);
                            errores += 1; 
                            }
                            console.log(errores);        
                        }else{                            
                            if(this.parentNode.querySelector("span")){
                                this.style.borderColor = "";
                                this.parentNode.removeChild(this.parentNode.querySelector("span"));
                                errores -= 1;
                            }
                            console.log(errores);
                        }
                    }else if(this.id == "exampleInputEmail1"){
                        if(!ValidateEmail(this)){                        
                        if(!this.parentNode.querySelector("span")){
                            this.style.borderColor = "red";
                            let spanError = document.createElement("span");
                            spanError.setAttribute("class","text-danger");
                            spanError.append(document.createTextNode("Email no válido"));    
                            this.parentNode.append(spanError);
                            errores += 1;  
                            }
                            console.log(errores);                      
                        }else{                            
                            if(this.parentNode.querySelector("span")){
                                this.style.borderColor = "";
                                this.parentNode.removeChild(this.parentNode.querySelector("span"));
                                errores -= 1;
                            }
                            console.log(errores);
                        }
                    }
                });
            }
            elementos[elementos.length-1].addEventListener("click", function(e){
                if(errores > 0){
                    e.preventDefault();
                    console.log("Hay errores en tus datos");
                }else{
                    e.preventDefault();
                    console.log("Información correcta");
                }            
            })
        })
    </script>
@endsection