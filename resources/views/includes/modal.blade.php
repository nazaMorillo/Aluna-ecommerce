<div class="overlay" id="overlay">
    <div class="popup" id="popup">
        <a href="#bottom" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
        <i class="fas fa-credit-card fa-2x"></i>
        <h3>PAGO CON TARJETA</h3>
        <h4>Completa los datos a continuación</h4>
        <form action="#" class="form-group">
            <div class="contenedor-inputs">
                <!-- <input id="numCard" name="nro-tarjeta" type="text" class="form-control" placeholder="Ingrese número de tarjeta de crédito" minlength="16" maxlength="16" required> -->
                <label for="valid">Válida hasta</label>
                <input id="valid" name="valida-hasta" type="month" class="form-control" required>
                <input id="codeCard" name="codigo" type="text" class="form-control" placeholder="Ingrese código de tarjeta de crédito" minlength="3" maxlength="3" required>
            </div>
            <input type="submit" id="btn-confirmar" class="btn-submit btn btn-success" value="CONFIRMAR">
        </form>
    </div>
</div>