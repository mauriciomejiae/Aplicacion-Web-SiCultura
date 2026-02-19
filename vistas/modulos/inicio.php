<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Tablero</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tablero</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <?php
            include __DIR__ . "/inicio/cajas-superiores.php";
            ?>
        </div>
        <!-- /.row -->

        <!-- GRÁFICOS -->
        <div class="row">
            <div class="col-12">
                <?php 
                if(file_exists(__DIR__ . "/inicio/graficos.php")){
                    include __DIR__ . "/inicio/graficos.php"; 
                } else {
                    echo "<!-- Error: Archivo graficos.php no encontrado en " . __DIR__ . "/inicio/graficos.php -->";
                }
                ?>
            </div>
        </div>

        <!-- Main row -->
        <div class="row">
            <div class="col-lg-6 connectedSortable">
                <?php include "inicio/activos-recientes.php"; ?>
            </div>

            <div class="col-lg-6 connectedSortable">
                <?php include "inicio/lenguas-recientes.php"; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 connectedSortable">
                <?php include "inicio/indices-recientes.php"; ?>
            </div>

            <div class="col-lg-6 connectedSortable">
                <?php include "inicio/salas-recientes.php"; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 connectedSortable">
                <?php include "inicio/bibliotecas-recientes.php"; ?>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</div>
