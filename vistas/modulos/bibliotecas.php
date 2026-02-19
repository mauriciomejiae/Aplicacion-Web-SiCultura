<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Administrar directorio de la red nacional de bibliotecas públicas</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                    <li class="breadcrumb-item active">Bibliotecas</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarBiblioteca">
                    <i class="fas fa-plus-circle"></i> Agregar biblioteca
                </button>

                <!-- DESCARGAR REPORTE EXCEL -->
                <?php
                if($_SESSION["perfil"] == "Administrador"){
                    echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte" class="btn btn-success ms-2"><i class="fas fa-download"></i> Exportar a Excel</a>';
                }
                ?>
            </div>
            
            <div class="card-body">
                <table class="table table-bordered table-striped dt-responsive tablaBibliotecas" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Código DANE</th>
                            <th>Departamento</th>
                            <th>Municipio</th>
                            <th>Centro poblado</th>
                            <th>Naturaleza de la biblioteca</th>
                            <th>Tipo de biblioteca</th>
                            <th>Nombre de la biblioteca</th>
                            <th>Dirección de la biblioteca</th>
                            <th>Barrio</th>
                            <th>Télefonos de contacto</th>
                            <th>Extensión</th>
                            <th>Fax</th>
                            <th>Página web de la biblioteca</th>
                            <th>Estado de la biblioteca</th>
                            <th>Georeferencia</th>
                            <th>Fecha agregado al sistema</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
                <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilBibliotecas">
            </div>
        </div>
    </div>
</div>

<!--=====================================
MODAL AGREGAR BIBLIOTECA
======================================-->

<div id="modalAgregarBiblioteca" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="post">

                <!-- CABEZA DEL MODAL -->
                <div class="modal-header text-bg-primary">
                    <h4 class="modal-title">Agregar biblioteca</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- CUERPO DEL MODAL -->
                <div class="modal-body">
                    <div class="card-body">

                        <!-- ENTRADA PARA EL CODIGO DANE -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-code"></i></span>
                            <input type="number" min="0" class="form-control form-control-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar el Código DANE" required>
                        </div>

                        <!-- ENTRADA PARA EL DEPARTAMENTO-->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-list"></i></span>
                            <select class="form-select form-select-lg" name="nuevoDepartamento" id="nuevoDepartamento" required>
                                <option value="">-Selecionar departamento-</option>
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

                        <!-- ENTRADA PARA EL MUNICIPIO -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="nuevoMunicipio" id="nuevoMunicipio" placeholder="Ingresar municipio" required>
                        </div>

                        <!-- ENTRADA PARA EL CENTRO POBLADO -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="nuevoCentropoblado" id="nuevoCentropoblado" placeholder="Ingresar el centro poblado" required>
                        </div>

                        <!-- ENTRADA PARA LA NATURALEZA DE LA BIBLIOTECA -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                    <select class="form-select form-select-lg" name="nuevaNaturaleza" id="nuevaNaturaleza" required>
                                        <option value="">-Seleccione naturaleza-</option>
                                        <option value="COMUNITARIA">COMUNITARIA</option>
                                        <option value="ESTATAL">ESTATAL</option>
                                        <option value="PRIVADA">PRIVADA</option>
                                    </select>
                                </div>
                            </div>

                            <!-- ENTRADA PARA EL TIPO DE BIBIOTECA-->
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span> 
                                    <select class="form-select form-select-lg" name="nuevoTipo" id="nuevoTipo" required>
                                        <option value="">-Seleccione tipo-</option>
                                        <option value="CONSEJO COMUNITARIO (TCCN)">CONSEJO COMUNITARIO (TCCN)</option>
                                        <option value="DEPARTAMENTAL">DEPARTAMENTAL</option>
                                        <option value="MUNICIPAL">MUNICIPAL</option>
                                        <option value="RESGUARDO INDÍGENA">RESGUARDO INDÍGENA</option>
                                        <option value="RURAL">RURAL</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- ENTRADA PARA EL NOMBRE DE LA BIBLIOTECA -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="nuevoNombre" id="nuevoNombre" placeholder="Ingresar el nombre de la biblioteca" required>
                        </div>

                        <!-- ENTRADA PARA LA DIRECCIÓN -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="nuevaDireccion" id="nuevaDireccion" placeholder="Ingresar la dirección" required>
                        </div>

                        <!-- ENTRADA PARA EL BARRIO -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="nuevoBarrio" id="nuevoBarrio" placeholder="Ingresar el barrio" required>
                        </div>

                        <!-- ENTRADA PARA TELEFONOS DE CONTACTO -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="text" class="form-control form-control-lg" name="nuevoTelefonos" id="nuevoTelefonos" placeholder="Ingresar télefonos de contacto" required>
                        </div>

                        <!-- ENTRADA PARA LA EXTENSION -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-asterisk"></i></span>
                                    <input type="number" min="0" class="form-control form-control-lg" name="nuevaExtension" id="nuevaExtension" placeholder="Ingresar la extensión">
                                </div>
                            </div>
                            
                            <!-- ENTRADA PARA EL FAX-->
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-fax"></i></span>
                                    <input type="number" min="0" class="form-control form-control-lg" name="nuevoFax" id="nuevoFax" placeholder="Ingresar fax">
                                </div>
                            </div>
                        </div>

                        <!-- ENTRADA PARA LA PAGINA WEB DE LA BIBLIOTECA -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-link"></i></span>
                            <input type="text" class="form-control form-control-lg" name="nuevaPagina" id="nuevaPagina" placeholder="Ingresar página web de la biblioteca">
                        </div>

                        <!-- ENTRADA PARA EL ESTADO-->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-check"></i></span>
                            <select class="form-select form-select-lg" name="nuevoEstado" id="nuevoEstado"  required>
                                <option value="">-Selecionar estado-</option>
                                <option value="ABIERTA">ABIERTA</option>
                                <option value="CERRADA TEMPORALMENTE">CERRADA TEMPORALMENTE</option>
                            </select>
                        </div>

                        <!-- ENTRADA PARA LA GEOREFERENCIA -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="nuevaGeoreferencia"  id="nuevaGeoreferencia" placeholder="Ingresar georeferencia" required>
                        </div>

                    </div>
                </div>

                <!-- PIE DEL MODAL -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar biblioteca</button>
                </div>

            </form>
            <?php 
            $crearBiblioteca = new ControladorBibliotecas();
            $crearBiblioteca -> ctrCrearBiblioteca();
            ?> 
        </div>
    </div>
</div>

<!--=====================================
MODAL EDITAR BIBLIOTECA
======================================-->

<div id="modalEditarBiblioteca" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="post">

                <!-- CABEZA DEL MODAL -->
                <div class="modal-header text-bg-primary">
                    <h4 class="modal-title">Editar biblioteca</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- CUERPO DEL MODAL -->
                <div class="modal-body">
                    <div class="card-body">

                        <!-- ENTRADA PARA EL CODIGO DANE -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-code"></i></span>
                            <input type="number" min="0" class="form-control form-control-lg" id="editarCodigo" name="editarCodigo" readonly required>
                        </div>

                        <!-- ENTRADA PARA EL DEPARTAMENTO-->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-list"></i></span>
                            <select class="form-select form-select-lg" name="editarDepartamento" required>
                                <option id="editarDepartamento"></option>
                                <option value="">-Selecionar departamento-</option>
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

                        <!-- ENTRADA PARA EL MUNICIPIO -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="editarMunicipio" id="editarMunicipio" placeholder="Ingresar municipio" required>
                        </div>

                        <!-- ENTRADA PARA EL CENTRO POBLADO -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="editarCentropoblado" id="editarCentropoblado" placeholder="Ingresar el centro poblado" required>
                        </div>

                        <!-- ENTRADA PARA LA NATURALEZA DE LA BIBLIOTECA -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                    <select class="form-select form-select-lg" name="editarNaturaleza" required>
                                        <option id="editarNaturaleza"></option>
                                        <option value="">-Seleccione naturaleza-</option>
                                        <option value="COMUNITARIA">COMUNITARIA</option>
                                        <option value="ESTATAL">ESTATAL</option>
                                        <option value="PRIVADA">PRIVADA</option>
                                    </select>
                                </div>
                            </div>
                            <!-- ENTRADA PARA EL TIPO DE BIBIOTECA-->
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span> 
                                    <select class="form-select form-select-lg" name="editarTipo" required>
                                        <option id="editarTipo"></option>
                                        <option value="">-Seleccione tipo-</option>
                                        <option value="CONSEJO COMUNITARIO (TCCN)">CONSEJO COMUNITARIO (TCCN)</option>
                                        <option value="DEPARTAMENTAL">DEPARTAMENTAL</option>
                                        <option value="MUNICIPAL">MUNICIPAL</option>
                                        <option value="RESGUARDO INDÍGENA">RESGUARDO INDÍGENA</option>
                                        <option value="RURAL">RURAL</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- ENTRADA PARA EL NOMBRE DE LA BIBLIOTECA -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="editarNombre" id="editarNombre" placeholder="Ingresar el nombre de la biblioteca" required>
                        </div>

                        <!-- ENTRADA PARA LA DIRECCIÓN -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="editarDireccion" id="editarDireccion" placeholder="Ingresar la dirección" required>
                        </div>

                        <!-- ENTRADA PARA EL BARRIO -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="editarBarrio" id="editarBarrio" placeholder="Ingresar el barrio" required>
                        </div>

                        <!-- ENTRADA PARA TELEFONOS DE CONTACTO -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="text" class="form-control form-control-lg" name="editarTelefonos" id="editarTelefonos" placeholder="Ingresar télefonos de contacto" required>
                        </div>

                        <!-- ENTRADA PARA LA EXTENSION -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-asterisk"></i></span>
                                    <input type="number" min="0" class="form-control form-control-lg" name="editarExtension" id="editarExtension" placeholder="Ingresar la extensión">
                                </div>
                            </div>

                            <!-- ENTRADA PARA EL FAX-->
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-fax"></i></span>
                                    <input type="number" min="0" class="form-control form-control-lg" name="editarFax" id="editarFax" placeholder="Ingresar fax">
                                </div>
                            </div>
                        </div>

                        <!-- ENTRADA PARA LA PAGINA WEB DE LA BIBLIOTECA -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-link"></i></span>
                            <input type="text" class="form-control form-control-lg" name="editarPagina" id="editarPagina" placeholder="Ingresar página web de la biblioteca">
                        </div>

                        <!-- ENTRADA PARA EL ESTADO-->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-check"></i></span>
                            <select class="form-select form-select-lg" name="editarEstado" required>
                                <option  id="editarEstado"></option>
                                <option value="">-Selecionar estado-</option>
                                <option value="ABIERTA">ABIERTA</option>
                                <option value="CERRADA TEMPORALMENTE">CERRADA TEMPORALMENTE</option>
                            </select>
                        </div>

                        <!-- ENTRADA PARA LA GEOREFERENCIA -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            <input type="text" class="form-control form-control-lg" name="editarGeoreferencia"  id="editarGeoreferencia" placeholder="Ingresar georeferencia" required>
                        </div>

                    </div>
                </div>

                <!-- PIE DEL MODAL -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar biblioteca</button>
                </div>

            </form>
            <?php 
            $editarBiblioteca = new ControladorBibliotecas();
            $editarBiblioteca -> ctreditarBiblioteca();
            ?>
        </div>
    </div>
</div>

<?php
$eliminarBiblioteca = new ControladorBibliotecas();
$eliminarBiblioteca -> ctrEliminarBiblioteca();
?>
