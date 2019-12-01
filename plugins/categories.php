<?php
$categorias = [
    'cat01' => 'Electronica',
    'cat02' => 'Mubles',
    'cat03' => 'Electrodomesticos',
    'cat04' => 'Oficina',
    'cat05' => 'Pesca y Tiempo libre'
];

?>

<section>
    <div class="container marketing">
        <div class="row">
            <div class="card" style="width: 100%;">
                <div class="card-header bg-azul-oscuro copy" align="center">
                    Categorías
                </div>
                <ul class="list-group list-group-flush col-md-10 offset-md-1" >
                    <?php foreach ($categorias as $item) : ?>
                        <a href="#">
                            <li class="list-group-item"><?= $item; ?></li>
                        </a>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

</section>