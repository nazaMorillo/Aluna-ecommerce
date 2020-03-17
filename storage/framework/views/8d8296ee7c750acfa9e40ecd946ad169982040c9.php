<?php $__env->startSection("content"); ?>
    <div class="container marketing">
        <!-- START THE FEATURETTES -->        
        <div class="card row">
            <h4 class="card-header">Encuentra lo que estás buscando</h4>
        </div>

        <div class="row">
        <?php $j=0; ?>
        <?php for($i= 1; $i<=8; $i++): ?>
        <?php $j++; ?>               
            <div class="card producto col-6 col-4-sm col-md-4 col-lg-3">
                <a href="#TOP" style="text-decoration: none; color: rgb(46, 46, 46);">
                    <img src="/storage/product/product-<?php echo e($j); ?>.jpg" class="card-img-top" alt="Producto1">

                    <div class="card-body">
                        <h3>$ <?php echo e($j); ?>00<?php echo e($i); ?></h3>
                        <p class="card-text"> Producto<?php echo e($i); ?> </p>                       
                        <a class='btn btn-primary col-12 col-md-12 text-white mt-2 comprar' role="button" onclick="comprar()">Comprar</a>
                        <a class='btn btn-success col-12 col-md-12 text-white mt-2 carrito' role="button" onclick="comprar()">Agregar al carrito</a>
                    </div>
                </a>
            </div>
            <?php if($j== 3): ?>
            <?php $j=0; ?>
            <?php endif; ?>
        <?php endfor; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lucio/Desktop/AllMark/Aluna-ecommerce/resources/views/pages/listado.blade.php ENDPATH**/ ?>