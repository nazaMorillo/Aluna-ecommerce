@extends("layouts.master")

@section("content")
<section class="text-center container mt-3">
    <h2 id="contact">CONTACTANOS</h2>
    <div class="star-navy">
        <i class="fa fa-star"></i>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <form class="text-left mb-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Telefono:</label>
                    <input type="telephone" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Dirección:</label>
                    <input type="telephone" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Correo electronico:</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Consulta:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="resize: none;"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d107134.56934196998!2d-60.76667965536046!3d-32.95218976027299!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b6539335d7d75b%3A0xec4086e90258a557!2sRosario%2C%20Santa%20Fe!5e0!3m2!1ses-419!2sar!4v1574038843464!5m2!1ses-419!2sar" width="100%" height="300px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </div>
</section>
@endsection

