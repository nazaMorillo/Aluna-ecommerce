<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestion de Producto</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  {{-- <script src="js/jquery.min.js"></script> --}}
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  {{-- <link rel="stylesheet" href="/css/bootstrap.min.css" /> --}}
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  {{-- <script src="/js/jquery.dataTables.min.js"></script> --}}
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  {{-- <script src="/js/dataTables.bootstrap.min.js"></script>  --}}
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  {{-- <link rel="stylesheet" href="/css/dataTables.bootstrap.min.css" /> --}}
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  {{-- <script src="/js/bootstrap.min.js"></script>
 </head> --}}
 <body>
     @include('includes.navbarAdmin')
  <div class="container">    
     <br />
     <h3 align="center">Crear - Modificar - Eliminar y Mostrar Productos</h3>
     <br />
     <div align="right">
      <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Crear Producto</button>
     </div>
     <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped" id="user_table">
           <thead>
            <tr>
                <th width="10%">Imagen</th>
                <th width="10%">Nombre</th>
                <th width="10%">Descripción</th>
                <th width="10%">Precio</th>
                <th width="10%">Stock</th>
                <th width="10%">Marca</th>
                <th width="10%">Categoria</th>
                <th width="10%">Acción</th>
            </tr>
           </thead>
       </table>
   </div>
   <br />
   <br />
  </div>
 </body>
</html>

<div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h4 class="modal-title">Agregar Nuevo Producto</h4>
           </div>
           <div class="modal-body">
            <span id="form_result"></span>
            <form id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                  <label class="control-label col-md-4" >Nombre : </label>
                  <div class="col-md-8">
                   <input type="text" name="name" id="name" class="form-control" />
                  </div>
                 </div>
                 <div class="form-group">
                  <label class="control-label col-md-4">Descripción : </label>
                  <div class="col-md-8">
                   <input type="text" name="description" id="description" class="form-control" />
                  </div>
                 </div>
                 <div class="form-group">
                 <label class="control-label col-md-4" >Precio : </label>
                  <div class="col-md-8">
                   <input type="text" name="price" id="price" class="form-control" />
                  </div>
                 </div>
                 <div class="form-group">
                  <label class="control-label col-md-4">Stock : </label>
                  <div class="col-md-8">
                   <input type="text" name="stock" id="stock" class="form-control" />
                  </div>
                 </div>
                 <div class="form-group">
                 <label class="control-label col-md-4" >Marca : </label>
                  <div class="col-md-8">
                   <input type="text" name="brand" id="brand" class="brand" />
                  </div>
                 </div>
                 <div class="form-group">
                  <label class="control-label col-md-4">Categoria : </label>
                  <div class="col-md-8">
                   <input type="text" name="category" id="category" class="form-control" />
                  </div>
                 </div>
                 <div class="form-group">
                  <label class="control-label col-md-4">Seleccioná imagen : </label>
                  <div class="col-md-8">
                   <input type="file" name="image" id="image" />
                   <span id="store_image"></span>
                  </div>
                 </div>
              <br />
              <div class="form-group" align="center">
               <input type="hidden" name="action" id="action" />
               <input type="hidden" name="hidden_id" id="hidden_id" />
               <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Agregar" />
              </div>
            </form>
           </div>
        </div>
       </div>
   </div>
   
   <div id="confirmModal" class="modal fade" role="dialog">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h2 class="modal-title">Confirmacion</h2>
               </div>
               <div class="modal-body">
                   <h4 align="center" style="margin:0;">Esta seguro de eliminar el registro?</h4>
               </div>
               <div class="modal-footer">
                <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">Si</button>
                   <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
               </div>
           </div>
       </div>
   </div>


<script>

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    
    $(document).ready(function(){
    
    
    $('#user_table').DataTable({
    processing: true,
    serverSide: true,
    ajax:{
    url: "{{ route('ajax-crud.index') }}",
    },
    columns:[
    {
    data: 'image',
    name: 'image',
    render: function(data, type, full, meta){
     return "<img src={{ URL::to('/storage') }}/product/" + data + " width='70' class='img-thumbnail' />";
    },
    orderable: false
    },
    {
    data: 'name',
    name: 'name'
    },
    {
    data: 'description',
    name: 'description'
    },
    {
    data: 'price',
    name: 'price'
    },
    {
    data: 'stock',
    name: 'stock'
    },
    {
    data: 'brand',
    name: 'brand'
    },
    {
    data: 'category',
    name: 'category'
    },
    {
    data: 'action',
    name: 'action',
    orderable: false
    }
    ]
    });
    
    $('#create_record').click(function(){
    $('.modal-title').text("Agregar Nuevo Registro");
     $('#action_button').val("Agregar");
     $('#action').val("Add");
     $('#formModal').modal('show');
    });
    
    $('#sample_form').on('submit', function(event){
    event.preventDefault();
    if($('#action').val() == 'Add')
    {
    $.ajax({
    url:"{{ route('ajax-crud.store') }}",
    method:"POST",
    data: new FormData(this),
    contentType: false,
    cache:false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
     var html = '';
     if(data.errors)
     {
      html = '<div class="alert alert-danger">';
      for(var count = 0; count < data.errors.length; count++)
      {
       html += '<p>' + data.errors[count] + '</p>';
      }
      html += '</div>';
     }
     if(data.success)
     {
      html = '<div class="alert alert-success">' + data.success + '</div>';
      $('#sample_form')[0].reset();
      $('#user_table').DataTable().ajax.reload();
     }
     $('#form_result').html(html);
    }
    })
    }
    
    if($('#action').val() == "Edit")
    {
    $.ajax({
    url:"{{ route('ajax-crud.update') }}",
    method:"POST",
    data:new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
     var html = '';
     if(data.errors)
     {
      html = '<div class="alert alert-danger">';
      for(var count = 0; count < data.errors.length; count++)
      {
       html += '<p>' + data.errors[count] + '</p>';
      }
      html += '</div>';
     }
     if(data.success)
     {
      html = '<div class="alert alert-success">' + data.success + '</div>';
      $('#sample_form')[0].reset();
      $('#store_image').html('');
      $('#user_table').DataTable().ajax.reload();
     }
     $('#form_result').html(html);
    }
    });
    }
    });
    
    $(document).on('click', '.edit', function(){
    var id = $(this).attr('id');
    $('#form_result').html('');
    $.ajax({
    url:"/ajax-crud/"+id+"/edit",
    dataType:"json",
    success:function(html){
    $('#name').val(html.data.name);
    $('#description').val(html.data.description);
    $('#price').val(html.data.price);
    $('#stock').val(html.data.stock);
    $('#brand').val(html.data.brand);
    $('#category').val(html.data.category);
    $('#store_image').html("<img src={{ URL::to('/storage') }}/product/" + html.data.image + " width='70' class='img-thumbnail' />");
    $('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data.image+"' />");
    $('#hidden_id').val(html.data.id);
    $('.modal-title').text("Editar registro");
    $('#action_button').val("Edit");
    $('#action').val("Edit");
    $('#formModal').modal('show');
    }
    })
    });
    
    var user_id;
    
    $(document).on('click', '.delete', function(){
    user_id = $(this).attr('id');
    $('#confirmModal').modal('show');
    });
    
    $('#ok_button').click(function(){
    $.ajax({
    url:"ajax-crud/destroy/"+user_id,
    beforeSend:function(){
    $('#ok_button').text('Eliminando...');
    },
    success:function(data)
    {
    setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#user_table').DataTable().ajax.reload();
    }, 2000);
    }
    })
    });
    
    });
</script>