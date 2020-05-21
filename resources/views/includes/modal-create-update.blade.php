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

 