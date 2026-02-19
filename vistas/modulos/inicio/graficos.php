<?php

$categorias = ControladorCategorias::ctrMostrarCategorias(null, null);
$activos = ControladorActivos::ctrMostrarActivos(null, null);
$lenguas = ControladorLenguas::ctrMostrarLenguas(null, null);
$bibliotecas = ControladorBibliotecas::ctrMostrarBibliotecas(null, null);
$salas = ControladorSalas::ctrMostrarSalas(null, null);

// --- Lógica: Activos por Categoría ---
$activosPorCat = array();
foreach($activos as $a) {
    $id = $a["id_categoria"];
    if(!isset($activosPorCat[$id])) $activosPorCat[$id] = 0;
    $activosPorCat[$id]++;
}
$catLabels = [];
$catData = [];
$catColors = [];
// Colores AdminLTE/Bootstrap
$colorsList = ['#0d6efd', '#198754', '#ffc107', '#dc3545', '#0dcaf0', '#6610f2', '#fd7e14', '#20c997', '#d63384', '#6c757d'];
$i=0;
foreach($categorias as $c) {
    if(isset($activosPorCat[$c["id"]])) {
        $catLabels[] = $c["categoria"];
        $catData[] = $activosPorCat[$c["id"]];
        $catColors[] = $colorsList[$i % count($colorsList)];
        $i++;
    }
}

// --- Lógica: Lenguas por Vitalidad ---
$vitalidadCounts = array();
foreach($lenguas as $l) {
    $v = $l["vitalidad"];
    if($v == "") $v = "Sin especificar";
    if(!isset($vitalidadCounts[$v])) $vitalidadCounts[$v] = 0;
    $vitalidadCounts[$v]++;
}
$vitLabels = array_keys($vitalidadCounts);
$vitData = array_values($vitalidadCounts);

// --- Lógica: Bibliotecas por Estado ---
$bibCounts = array();
foreach($bibliotecas as $b) {
    $e = $b["estado"];
    if($e == "") $e = "Desconocido";
    if(!isset($bibCounts[$e])) $bibCounts[$e] = 0;
    $bibCounts[$e]++;
}
$bibLabels = array_keys($bibCounts);
$bibData = array_values($bibCounts);

// --- Lógica: Salas por Departamento (Top 5) ---
$salaCounts = array();
foreach($salas as $s) {
    $d = $s["departamento"];
    if(!isset($salaCounts[$d])) $salaCounts[$d] = 0;
    $salaCounts[$d]++;
}
arsort($salaCounts);
$topSalaCounts = array_slice($salaCounts, 0, 5);
$salaLabels = array_keys($topSalaCounts);
$salaData = array_values($topSalaCounts);

?>

<div class="row">
    <!-- Gráfico 1: Activos por Categoría -->
    <div class="col-md-6">
        <div class="card card-primary card-outline mb-4">
            <div class="card-header">
                <h3 class="card-title">Activos por Categoría</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-lte-toggle="card-remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="chartActivos" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>

    <!-- Gráfico 2: Lenguas por Vitalidad -->
    <div class="col-md-6">
        <div class="card card-warning card-outline mb-4">
            <div class="card-header">
                <h3 class="card-title">Lenguas por Vitalidad</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-lte-toggle="card-remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="chartLenguas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Gráfico 3: Bibliotecas por Estado -->
    <div class="col-md-6">
        <div class="card card-success card-outline mb-4">
            <div class="card-header">
                <h3 class="card-title">Bibliotecas por Estado</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-lte-toggle="card-remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="chartBibliotecas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>

    <!-- Gráfico 4: Salas por Departamento -->
    <div class="col-md-6">
        <div class="card card-info card-outline mb-4">
            <div class="card-header">
                <h3 class="card-title">Salas por Departamento (Top 5)</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-lte-toggle="card-remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="chartSalas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // --- Chart 1: Activos ---
    var ctxActivos = document.getElementById('chartActivos').getContext('2d');
    new Chart(ctxActivos, {
        type: 'doughnut',
        data: {
            labels: <?php echo json_encode($catLabels); ?>,
            datasets: [{
                data: <?php echo json_encode($catData); ?>,
                backgroundColor: <?php echo json_encode($catColors); ?>,
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
        }
    });

    // --- Chart 2: Lenguas ---
    var ctxLenguas = document.getElementById('chartLenguas').getContext('2d');
    new Chart(ctxLenguas, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($vitLabels); ?>,
            datasets: [{
                data: <?php echo json_encode($vitData); ?>,
                backgroundColor: ['#dc3545', '#ffc107', '#28a745', '#17a2b8', '#6c757d'],
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
        }
    });

    // --- Chart 3: Bibliotecas ---
    var ctxBib = document.getElementById('chartBibliotecas').getContext('2d');
    new Chart(ctxBib, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($bibLabels); ?>,
            datasets: [{
                label: 'Cantidad',
                data: <?php echo json_encode($bibData); ?>,
                backgroundColor: '#28a745',
                borderColor: '#28a745',
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // --- Chart 4: Salas ---
    var ctxSalas = document.getElementById('chartSalas').getContext('2d');
    new Chart(ctxSalas, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($salaLabels); ?>,
            datasets: [{
                label: 'Salas',
                data: <?php echo json_encode($salaData); ?>,
                backgroundColor: '#17a2b8',
                borderColor: '#17a2b8',
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            indexAxis: 'y', // Horizontal bars for names
            scales: {
                x: { beginAtZero: true }
            }
        }
    });
});
</script>
