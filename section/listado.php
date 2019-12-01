<section>
    <div class="container marketing">
        <!-- START THE FEATURETTES -->        
        <div class="card row">
            <h4 class="card-header">Encuentra lo que estás buscando</h4>
        </div>

        <div class="row">
            <?php $j = 0; ?>
            <?php for ($i = 1; $i <= 9; $i++) : ?>
                <?php $j++; ?>
                <div class="card producto col-md-4">
                    <a href="index.php?sec=producto#TOP" style="text-decoration: none; color: rgb(46, 46, 46);">
                        <img src="admin/images/product/product-<?= $j; ?>.jpg" class="card-img-top" alt="Producto1">

                        <div class="card-body">
                            <h3>$ <?= random_int(100, 2000); ?></h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of
                                the card's content.</p>
                        </div>
                    </a>
                </div>
                <?php if ($j == 3) {
                        $j = 0;
                    } ?>
            <?php endfor; ?>
        </div>
    </div>
    <?php include_once('plugins/categories.php'); ?>
</section>