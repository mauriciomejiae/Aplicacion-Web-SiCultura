<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Administrar lenguas</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                    <li class="breadcrumb-item active">Lenguas nativas</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarLengua">
                    Agregar lengua
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped dt-responsive tablas" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Departamento</th>
                            <th>Familia</th>
                            <th>Habitantes</th>
                            <th>Hablantes</th> 
                            <th>Vitalidad</th>
                            <th>Fecha de ingreso</th>
                            <th>Acciones</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php
                        $item = null;
                        $valor = null;
                        $lenguas = ControladorLenguas::ctrMostrarLenguas($item, $valor);

                        foreach ($lenguas as $key => $value) {
                            echo '<tr>
                                    <td>'.($key+1).'</td>
                                    <td>'.$value["nombre"].'</td>
                                    <td>'.$value["descripcion"].'</td>
                                    <td>'.$value["departamento"].'</td>
                                    <td>'.$value["familia"].'</td>
                                    <td>'.number_format($value["habitantes"],0).'</td>   
                                    <td>'.number_format($value["hablantes"],0).'</td>          
                                    <td>'.$value["vitalidad"].'</td>
                                    <td>'.$value["fecha"].'</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditarLengua" data-bs-toggle="modal" data-bs-target="#modalEditarLengua" idLengua="'.$value["id"].'"><i class="fas fa-pencil-alt"></i></button>';
                            if($_SESSION["perfil"] == "Administrador"){
                                echo '<button class="btn btn-danger btnEliminarLengua" idLengua="'.$value["id"].'"><i class="fas fa-times"></i></button>';
                            }
                            echo '</div>  
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
MODAL AGREGAR LENGUA
======================================-->

<div id="modalAgregarLengua" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">

                <!-- CABEZA DEL MODAL -->
                <div class="modal-header text-bg-primary">
                    <h4 class="modal-title">Agregar lengua</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- CUERPO DEL MODAL -->
                <div class="modal-body">
                    <div class="card-body">

                        <!-- ENTRADA PARA EL NOMBRE  -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span> 
                            <input type="text" class="form-control form-control-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>
                        </div>

                        <!-- ENTRADA PARA LA DESCRIPCION  -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span> 
                            <input type="text" class="form-control form-control-lg" name="nuevaDescripcion" placeholder="Ingresar descripción" required>
                        </div>

                        <!-- ENTRADA PARA EL DEPARTAMENTO-->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-list"></i></span>
                            <select class="form-select form-select-lg" name="nuevoDepartamento" id="nuevoDepartamento"  required>
                                <option value="">Selecionar departamento</option>
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

                        <!-- ENTRADA PARA FAMILIA LINGÜISTICA  -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span> 
                            <input type="text" class="form-control form-control-lg" name="nuevaFamilia" placeholder="Ingresar familia lingüistica" required>
                        </div>

                        <!-- ENTRADA PARA NUMERO DE HABITANTES  -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-sort-numeric-up-alt"></i></span> 
                            <input type="number" class="form-control form-control-lg" name="nuevoHabitantes" min="0" placeholder="Ingresar número de habitantes" required>
                        </div>

                        <!-- ENTRADA PARA NUMERO DE HABLANTES  -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-sort-numeric-up-alt"></i></span> 
                            <input type="number" class="form-control form-control-lg" name="nuevoHablantes" min="0" placeholder="Ingresar número de hablantes" required>
                        </div>

                        <!-- ENTRADA PARA VITALIDAD-->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-list"></i></span>
                            <select class="form-select form-select-lg" name="nuevaVitalidad" id="nuevaVitalidad" required>
                                <option value="">Selecionar vitalidad</option>
                                <option value="En peligro">En peligro</option>
                                <option value="En peligro de extinción">En peligro de extinción</option>
                                <option value="En situación crítica">En situación crítica</option>
                                <option value="Vulnerable">Vulnerable</option>
                            </select>
                        </div>

                    </div>
                </div>

                <!-- PIE DEL MODAL -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar lengua</button>
                </div>

            </form>
            <?php
            $crearLengua = new ControladorLenguas();
            $crearLengua -> ctrCrearLengua();
            ?>
        </div>
    </div>
</div>

<!--=====================================
MODAL EDITAR LENGUA
======================================-->

<div id="modalEditarLengua" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">

                <!-- CABEZA DEL MODAL -->
                <div class="modal-header text-bg-primary">
                    <h4 class="modal-title">Editar lengua</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- CUERPO DEL MODAL -->
                <div class="modal-body">
                    <div class="card-body">

                        <!-- ENTRADA PARA EL NOMBRE  -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span> 
                            <input type="text" class="form-control form-control-lg" name="editarNombre" id="editarNombre" required>
                            <input type="hidden" id="idLengua" name="idLengua">
                        </div>

                        <!-- ENTRADA PARA LA DESCRIPCION  -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span> 
                            <input type="text" class="form-control form-control-lg" name="editarDescripcion" id="editarDescripcion"  required>
                        </div>

                        <!-- ENTRADA PARA EL DEPARTAMENTO-->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-list"></i></span>
                            <select class="form-select form-select-lg" name="editarDepartamento" required>
                                <option id="editarDepartamento"></option>
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

                        <!-- ENTRADA PARA FAMILIA LINGÜISTICA  -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span> 
                            <input type="text" class="form-control form-control-lg" name="editarFamilia" id="editarFamilia" required>
                        </div>

                        <!-- ENTRADA PARA NUMERO DE HABITANTES  -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-sort-numeric-up-alt"></i></span> 
                            <input type="number" class="form-control form-control-lg" name="editarHabitantes" min="0"  id="editarHabitantes" required>
                        </div>

                        <!-- ENTRADA PARA NUMERO DE HABLANTES  -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-sort-numeric-up-alt"></i></span> 
                            <input type="number" class="form-control form-control-lg" name="editarHablantes" min="0"  id="editarHablantes" required>
                        </div>

                        <!-- ENTRADA PARA VITALIDAD-->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-list"></i></span>
                            <select class="form-select form-select-lg" name="editarVitalidad" required>
                                <option id="editarVitalidad"></option>
                                <option value="En peligro">En peligro</option>
                                <option value="En peligro de extinción">En peligro de extinción</option>
                                <option value="En situación crítica">En situación crítica</option>
                                <option value="Vulnerable">Vulnerable</option>
                            </select>
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
            $editarLengua = new ControladorLenguas();
            $editarLengua -> ctrEditarLengua();
            ?>
        </div>
    </div>
</div>

<?php
$eliminarLengua = new ControladorLenguas();
$eliminarLengua -> ctrEliminarLengua();
?>
