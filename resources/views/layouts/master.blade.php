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
        @yield("title")
    </title>
</head>
<body>
    <header>
        @include("includes.navbar")
    </header>
    
    <section>
        @yield("content")
    </section>

    @include("includes.footer") 

    <script src="/js/jquery-production-3_4_1.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="/js/kit-fontawesome.js"></script>
</body>
</html>