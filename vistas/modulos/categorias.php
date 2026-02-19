<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Administrar categorías</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                    <li class="breadcrumb-item active">Administrar categorías</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarCategoria">
                    Agregar categoría
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped dt-responsive tablas" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $item = null;
                    $valor = null;
                    $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                    foreach ($categorias as $key => $value) {
                        echo '<tr>
                                <td>'.($key+1).'</td>
                                <td>'.$value["categoria"].'</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-bs-toggle="modal" data-bs-target="#modalEditarCategoria"><i class="fas fa-pencil-alt"></i></button>';
                                        
                                        if($_SESSION["perfil"] == "Administrador"){
                                            echo '<button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fas fa-times"></i></button>';
                                        }

                        echo '      </div>  
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
MODAL AGREGAR CATEGORÍA
======================================-->

<div id="modalAgregarCategoria" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">
                
                <!-- CABEZA DEL MODAL -->
                <div class="modal-header text-bg-primary">
                    <h4 class="modal-title">Agregar categoría</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- CUERPO DEL MODAL -->
                <div class="modal-body">
                    <div class="card-body">
                        <!-- ENTRADA PARA EL NOMBRE -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-th-large"></i></span>
                            <input type="text" class="form-control form-control-lg" name="nuevaCategoria" placeholder="Ingresar categoría" required>
                        </div>
                    </div>
                </div>

                <!-- PIE DEL MODAL -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar categoría</button>
                </div>

                <?php
                $crearCategoria = new ControladorCategorias();
                $crearCategoria -> ctrCrearCategoria();
                ?>
            </form>
        </div>
    </div>
</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">
                
                <!-- CABEZA DEL MODAL -->
                <div class="modal-header text-bg-primary">
                    <h4 class="modal-title">Editar categoría</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- CUERPO DEL MODAL -->
                <div class="modal-body">
                    <div class="card-body">
                        <!-- ENTRADA PARA EL NOMBRE -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-th-large"></i></span>
                            <input type="text" class="form-control form-control-lg" name="editarCategoria" id="editarCategoria" required>
                            <input type="hidden" name="idCategoria" id="idCategoria" required>
                        </div>
                    </div>
                </div>

                <!-- PIE DEL MODAL -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>

                <?php
                $editarCategoria = new ControladorCategorias();
                $editarCategoria -> ctrEditarCategoria();
                ?>
            </form>
        </div>
    </div>
</div>

<?php
$borrarCategoria = new ControladorCategorias();
$borrarCategoria -> ctrBorrarCategoria();
?>


