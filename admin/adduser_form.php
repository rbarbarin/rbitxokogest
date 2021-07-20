<h2>ADD USER</h2>                 
          <form action="adduser.php" class="form-horizontal">
            <div class="form-group">  
              <label for="name" class="sr-only">Nombre</label>
              <input type="text" id="name" name="name" class="col-md-6" placeholder="Name">
            </div>
            <div class="form-group">  
              <label for="surname" class="sr-only">Apellidos</label>
              <input type="text" id="surname" name="surname" class="col-md-6" placeholder="Surname">
            </div>
            <div class="form-group">  
              <label for="password" class="sr-only">Password</label>
              <input type="password" id="password" name="password" class="col-md-6" placeholder="Password">
            </div>
            <div class="form-group">  
              <label for="user" class="sr-only">Usuario</label>
              <input type="text" id="user" name="user" class="col-md-6" placeholder="User">
            </div>
            <div class="form-group">  
              <label for="user" class="sr-only">Nivel de acceso</label>
              <input type="radio" name="role_id" value="1"> Administrator 
              <input type="radio" name="role_id" value="2"> User
            </div>
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary">
                Guardar
              </button>
              <a href="../index.php" class="btn btn-danger"> Cancelar </a>
            </div>
          </form>