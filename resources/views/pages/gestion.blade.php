@extends("layouts.master")

@section("content")

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/r-2.2.5/datatables.min.css"/>

<div class="container">
    <div class=" pt-2" style="display: flex; justify-content:space-between; flex-wrap:wrap; margin: 10px 0px;">
        <h3 align="center" class="col-12 col-md-9">Gestión de productos</h3>
        <button type="button" name="create_record" id="create_record" class="btn btn-success btn-lg col-12 col-md-3"><i class="fa fa-plus" aria-hidden="true"></i> Producto</button>
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
                <th>Acción</th>
            </tr>
        </thead>
    </table>
    @include("includes.modal-create-update")
    @include("includes.modal-confirm")


<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
       
$(document).ready(function() {
    $('#user_table').DataTable({
        "serverSide": true,
        responsive: true,
        "ajax" : "{{ route('ajax-crud.index') }}",
        "columns": [
            {data: 'image', name: 'image', class: 'img-thumbnail',
                name: 'image',
                render: function(data, type, full, meta) {
                    return "<img src={{ URL::to('/storage') }}/product/" + data + " width='70'/>";
                },orderable: false
            },                    
            {data: 'name', name: 'name'},
            {data: 'description', name: 'description'},
            {data: 'price', name: 'price'},
            {data: 'stock', name: 'stock'},
            {data: 'brand', name: 'brand'},
            {data: 'category', name: 'category'},
            {data: 'action', name: 'action',orderable: false},                
        ]
    });

    $('#create_record').click(function(){
        $('.modal-title').text("Agregar Nuevo Registro");
            $('#action_button').val("Agregar");
            $('#action').val("Add");
            $('#formModal').modal('show');
    });

    $('#sample_form').on('submit', function(event) {
        event.preventDefault();
        if ($('#action').val() == 'Add') {
            $.ajax({
                url: "{{ route('ajax-crud.store') }}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    var html = '';
                    if (data.errors) {
                        html = '<div class="alert alert-danger">';
                        for (var count = 0; count < data.errors.length; count++) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                        $('#sample_form')[0].reset();
                        $('#user_table').DataTable().ajax.reload();
                    }
                    $('#form_result').html(html);
                }
            })
        }

        if ($('#action').val() == "Edit") {
            $.ajax({
                url: "{{ route('ajax-crud.update') }}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    var html = '';
                    if (data.errors) {
                        html = '<div class="alert alert-danger">';
                        for (var count = 0; count < data.errors.length; count++) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if (data.success) {
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

    $(document).on('click', '.edit', function() {
        var id = $(this).attr('id');
        $('#form_result').html('');
        $.ajax({
            url: "/ajax-crud/" + id + "/edit",
            dataType: "json",
            success: function(html) {
                $('#name').val(html.data.name);
                $('#description').val(html.data.description);
                $('#price').val(html.data.price);
                $('#stock').val(html.data.stock);
                $('#brand').val(html.data.brand);
                $('#category').val(html.data.category);
                $('#store_image').html("<img src={{ URL::to('/storage') }}/product/" + html.data.image + " width='70' class='img-thumbnail' />");
                $('#store_image').append("<input type='hidden' name='hidden_image' value='" + html.data.image + "' />");
                $('#hidden_id').val(html.data.id);
                $('.modal-title').text("Editar registro");
                $('#action_button').val("Editar");
                $('#action').val("Edit");
                $('#formModal').modal('show');
            }
        })
    });

    var user_id;

    $(document).on('click', '.delete', function() {
        user_id = $(this).attr('id');
        $('#confirmModal').modal('show');
    });

    $('#ok_button').click(function() {
        $.ajax({
            url: "ajax-crud/destroy/" + user_id,
            beforeSend: function() {
                $('#ok_button').text('Eliminando...');
            },
            success: function(data) {
                setTimeout(function() {
                    $('#confirmModal').modal('hide');
                    $('#user_table').DataTable().ajax.reload();
                }, 2000);
            }
        })
    });
});

</script>

@endsection