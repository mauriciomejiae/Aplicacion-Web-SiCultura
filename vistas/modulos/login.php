<div id="back"></div>

<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>SiCultura</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingresar al sistema</p>

      <form method="post">
        
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
          <div class="input-group-text">
            <span class="fas fa-user"></span>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>

        <?php
          $login = new ControladorUsuarios();
          $login -> ctrIngresoUsuario();
        ?>

      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>


