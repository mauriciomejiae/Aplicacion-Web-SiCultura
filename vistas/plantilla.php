<?php
session_start();
/**
 * ==============================================
 * SiCultura v2.0 — Plantilla Principal (Layout)
 * ==============================================
 * Renderiza el layout completo de la aplicación:
 * - Si hay sesión activa: Header, Sidebar, Main, Footer
 * - Sin sesión: Página de Login
 * 
 * Carga todas las dependencias CSS/JS (AdminLTE v4,
 * Bootstrap 5, DataTables, Chart.js, SweetAlert2).
 * ==============================================
 */
?>
<!DOCTYPE html>
<html lang="es"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Aplicación Web SiCultura</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Aplicación Web SiCultura">
    <meta name="author" content="SiCultura">
    <meta name="description" content="Sistema de Información de Cultura">
    <!--end::Primary Meta Tags-->
    
    <link rel="icon" href="vistas/img/plantilla/favicon.png">

    <!--begin::Fonts-->
    <link rel="stylesheet" href="vistas/vendor/inter/inter.css">
    <!--end::Fonts-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="vistas/vendor/overlayscrollbars/styles/overlayscrollbars.min.css">
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Third Party Plugin(Bootstrap 5)-->
    <link rel="stylesheet" href="vistas/vendor/bootstrap/css/bootstrap.min.css">
    <!--end::Third Party Plugin(Bootstrap 5)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="vistas/vendor/adminlte/css/adminlte.min.css">
    <!--end::Required Plugin(AdminLTE)-->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="vistas/vendor/fontawesome/css/all.min.css">

    <!-- DataTables BS5 -->
    <link rel="stylesheet" href="vistas/vendor/datatables/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="vistas/vendor/datatables/responsive.bootstrap5.min.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="vistas/vendor/sweetalert2/sweetalert2.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Ajuste para que el footer no tape contenido si es fixed, o usar layout correcto */
    </style>
</head> <!--end::Head-->

<!--begin::Body-->
<?php
if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){
    // Logueado: Layout AdminLTE v4
    echo '<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">';
    echo '<div class="app-wrapper">';

    /*=============================================
    CABEZOTE (Header)
    =============================================*/
    include "modulos/cabezote.php";

    /*=============================================
    MENU (Sidebar)
    =============================================*/
    include "modulos/menu.php";

    /*=============================================
    CONTENIDO (Main)
    =============================================*/
    echo '<main class="app-main">'; // AdminLTE v4 main container

    if(isset($_GET["ruta"])){

        if($_GET["ruta"] == "inicio" ||
           $_GET["ruta"] == "usuarios" ||
           $_GET["ruta"] == "categorias" ||
           $_GET["ruta"] == "activos" ||
           $_GET["ruta"] == "indices" ||
           $_GET["ruta"] == "lenguas" ||
           $_GET["ruta"] == "salas" ||
           $_GET["ruta"] == "bibliotecas" ||
           $_GET["ruta"] == "geoportal" ||
           $_GET["ruta"] == "reportes" ||
           $_GET["ruta"] == "salir"){

            include "modulos/".$_GET["ruta"].".php";

        }else{
            include "modulos/404.php";
        }

    }else{
        include "modulos/inicio.php";
    }

    echo '</main>'; // end app-main

    /*=============================================
    FOOTER
    =============================================*/
    include "modulos/footer.php";

    echo '</div>'; // end app-wrapper

} else {
    // No logueado: Login Page
    echo '<body class="login-page bg-body-secondary">';
    include "modulos/login.php";
}
?>

<!--begin::Script-->
<!--begin::Third Party Plugin(OverlayScrollbars)-->
<script src="vistas/vendor/overlayscrollbars/overlayscrollbars.browser.es5.min.js"></script>
<!--end::Third Party Plugin(OverlayScrollbars)-->

<!--begin::Required Plugin(Popperjs for Bootstrap 5)-->
<script src="vistas/vendor/popperjs/popper.min.js"></script>
<!--end::Required Plugin(Popperjs for Bootstrap 5)-->

<!--begin::Third Party Plugin(Bootstrap 5)-->
<script src="vistas/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--end::Third Party Plugin(Bootstrap 5)-->

<!--begin::Required Plugin(AdminLTE)-->
<script src="vistas/vendor/adminlte/js/adminlte.min.js"></script>
<!--end::Required Plugin(AdminLTE)-->

<!-- DataTables & Plugins (CDN Standardized to avoid version conflicts) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

<!-- SweetAlert2 -->
<script src="vistas/vendor/sweetalert2/sweetalert2.all.min.js"></script>

<!-- ChartJS -->
<script src="vistas/vendor/chartjs/chart.umd.min.js"></script>

<!-- InputMask -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>

<!-- Scripts propios -->
<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/categorias.js"></script>
<script src="vistas/js/activos.js"></script>
<script src="vistas/js/indices.js"></script>
<script src="vistas/js/lenguas.js"></script>
<script src="vistas/js/salas.js"></script>
<script src="vistas/js/bibliotecas.js"></script>

<!-- Configuración de OverlayScrollbars (AdminLTE v4) -->
<script>
    const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
    const Default = {
        scrollbarTheme: "os-theme-light",
        scrollbarAutoHide: "leave",
        scrollbarClickScroll: true,
    };
    document.addEventListener("DOMContentLoaded", function() {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (
            sidebarWrapper &&
            typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
        ) {
            OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                scrollbars: {
                    theme: Default.scrollbarTheme,
                    autoHide: Default.scrollbarAutoHide,
                    clickScroll: Default.scrollbarClickScroll,
                },
            });
        }
    });
</script>

</body><!--end::Body-->
</html>

  