<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Administrar activos</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                    <li class="breadcrumb-item active">Activos</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarActivo">
                    Agregar activo
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped dt-responsive tablaActivos" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>ID Activo</th>
                            <th>Categoría de información</th>
                            <th>Nombre o título de la información</th>
                            <th>Descripciónde la información</th>
                            <th>Idioma</th>
                            <th>Medio de conservación o soporte</th>
                            <th>Formato</th>
                            <th>Información Disponible</th>
                            <th>Información Publicada</th>
                            <th>Ubicación</th>
                            <th>Fecha agregado al sistema</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
                <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilActivos">
            </div>
        </div>
    </div>
</div>


<!--=====================================
MODAL AGREGAR ACTIVO
======================================-->

<div id="modalAgregarActivo" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">
                <!-- CABEZA DEL MODAL -->
                <div class="modal-header text-bg-primary">
                    <h4 class="modal-title">Agregar activo</h4>
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
                            <input type="text" class="form-control form-control-lg" id="nuevoId_activo" name="nuevoId_activo" placeholder="Ingresar ID del activo" required>
                        </div>

                        <!-- ENTRADA PARA EL NOMBRE -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="nuevoNombre" id="nuevoNombre" placeholder="Ingresar nombre o título de la información" required>
                        </div>

                        <!-- ENTRADA PARA LA DESCRIPCIÓN -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="nuevaDescripcion" id="nuevaDescripcion" placeholder="Ingresar la descripción de la información" required>
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
                                <option value="">Selecionar medio de conservación o soporte</option>
                                <option value="Electrónico / Digital">Electrónico / Digital</option>
                                <option value="Físico">Físico</option>
                                <option value="Físico - Electrónico / Digital">Físico - Electrónico / Digital</option>
                            </select>
                        </div>

                        <!-- ENTRADA PARA EL FORMATO-->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-list"></i></span>
                            <select class="form-select form-select-lg" name="nuevoFormato" id="nuevoFormato"  required>
                                <option value="">Selecionar formato</option>
                                <option value="Base de datos">Base de datos</option>
                                <option value="Documentos gráficos">Documentos gráficos</option>
                                <option value="Físico">Físico</option>
                                <option value="Físico / Digital">Físico / Digital</option>
                                <option value="Hoja de cáculo">Hoja de cáculo</option>
                                <option value="Mixto">Mixto</option>
                                <option value="Portal">Portal</option>
                                <option value="Portal / Sistema de información">Portal / Sistema de información</option>
                                <option value="Presentación">Presentación</option>
                                <option value="Sistema de información">Sistema de información</option>
                                <option value="Sitio web">Sitio web</option>
                                <option value="Texto">Texto</option>
                                <option value="Vídeo">Vídeo</option>
                            </select>
                        </div>

                        <!-- ENTRADA PARA INFO DISPONIBLE Y PUBLICADA -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-info"></i></span>
                                    <select class="form-select form-select-lg" name="nuevaInfodisponible" id="nuevaInfodisponible" required>
                                        <option value="">Información disponible</option>
                                        <option value="Si">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-info"></i></span>
                                    <select class="form-select form-select-lg" name="nuevaInfopublicada" id="nuevaInfopublicada" required>
                                        <option value="">Información publicada</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- ENTRADA PARA LA UBICACION -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="nuevaUbicacion"  id="nuevaUbicacion" placeholder="Ingresar la ubicación" required>
                        </div>

                    </div>
                </div>

                <!-- PIE DEL MODAL -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar activo</button>
                </div>

                <?php 
                $crearActivo = new ControladorActivos();
                $crearActivo -> ctrCrearActivo();
                ?>
            </form>
        </div>
    </div>
</div>


<!--=====================================
MODAL EDITAR ACTIVO
======================================-->

<div id="modalEditarActivo" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">
                <!-- CABEZA DEL MODAL -->
                <div class="modal-header text-bg-primary">
                    <h4 class="modal-title">Editar activo</h4>
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

                        <!-- ENTRADA PARA EL ID ACTIVO-->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-code"></i></span>
                            <input type="text" class="form-control form-control-lg" id="editarId_activo" name="editarId_activo" readonly required>
                        </div>

                        <!-- ENTRADA PARA EL NOMBRE -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="editarNombre" id="editarNombre"  required>
                        </div>

                        <!-- ENTRADA PARA LA DESCRIPCIÓN -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="editarDescripcion" id="editarDescripcion"required>
                        </div>

                        <!-- ENTRADA PARA EL IDIOMA -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-language"></i></span>
                            <input type="text" class="form-control form-control-lg" name="editarIdioma" id="editarIdioma"required>
                        </div>

                        <!-- ENTRADA PARA MEDIO DE CONSERVACIÓN-->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-list"></i></span>
                            <select class="form-select form-select-lg" name="editarMedio" required>
                                <option id="editarMedio"></option>
                                <option value="Electrónico / Digital">Electrónico / Digital</option>
                                <option value="Físico">Físico</option>
                                <option value="Físico - Electrónico / Digital">Físico - Electrónico / Digital</option>
                            </select>
                        </div>

                        <!-- ENTRADA PARA EL FORMATO-->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-list"></i></span>
                            <select class="form-select form-select-lg" name="editarFormato" required>
                                <option id="editarFormato"></option>
                                <option value="Base de datos">Base de datos</option>
                                <option value="Documentos gráficos">Documentos gráficos</option>
                                <option value="Físico">Físico</option>
                                <option value="Físico / Digital">Físico / Digital</option>
                                <option value="Hoja de cáculo">Hoja de cáculo</option>
                                <option value="Mixto">Mixto</option>
                                <option value="Portal">Portal</option>
                                <option value="Portal / Sistema de información">Portal / Sistema de información</option>
                                <option value="Presentación">Presentación</option>
                                <option value="Sistema de información">Sistema de información</option>
                                <option value="Sitio web">Sitio web</option>
                                <option value="Texto">Texto</option>
                                <option value="Vídeo">Vídeo</option>
                            </select>
                        </div>

                        <!-- ENTRADA PARA INFO DISPONIBLE Y PUBLICADA -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-info"></i></span>
                                    <select class="form-select form-select-lg" name="editarInfodisponible"  required>
                                        <option id="editarInfodisponible"></option>
                                        <option value="Si">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-info"></i></span>
                                    <select class="form-select form-select-lg" name="editarInfopublicada" required>
                                        <option id="editarInfopublicada"></option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- ENTRADA PARA LA UBICACION -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="editarUbicacion"  id="editarUbicacion" required>
                        </div>

                    </div>
                </div>

                <!-- PIE DEL MODAL -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>

                <?php
                $editarActivo = new ControladorActivos();
                $editarActivo -> ctrEditarActivo();
                ?>      
            </form>
        </div>
    </div>
</div>

<?php
$eliminarActivo = new ControladorActivos();
$eliminarActivo -> ctrEliminarActivo();
?>      

