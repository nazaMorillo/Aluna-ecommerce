<!DOCTYPE html>
<html lang="es">
<head>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{{ asset('storage/pics/isotipo-Allmarket.png') }}}">    
    <title>Allmarket</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/fontawesome.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/style-Social.css">
    {{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  --}}
    {{--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
       </head>
    <title>
        @yield("title")
    </title>
</head>
<body>

    <div id="app" class="d-flex flex-column h-screen w-screen justify-content-between">

        <header>
            @include("includes.navbar")
        </header>
        
        <main class="py-4 mt-4">
            <section>
                @yield('content')
            </section>        
        </main>

        <footer>
            @include("includes.footer") 
        </footer>

    </div>
    
   


    <!-- <script src="/js/jquery-production-3_4_1.js"></script> -->
    <!-- <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/bootstrap.min.js"></script> -->
    <!-- <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.10.21/r-2.2.5/datatables.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/kit-fontawesome.js"></script>
    <script src="/js/main.js"></script>
    
    @yield("scripts")
    
</body>
</html>