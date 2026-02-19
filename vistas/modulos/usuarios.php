<?php

if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){
  echo '<script>
    window.location = "inicio";
  </script>';
  return;
}

?>

<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Administrar usuarios</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                    <li class="breadcrumb-item active">Administrar usuarios</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarUsuario">
                    Agregar usuario
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped dt-responsive tablas" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Foto</th>
                            <th>Perfil</th>
                            <th>Estado</th>
                            <th>Último login</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $item = null;
                    $valor = null;
                    $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                    foreach ($usuarios as $key => $value){
                        echo '<tr>
                                <td>'.($key+1).'</td>
                                <td>'.$value["nombre"].'</td>
                                <td>'.$value["usuario"].'</td>';

                        if($value["foto"] != ""){
                            echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';
                        }else{
                            echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                        }

                        echo '<td>'.$value["perfil"].'</td>';

                        if($value["estado"] != 0){
                            echo '<td><button class="btn btn-success btn-sm btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';
                        }else{
                            echo '<td><button class="btn btn-danger btn-sm btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';
                        }

                        echo '<td>'.$value["ultimo_login"].'</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-bs-toggle="modal" data-bs-target="#modalEditarUsuario"><i class="fas fa-pencil-alt"></i></button>
                                        <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fas fa-times"></i></button>
                                    </div>
                                </td>
                              </tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                
                <!-- CABEZA DEL MODAL -->
                <div class="modal-header text-bg-primary">
                    <h4 class="modal-title">Agregar usuario</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- CUERPO DEL MODAL -->
                <div class="modal-body">
                    <div class="card-body">
                        
                        <!-- ENTRADA PARA EL NOMBRE -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control form-control-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>
                        </div>

                        <!-- ENTRADA PARA EL USUARIO -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="text" class="form-control form-control-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>
                        </div>

                        <!-- ENTRADA PARA LA CONTRASEÑA -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control form-control-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>
                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                            <select class="form-select form-select-lg" name="nuevoPerfil">
                                <option value="">Selecionar perfil</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Especial">Especial</option>
                            </select>
                        </div>

                        <!-- ENTRADA PARA SUBIR FOTO -->
                        <div class="mb-3">
                            <label for="nuevaFoto" class="form-label">Subir Foto</label>
                            <input type="file" class="form-control nuevaFoto" name="nuevaFoto">
                            <div class="form-text">Peso máximo de la foto 2MB</div>
                            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar mt-2" width="100px">
                        </div>

                    </div>
                </div>

                <!-- PIE DEL MODAL -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar usuario</button>
                </div>

                <?php
                $crearUsuario = new ControladorUsuarios();
                $crearUsuario -> ctrCrearUsuario();
                ?>
            </form>
        </div>
    </div>
</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">

                <!-- CABEZA DEL MODAL -->
                <div class="modal-header text-bg-primary">
                    <h4 class="modal-title">Editar usuario</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- CUERPO DEL MODAL -->
                <div class="modal-body">
                    <div class="card-body">

                        <!-- ENTRADA PARA EL NOMBRE -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control form-control-lg" id="editarNombre" name="editarNombre" value="" required>
                        </div>

                        <!-- ENTRADA PARA EL USUARIO -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="text" class="form-control form-control-lg" id="editarUsuario" name="editarUsuario" value="" readonly>
                        </div>

                        <!-- ENTRADA PARA LA CONTRASEÑA -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control form-control-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">
                            <input type="hidden" id="passwordActual" name="passwordActual">
                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                            <select class="form-select form-select-lg" name="editarPerfil">
                                <option value="" id="editarPerfil"></option>
                                <option value="Administrador">Administrador</option>
                                <option value="Especial">Especial</option>
                            </select>
                        </div>

                        <!-- ENTRADA PARA SUBIR FOTO -->
                        <div class="mb-3">
                            <label for="editarFoto" class="form-label">Subir Foto</label>
                            <input type="file" class="form-control nuevaFoto" name="editarFoto">
                            <div class="form-text">Peso máximo de la foto 2MB</div>
                            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar mt-2" width="100px">
                            <input type="hidden" name="fotoActual" id="fotoActual">
                        </div>

                    </div>
                </div>

                <!-- PIE DEL MODAL -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Modificar usuario</button>
                </div>

                <?php
                $editarUsuario = new ControladorUsuarios();
                $editarUsuario -> ctrEditarUsuario();
                ?>
            </form>
        </div>
    </div>
</div>

<?php
$borrarUsuario = new ControladorUsuarios();
$borrarUsuario -> ctrBorrarUsuario();
?>
