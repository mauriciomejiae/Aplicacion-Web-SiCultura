<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="inicio" class="brand-link">
            <!--begin::Brand Image-->
            <i class="fas fa-flag brand-image opacity-75 shadow" style="margin-top: 5px;"></i>
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Si<b>Cultura</b></span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                <?php
                if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){
                    
                    echo '<li class="nav-item">
                            <a href="inicio" class="nav-link">
                                <i class="nav-icon fas fa-home text-primary"></i> 
                                <p>Inicio</p>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a href="lenguas" class="nav-link">
                                <i class="nav-icon fas fa-language text-primary"></i> 
                                <p>Lenguas nativas</p>
                            </a>
                          </li>

                          <li class="nav-item">
                            <a href="salas" class="nav-link">
                                <i class="nav-icon fas fa-film text-primary"></i> 
                                <p>Salas de cine</p>
                            </a>
                          </li>';
                }

                if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

                    echo '<li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-laptop text-primary"></i>
                                <p>
                                    Activos de información
                                    <i class="nav-arrow fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="categorias" class="nav-link">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>Categorias</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="activos" class="nav-link">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>Activos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="indices" class="nav-link">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>Índices</p>
                                    </a>
                                </li>
                            </ul>
                          </li>';
                }

                if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

                    echo '<li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book text-primary"></i>
                                <p>
                                    Directorio
                                    <i class="nav-arrow fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="bibliotecas" class="nav-link">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>Bibliotecas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="geoportal" class="nav-link">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>Geoportal</p>
                                    </a>
                                </li>
                            </ul>
                          </li>';
                }

                if($_SESSION["perfil"] == "Administrador"){

                    echo '<li class="nav-item">
                            <a href="usuarios" class="nav-link">
                                <i class="nav-icon fas fa-user text-primary"></i> 
                                <p>Usuarios</p>
                            </a>
                          </li>';
                }           
                ?>

            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
