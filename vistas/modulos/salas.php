<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Administrar salas de cine</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                    <li class="breadcrumb-item active">Administrar salas de cine</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarSala">
                    Agregar sala
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped dt-responsive tablas" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Departamento</th>
                            <th>Ciudad</th>
                            <th>Nombre del exhibidor</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Fecha de ingreso</th>
                            <th>Acciones</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php
                        $item = null;
                        $valor = null;
                        $salas = ControladorSalas::ctrMostrarSalas($item, $valor);

                        foreach ($salas as $key => $value) {
                            echo '<tr>
                                    <td>'.($key+1).'</td>
                                    <td>'.$value["departamento"].'</td>
                                    <td class="text-uppercase">'.$value["ciudad"].'</td>
                                    <td>'.$value["exhibidor"].'</td>
                                    <td>'.$value["nombre"].'</td>         
                                    <td>'.$value["direccion"].'</td>
                                    <td>'.$value["fecha"].'</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditarSala" data-bs-toggle="modal" data-bs-target="#modalEditarSala" idSala="'.$value["id"].'"><i class="fas fa-pencil-alt"></i></button>';
                            if($_SESSION["perfil"] == "Administrador"){
                                echo'<button class="btn btn-danger btnEliminarSala" idSala="'.$value["id"].'"><i class="fas fa-times"></i></button>';
                            }
                            echo'</div>  
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
MODAL AGREGAR SALA
======================================-->

<div id="modalAgregarSala" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">

                <!-- CABEZA DEL MODAL -->
                <div class="modal-header text-bg-primary">
                    <h4 class="modal-title">Agregar sala</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- CUERPO DEL MODAL -->
                <div class="modal-body">
                    <div class="card-body">

                        <!-- ENTRADA PARA EL DEPARTAMENTO-->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-list"></i></span>
                            <select class="form-select form-select-lg" name="nuevoDepartamento" id="nuevoDepartamento"  required>
                                <option value="">-Selecionar departamento del complejo-</option>
                                <option value="AMAZONAS">AMAZONAS</option>
                                <option value="ANTIOQUIA">ANTIOQUIA</option>
                                <option value="ARAUCA">ARAUCA</option>
                                <option value="BOLIVAR">BOLIVAR</option>
                                <option value="BOYACA">BOYACA</option>
                                <option value="CALDAS">CALDAS</option>
                                <option value="CAQUETA">CAQUETA</option>
                                <option value="CASANARE">CASANARE</option>
                                <option value="CAUCA">CAUCA</option>
                                <option value="CESAR">CESAR</option>
                                <option value="CHOCO">CHOCO</option>
                                <option value="CORDOBA">CORDOBA</option>
                                <option value="CUNDINAMARCA">CUNDINAMARCA</option>
                                <option value="GUAINIA">GUAINIA</option>
                                <option value="GUAJIRA">GUAJIRA</option>
                                <option value="GUAVIARE">GUAVIARE</option>
                                <option value="HUILA">HUILA</option>
                                <option value="MAGDALENA">MAGDALENA</option>
                                <option value="META">META</option>
                                <option value="N SANTANDER">N SANTANDER</option>
                                <option value="NARINO">NARINO</option>
                                <option value="PUTUMAYO">PUTUMAYO</option>
                                <option value="RISARALDA">RISARALDA</option>
                                <option value="SAN ANDRES">SAN ANDRES</option>
                                <option value="SANTANDER">SANTANDER</option>
                                <option value="SUCRE">SUCRE</option>
                                <option value="TOLIMA">TOLIMA</option>
                                <option value="VALLE DEL CAUCA">VALLE DEL CAUCA</option>
                                <option value="VAUPES">VAUPES</option>
                                <option value="VICHADA">VICHADA</option>
                            </select>
                        </div>

                        <!-- ENTRADA PARA LA CIUDAD  -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span> 
                            <input type="text" class="form-control form-control-lg" name="nuevaCiudad" id="nuevaCiudad" placeholder="Ingresar ciudad del complejo" required>
                        </div>

                        <!-- ENTRADA PARA EL EXHIBIDOR  -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-industry"></i></span> 
                            <input type="text" class="form-control form-control-lg" name="nuevoExhibidor" id="nuevoExhibidor"  placeholder="Ingresar nombre del exhibidor" required>
                        </div>

                        <!-- ENTRADA PARA EL NOMBRE  -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span> 
                            <input type="text" class="form-control form-control-lg" name="nuevoNombre" id="nuevoNombre" placeholder="Ingresar nombre del complejo" required>
                        </div>

                        <!-- ENTRADA PARA LA DIRECCIÓN  -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-map-signs"></i></span> 
                            <input type="text" class="form-control form-control-lg" name="nuevaDireccion" id="nuevaDireccion" placeholder="Ingresar dirección del complejo" required>
                        </div>

                    </div>
                </div>

                <!-- PIE DEL MODAL -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar sala</button>
                </div>

            </form>
            <?php
            $crearSala = new ControladorSalas();
            $crearSala -> ctrCrearSala();
            ?>
        </div>
    </div>
</div>

<!--=====================================
MODAL EDITAR SALA
======================================-->

<div id="modalEditarSala" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">

                <!-- CABEZA DEL MODAL -->
                <div class="modal-header text-bg-primary">
                    <h4 class="modal-title">Editar sala</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- CUERPO DEL MODAL -->
                <div class="modal-body">
                    <div class="card-body">

                        <!-- ENTRADA PARA EL DEPARTAMENTO-->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-list"></i></span>
                            <select class="form-select form-select-lg" name="editarDepartamento" required>
                                <option id="editarDepartamento"></option>
                                <option value="">-Selecionar departamento del complejo-</option>
                                <option value="AMAZONAS">AMAZONAS</option>
                                <option value="ANTIOQUIA">ANTIOQUIA</option>
                                <option value="ARAUCA">ARAUCA</option>
                                <option value="BOLIVAR">BOLIVAR</option>
                                <option value="BOYACA">BOYACA</option>
                                <option value="CALDAS">CALDAS</option>
                                <option value="CAQUETA">CAQUETA</option>
                                <option value="CASANARE">CASANARE</option>
                                <option value="CAUCA">CAUCA</option>
                                <option value="CESAR">CESAR</option>
                                <option value="CHOCO">CHOCO</option>
                                <option value="CORDOBA">CORDOBA</option>
                                <option value="CUNDINAMARCA">CUNDINAMARCA</option>
                                <option value="GUAINIA">GUAINIA</option>
                                <option value="GUAJIRA">GUAJIRA</option>
                                <option value="GUAVIARE">GUAVIARE</option>
                                <option value="HUILA">HUILA</option>
                                <option value="MAGDALENA">MAGDALENA</option>
                                <option value="META">META</option>
                                <option value="N SANTANDER">N SANTANDER</option>
                                <option value="NARINO">NARINO</option>
                                <option value="PUTUMAYO">PUTUMAYO</option>
                                <option value="RISARALDA">RISARALDA</option>
                                <option value="SAN ANDRES">SAN ANDRES</option>
                                <option value="SANTANDER">SANTANDER</option>
                                <option value="SUCRE">SUCRE</option>
                                <option value="TOLIMA">TOLIMA</option>
                                <option value="VALLE DEL CAUCA">VALLE DEL CAUCA</option>
                                <option value="VAUPES">VAUPES</option>
                                <option value="VICHADA">VICHADA</option>
                            </select>
                        </div>

                        <!-- ENTRADA PARA LA CIUDAD  -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span> 
                            <input type="text" class="form-control form-control-lg" name="editarCiudad" id="editarCiudad" placeholder="Ingresar ciudad del complejo" required>
                        </div>

                        <!-- ENTRADA PARA EL EXHIBIDOR  -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-industry"></i></span> 
                            <input type="text" class="form-control form-control-lg" name="editarExhibidor" id="editarExhibidor" placeholder="Ingresar nombre del exhibidor" required>
                        </div>

                        <!-- ENTRADA PARA EL NOMBRE  -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span> 
                            <input type="text" class="form-control form-control-lg" name="editarNombre" id="editarNombre" placeholder="Ingresar nombre del complejo" required>
                            <input type="hidden" id="idSala" name="idSala">
                        </div>

                        <!-- ENTRADA PARA LA DIRECCIÓN  -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-map-signs"></i></span> 
                            <input type="text" class="form-control form-control-lg" name="editarDireccion" id="editarDireccion" placeholder="Ingresar dirección del complejo" required>
                        </div>

                    </div>
                </div>

                <!-- PIE DEL MODAL -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>

            </form>
            <?php
            $editarSala = new ControladorSalas();
            $editarSala -> ctrEditarSala();
            ?>
        </div>
    </div>
</div>

<?php
$eliminarSala = new ControladorSalas();
$eliminarSala -> ctrEliminarSala();
?>
