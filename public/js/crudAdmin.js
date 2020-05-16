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
        return "<img src={{ URL::to('/') }}/images/" + data + " width='70' class='img-thumbnail' />";
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
       },{
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
     $('.modal-title').text("Add New Record");
        $('#action_button').val("Add");
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
       $('#store_image').html("<img src={{ URL::to('/') }}/images/" + html.data.image + " width='70' class='img-thumbnail' />");
       $('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data.image+"' />");
       $('#hidden_id').val(html.data.id);
       $('.modal-title').text("Edit New Record");
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