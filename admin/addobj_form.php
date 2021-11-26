<h2>ADD OBJETO</h2>                 
          <form action="addobj.php" class="form-horizontal">
            <div class="form-group">  
              <label for="obj_name" class="sr-only">Nombre</label>
              <input type="text" id="obj_name" name="obj_name" class="col-md-6" placeholder="Name">
            </div>
            <div class="form-group">  
              <label for="place_id" class="sr-only">Lugar</label>
              <input type="text" id="place_id" name="place_id" class="col-md-6" placeholder="Place">
            </div>
            <div class="form-group">  
              <label for="obj_description" class="sr-only">Notas</label>
              <input type="text" id="obj_description" name="obj_description" class="col-md-6" placeholder="Description">
            </div>
            <div class="form-group">  
              <label for="kind" class="sr-only">Tipo de reserva</label>
              <input type="radio" name="kind_id" value="1"> Cualquiera 
              <input type="radio" name="kind_id" value="2"> Noche NO
            </div>
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary"> Guardar
              </button> <a href="../index.php" class="btn btn-danger"> Cancelar </a>
            </div>
          </form>