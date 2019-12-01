<section class="text-center container mt-3">
    <h3 style="text-align: left;">Carrito (6)</h3>
    <div class="row items">
        <?php $j = 0; ?>
        <?php for ($i = 1; $i <= 6; $i++) : ?>
            <?php $j++; ?>
            <div class="col-12 producto" style="display: flex; flex-wrap: wrap; padding: 10px 0px;">
                <img class="card-img-top col-md-7" src="admin/images/product/product-<?= $j; ?>.jpg" alt="Producto<?= $j; ?>">
                <div class="card-body col-md-5" style="">
                    <!-- <div  class=" col-12"> -->
                        <h3 class=" col-12">$ <?= random_int(100, 2000); ?></h3>
                        <p class="card-text col-12">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    <!-- </div> -->

                    <div class=" col-12" style="display: flex; justify-content: flex-end;">
                        <input class="input-group-text precio col-2" style="text-align: center; border-radius: 50px;" type="number" name="" min="1" value="1">
                        <input class="input-group-text precio col-6" type="number" name="quantity" min="1" max="5" value='<?= random_int(100, 2000);?>'>
                        <button type="button" class="btn btn-outline-dark sumacarrito col-2">+</button>
                        <button type="button" class="btn btn-outline-dark restacarrito col-2">-</button>
                    </div>
                </div>

            </div>
            <?php if ($j == 3) {
                    $j = 0;
                } ?>
        <?php endfor; ?>

    </div>
    <div class="row items" style="margin-top: 10px">
        <div class="card col-12" id="comprar" style="display:flex; justify-content: space-around; flex-wrap: wrap; align-items: center;">
            <h5 style="padding-top: 15px;" class="col-8">Productos:(6) Total:$3000</h5>
            <button type="submit" class="btn btn-primary col-4">Continuar compra</button>
        </div>
    </div>
</section>