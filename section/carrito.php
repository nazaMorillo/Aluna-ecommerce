<?php

include_once("admin/data/PDOconnect.php");
$queryid = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
$queryid->bindValue(":email",$_SESSION['completarCorrectos']['email']);
$queryid->execute();
$user = $queryid->fetchAll(PDO::FETCH_ASSOC);

$id = $user[0]['id'];

$query = $pdo->prepare("SELECT productos.name, productos.price, productos.image FROM usuarios JOIN carrito on usuarios.id = carrito.id_usuario JOIN productos on carrito.id_producto = productos.id WHERE carrito.id_usuario = $id");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

//exit;
$sumaprod = 0;
?>

<section class="text-center container mt-3">
    <h3 style="text-align: left;">Carrito (<?= count($result) ?>)</h3>
    <div class="row items">
        <?php foreach($result as $key => $producto){  ?>
            <div class="col-12 producto" style="display: flex; flex-wrap: wrap; padding: 10px 0px;">
                <img class="card-img-top col-md-7" src="<?= $producto['image'] ?>" alt="">
                <div class="card-body col-md-5" style="">
                    <!-- <div  class=" col-12"> -->
                        <h3 class=" col-12">$ <?= $producto['price'] ?></h3>
                        <p class="card-text col-12"><?= $producto['name'] ?></p>
                    <!-- </div> -->

                    <div class=" col-12" style="display: flex; justify-content: flex-end;">
                        <input class="input-group-text precio col-2" style="text-align: center; border-radius: 50px;" type="number" name="" min="1" value="1">
                        <input class="input-group-text precio col-6" type="number" name="quantity" min="1" max="5" value='<?= $producto['price'] ?>'>
                        <button type="button" class="btn btn-outline-dark sumacarrito col-2">+</button>
                        <button type="button" class="btn btn-outline-dark restacarrito col-2">-</button>
                    </div>
                </div>

            </div>

        <?php $sumaprod += $producto['price'];} ?>

    </div>
    <div class="row items" style="margin-top: 10px">
        <div class="card col-12" id="comprar" style="display:flex; justify-content: space-around; flex-wrap: wrap; align-items: center;">
            <h5 style="padding-top: 15px;" class="col-8">Productos:(<?= count($result) ?>) Total: $<?= $sumaprod ?></h5>
            <button type="submit" class="btn btn-primary col-4">Continuar compra</button>
        </div>
    </div>
</section>