<div id="formModal" class="modal fade col-xs-12" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
            
            <h4 class="modal-title">Agregar Nuevo Producto</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                <div class="col-md-8 mb-2">
                  <select id="brandsDB" name="brandsDB"></select>
                </div>
                <div class="col-md-8">
                  <input type="text" name="brand" id="brand" class="form-control" />
                </div>
                </div>
                <div class="form-group">
                <label class="control-label col-md-4">Categoria : </label>
                <div class="col-md-8 mb-2">
                  <select id="categoryDB" name="categoryDB"></select>
                </div>
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
<script>
  $.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: "/obtenerMarcasyCategorias",
			type: "GET",
			success: function (response) {
            var brandAddProduct = document.getElementById('brandsDB');
            var categoryAddProduct = document.getElementById('categoryDB');
						let optionNull = document.createElement('option');
						optionNull.setAttribute('value',-1);
						if(document.querySelector('html').lang == 'en'){
							optionNull.append(document.createTextNode('Select an option'));
						}else{
							optionNull.append(document.createTextNode('Seleccione una opción'));
						}						
						brandAddProduct.append(optionNull);
						let optionNulldos = document.createElement('option');
						optionNulldos.setAttribute('value',-1);
						if(document.querySelector('html').lang == 'en'){
							optionNulldos.append(document.createTextNode('Select an option'));
						}else{
							optionNulldos.append(document.createTextNode('Seleccione una opción'));
						}						
						categoryAddProduct.append(optionNulldos);		
					for(brand in response[0]){
						let option = document.createElement('option');
						option.setAttribute('value',response[0][brand].id);
						option.append(document.createTextNode(response[0][brand].name));
						brandAddProduct.append(option);
					}
					for(category in response[1]){
						let option = document.createElement('option');
						option.setAttribute('value',response[1][category].id);
						option.append(document.createTextNode(response[1][category].name));
						categoryAddProduct.append(option);
					}																
				},
			error: function (e) {
				console.log(e);
			}
    });

    document.getElementById('brandsDB').addEventListener('change',function(){
      if(parseInt(this.value) > -1){
        document.getElementById('brand').disabled = true;
        document.getElementById('brand').value = "0";
      }else{
        document.getElementById('brand').disabled = false;
      }
    });
    document.getElementById('categoryDB').addEventListener('change',function(){
      if(parseInt(this.value) > -1){
        document.getElementById('category').disabled = true;
        document.getElementById('category').value = "0";
      }else{
        document.getElementById('category').disabled = false;
      }
    });
    
</script>
 