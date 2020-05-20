@extends("layouts.master")

@section("content")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<div class="container">


    <div style="display: flex; justify-content: space-around;">
        <h1>Gestión de productos</h1>
        <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Crear Producto</button>
    </div>
    <table class="table table-striped table-bordered"  style="width:100%" id="user_table">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Marca</th>
                <th>Categoria</th>
                <!-- <th width="flex">Acción</th> -->
            </tr>
        </thead>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
       
       $(document).ready(function() {
           $('#user_table').DataTable({
               "serverSide": true,
               "ajax" : "{{ url('api/products') }}",
               "columns": [
                   {data: 'image',
                       name: 'image',
                       render: function(data, type, full, meta) {
                           return "<img src={{ URL::to('/storage') }}/product/" + data + " width='70' class='img-thumbnail' />";
                       }
                   },                    
                   {data: 'name'},
                   {data: 'description'},
                   {data: 'stock'},
                   {data: 'brand'},
                   {data: 'category'},
                   {data: 'category'}
               ]
           });
       });

   </script>
   @endsection