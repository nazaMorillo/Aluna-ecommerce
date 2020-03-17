<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/fontawesome.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>
        <?php echo $__env->yieldContent("title"); ?>
    </title>
</head>
<body>
    <header>
        <?php echo $__env->make("includes.navbar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>
    
    <main class="py-4 mt-4">
        <section>
            <?php echo $__env->yieldContent('content'); ?>
        </section>        
    </main>

    <?php echo $__env->make("includes.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 

    <script src="/js/jquery-production-3_4_1.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="/js/kit-fontawesome.js"></script>
</body>
</html><?php /**PATH /home/lucio/Desktop/AllMark/Aluna-ecommerce/resources/views/layouts/master.blade.php ENDPATH**/ ?>