<nav class="app-header navbar navbar-expand bg-body">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>
        <!--end::Start Navbar Links-->

        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
            
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <?php
                    if($_SESSION["foto"] != ""){
                        echo '<img src="'.$_SESSION["foto"].'" class="user-image rounded-circle shadow" alt="User Image">';
                    }else{
                        echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image rounded-circle shadow" alt="User Image">';
                    }
                    ?>
                    <span class="d-none d-md-inline"><?php echo $_SESSION["nombre"]; ?></span>
                </a>
                
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <!--begin::User Image-->
                    <li class="user-header text-bg-primary">
                        <?php
                        if($_SESSION["foto"] != ""){
                            echo '<img src="'.$_SESSION["foto"].'" class="rounded-circle shadow" alt="User Image">';
                        }else{
                            echo '<img src="vistas/img/usuarios/default/anonymous.png" class="rounded-circle shadow" alt="User Image">';
                        }
                        ?>
                        <p>
                            <?php echo $_SESSION["nombre"]; ?>
                            <small><?php echo $_SESSION["perfil"]; ?></small>
                        </p>
                    </li>
                    <!--end::User Image-->
                    
                    <!--begin::Menu Footer-->
                    <li class="user-footer">
                        <a href="salir" class="btn btn-default btn-flat float-end">Salir</a>
                    </li>
                    <!--end::Menu Footer-->
                </ul>
            </li>
            <!--end::User Menu Dropdown-->

        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>
