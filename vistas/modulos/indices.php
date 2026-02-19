<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Administrar índice de información clasificada y reservada</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                    <li class="breadcrumb-item active">Índices</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarIndice">
                    Agregar indice
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped dt-responsive tablaIndices" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>ID</th>
                            <th>Categoría de información</th>
                            <th>Nombre o título de la información</th>
                            <th>Idioma</th>
                            <th>Medio de conservación o soporte</th>
                            <th>Fecha de generación de la información</th>
                            <th>Nombre del responsable de la producción de la información (área)</th>
                            <th>Nombre del responsable de la información (área)</th>
                            <th>Objeto legítimo de la excepción (ley 1712)</th>
                            <th>Fundamento de la exclusión - Constitucional o legal</th>
                            <th>Información específica con el carácter de reservada o clasificada - Jurídico</th>
                            <th>¿Excepción total o parcial?</th>
                            <th>Fecha de calificación</th>
                            <th>Plazo de clasificación o reserva</th>
                            <th>Fecha agregado al sistema</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
                <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilIndices">
            </div>
        </div>
    </div>
</div>

<!--=====================================
MODAL AGREGAR INDICE
======================================-->

<div id="modalAgregarIndice" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">

                <!-- CABEZA DEL MODAL -->
                <div class="modal-header text-bg-primary">
                    <h4 class="modal-title">Agregar indice</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- CUERPO DEL MODAL -->
                <div class="modal-body">
                    <div class="card-body">

                        <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-th"></i></span>
                            <select class="form-select form-select-lg" id="nuevaCategoria" name="nuevaCategoria" required>
                                <option value="">Selecionar categoría</option>
                                <?php
                                $item  = null;
                                $valor = null;
                                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
                                foreach ($categorias as $key => $value) {
                                    echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <!-- ENTRADA PARA EL ID ACTIVO -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-code"></i></span>
                            <input type="text" class="form-control form-control-lg" id="nuevoId_indice" name="nuevoId_indice" placeholder="Ingresar ID del indice" required>
                        </div>

                        <!-- ENTRADA PARA EL NOMBRE -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="nuevoNombre" id="nuevoNombre" placeholder="Ingresar nombre o título de la información" required>
                        </div>

                        <!-- ENTRADA PARA EL IDIOMA -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-language"></i></span>
                            <input type="text" class="form-control form-control-lg" name="nuevoIdioma" id="nuevoIdioma" placeholder="Ingresar el idioma" required>
                        </div>

                        <!-- ENTRADA PARA MEDIO DE CONSERVACIÓN-->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-list"></i></span>
                            <select class="form-select form-select-lg" name="nuevoMedio" id="nuevoMedio" required>
                                <option value="">-Selecionar medio de conservación o soporte-</option>
                                <option value="Electrónico / Digital">Electrónico / Digital</option>
                                <option value="Físico">Físico</option>
                                <option value="Físico - Electrónico / Digital">Físico - Electrónico / Digital</option>
                            </select>
                        </div>

                        <!-- ENTRADA PARA LA FECHA DE GENERACIÓN -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            <input type="text" class="form-control form-control-lg" name="nuevaFecha_generacion" id="nuevaFecha_generacion" placeholder="Ingresar la fecha de generación" required>
                        </div>

                        <!-- ENTRADA PARA EL NOMBRE DEL RESPONSABLE 1 -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="nuevoResponsable1" id="nuevoResponsable1" placeholder="Ingresar nombre del responsable de la producción de la información (área)" required>
                        </div>

                        <!-- ENTRADA PARA EL NOMBRE DEL RESPONSABLE 2 -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="nuevoResponsable2" id="nuevoResponsable2" placeholder="Ingresar nombre del responsable de la información (área)" required>
                        </div>

                        <!-- ENTRADA PARA EL OBJETO LEGÍTIMO -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-gavel"></i></span>
                            <input type="text" class="form-control form-control-lg" name="nuevoObjeto" id="nuevoObjeto" placeholder="Ingresar el objeto legítimo de la excepción (ley 1712)" required>
                        </div>

                        <!-- ENTRADA PARA EL FUNDAMENTO -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-gavel"></i></span>
                            <input type="text" class="form-control form-control-lg" name="nuevoFundamento" id="nuevoFundamento" placeholder="Ingresar el fundamento de la exclusión - constitucional o legal" required>
                        </div>

                        <!-- ENTRADA PARA LA INFORMACIÓN ESPECÍFICA -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="nuevaEspecifica" id="nuevaEspecifica" placeholder="Ingresar la información específica con el carácter de reservada o clasificada - jurídico" required>
                        </div>

                        <!-- ENTRADA PARA ¿EXCEPCIÓN TOTAL O PARCIAL? Y FECHA CALIFICACION -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-info"></i></span>
                                    <select class="form-select form-select-lg" name="nuevaExcepcion" id="nuevaExcepcion" required>
                                        <option value="">-Información excepción-</option>
                                        <option value="Parcial">Parcial</option>
                                        <option value="Total">Total</option>
                                        <option value="N/A">N/A</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span> 
                                    <input type="text" class="form-control form-control-lg" name="nuevaFecha_calificacion" id="nuevaFecha_calificacion" placeholder="Ingresar fecha de calificación" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
                                </div>
                            </div>
                        </div>

                        <!-- ENTRADA PARA EL PLAZO -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="nuevoPlazo"  id="nuevoPlazo" placeholder="Ingresar el plazo de clasificación o reserva" required>
                        </div>

                    </div>
                </div>

                <!-- PIE DEL MODAL -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar indice</button>
                </div>

            </form>
            <?php 
            $crearIndice = new ControladorIndices();
            $crearIndice -> ctrCrearIndice();
            ?>
        </div>
    </div>
</div>

<!--=====================================
MODAL EDITAR INDICE
======================================-->

<div id="modalEditarIndice" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">
                <!-- CABEZA DEL MODAL -->
                <div class="modal-header text-bg-primary">
                    <h4 class="modal-title">Editar indice</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- CUERPO DEL MODAL -->
                <div class="modal-body">
                    <div class="card-body">

                        <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-th"></i></span>
                            <select class="form-select form-select-lg"  name="editarCategoria"  readonly required>
                                <option id="editarCategoria"></option>
                            </select>
                        </div>

                        <!-- ENTRADA PARA EL ID ACTIVO -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-code"></i></span>
                            <input type="text" class="form-control form-control-lg" id="editarId_indice" name="editarId_indice" readonly required>
                        </div>

                        <!-- ENTRADA PARA EL NOMBRE -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="editarNombre" id="editarNombre" placeholder="Ingresar nombre o título de la información" required>
                        </div>

                        <!-- ENTRADA PARA EL IDIOMA -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-language"></i></span>
                            <input type="text" class="form-control form-control-lg" name="editarIdioma" id="editarIdioma" placeholder="Ingresar el idioma" required>
                        </div>

                        <!-- ENTRADA PARA MEDIO DE CONSERVACIÓN-->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-list"></i></span>
                            <select class="form-select form-select-lg" name="editarMedio" required>
                                <option id="editarMedio"></option>
                                <option value="">-Selecionar medio de conservación o soporte-</option>
                                <option value="Electrónico / Digital">Electrónico / Digital</option>
                                <option value="Físico">Físico</option>
                                <option value="Físico - Electrónico / Digital">Físico - Electrónico / Digital</option>
                            </select>
                        </div>

                        <!-- ENTRADA PARA LA FECHA DE GENERACIÓN -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            <input type="text" class="form-control form-control-lg" name="editarFecha_generacion" id="editarFecha_generacion" placeholder="Ingresar la fecha de generación" required>
                        </div>

                        <!-- ENTRADA PARA EL NOMBRE DEL RESPONSABLE 1 -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="editarResponsable1" id="editarResponsable1" placeholder="Ingresar nombre del responsable de la producción de la información (área)" required>
                        </div>

                        <!-- ENTRADA PARA EL NOMBRE DEL RESPONSABLE 2 -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="editarResponsable2" id="editarResponsable2" placeholder="Ingresar nombre del responsable de la información (área)" required>
                        </div>

                        <!-- ENTRADA PARA EL OBJETO LEGÍTIMO -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-gavel"></i></span>
                            <input type="text" class="form-control form-control-lg" name="editarObjeto" id="editarObjeto" placeholder="Ingresar el objeto legítimo de la excepción (ley 1712)" required>
                        </div>

                        <!-- ENTRADA PARA EL FUNDAMENTO -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-gavel"></i></span>
                            <input type="text" class="form-control form-control-lg" name="editarFundamento" id="editarFundamento" placeholder="Ingresar el fundamento de la exclusión - constitucional o legal" required>
                        </div>

                        <!-- ENTRADA PARA LA INFORMACIÓN ESPECÍFICA -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="editarEspecifica" id="editarEspecifica" placeholder="Ingresar la información específica con el carácter de reservada o clasificada - jurídico" required>
                        </div>

                        <!-- ENTRADA PARA ¿EXCEPCIÓN TOTAL O PARCIAL? Y FECHA CALIFICACION -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-info"></i></span>
                                    <select class="form-select form-select-lg" name="editarExcepcion" required>
                                        <option id="editarExcepcion"></option>
                                        <option value="">-Información excepción-</option>
                                        <option value="Parcial">Parcial</option>
                                        <option value="Total">Total</option>
                                        <option value="N/A">N/A</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span> 
                                    <input type="text" class="form-control form-control-lg" name="editarFecha_calificacion" id="editarFecha_calificacion" placeholder="Ingresar fecha de calificación" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
                                </div>
                            </div>
                        </div>

                        <!-- ENTRADA PARA EL PLAZO -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="editarPlazo"  id="editarPlazo" placeholder="Ingresar el plazo de clasificación o reserva" required>
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
            $editarIndice = new ControladorIndices();
            $editarIndice -> ctrEditarIndice();
            ?>
        </div>
    </div>
</div>

<?php
$eliminarIndice = new ControladorIndices();
$eliminarIndice -> ctrEliminarIndice();
?>

