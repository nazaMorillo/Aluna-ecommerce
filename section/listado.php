<?php include_once("admin/data/PDOconnect.php"); 
$query = $pdo->prepare("SELECT * FROM productos");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<section>
    <div class="container marketing">
        <!-- START THE FEATURETTES -->        
        <div class="card row">
            <h4 class="card-header">Encuentra lo que estás buscando</h4>
        </div>

        <div class="row">

 



<?php   foreach($result as $producto){ ?>


        <div class="card producto col-md-4">
                    <a href="index.php?sec=producto#TOP" style="text-decoration: none; color: rgb(46, 46, 46);">
                        <img src="<?= $producto['image']; ?>" class="card-img-top" alt="Producto1">

                        <div class="card-body">
                            <h3>$ <?= $producto['price']; ?></h3>
                            <p class="card-text"> <?= $producto['name']; ?> </p>
                        </div>
                    </a>
                </div>

<?php } ?>





        </div>
    </div>
    <?php include_once('plugins/categories.php'); ?>
</section>