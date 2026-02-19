<?php

$item = null;
$valor = null;

$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
$totalCategorias = count($categorias);

$activos = ControladorActivos::ctrMostrarActivos($item, $valor);
$totalActivos = count($activos);

$indices = ControladorIndices::ctrMostrarIndices($item, $valor);
$totalIndices = count($indices);

$lenguas = ControladorLenguas::ctrMostrarLenguas($item, $valor);
$totalLenguas = count($lenguas);

$salas = ControladorSalas::ctrMostrarSalas($item, $valor);
$totalSalas = count($salas);

$bibliotecas = ControladorBibliotecas::ctrMostrarBibliotecas($item, $valor);
$totalBibliotecas = count($bibliotecas);


$habitantes = ControladorLenguas::ctrSumaTotalHabitantes();

$hablantes = ControladorLenguas::ctrSumaTotalHablantes();

?>



<!--=====================================
CAJA SUPERIOR CATEGORIAS
======================================-->

<div class="col-12 col-sm-6 col-md-3">

  <div class="info-box shadow-sm">

    <span class="info-box-icon text-bg-success shadow-sm"><i class="fas fa-list"></i></span>

    <div class="info-box-content">

      <span class="info-box-text">Categorías de activos</span>

      <span class="info-box-number"><?php echo number_format($totalCategorias); ?></span>

    </div>

  </div>

</div>



<!--=====================================
CAJA SUPERIOR ACTIVOS
======================================-->

<div class="col-12 col-sm-6 col-md-3">

  <div class="info-box shadow-sm">

    <span class="info-box-icon text-bg-success shadow-sm"><i class="fas fa-laptop"></i></span>

    <div class="info-box-content">

      <span class="info-box-text">Activos de información</span>

      <span class="info-box-number"><?php echo number_format($totalActivos); ?></span>

    </div>

  </div>

</div>



<!--=====================================
CAJA SUPERIOR INDICES
======================================-->

<div class="col-12 col-sm-6 col-md-3">

  <div class="info-box shadow-sm">

    <span class="info-box-icon text-bg-success shadow-sm"><i class="fas fa-chart-bar"></i></span>

    <div class="info-box-content">

      <span class="info-box-text">Índice info. clasificada</span>

      <span class="info-box-number"><?php echo number_format($totalIndices); ?></span>

    </div>

  </div>

</div>



<!--=====================================
CAJA SUPERIOR SALAS
======================================-->

<div class="col-12 col-sm-6 col-md-3">

  <div class="info-box shadow-sm">

    <span class="info-box-icon text-bg-primary shadow-sm"><i class="fas fa-film"></i></span>

    <div class="info-box-content">

      <span class="info-box-text">Salas de cine</span>

      <span class="info-box-number"><?php echo number_format($totalSalas); ?></span>

    </div>

  </div>

</div>



<!--=====================================
CAJA SUPERIOR LENGUAS NATIVAS
======================================-->


<div class="col-12 col-sm-6 col-md-3">

  <div class="info-box shadow-sm">

    <span class="info-box-icon text-bg-warning shadow-sm"><i class="fas fa-globe"></i></span>

    <div class="info-box-content">

      <span class="info-box-text">Lenguas nativas</span>

      <span class="info-box-number"><?php echo number_format($totalLenguas); ?></span>

    </div>

  </div>

</div>



<!--=====================================
CAJA SUPERIOR LENGUAS NATIVAS - HABITANTES
======================================-->

<div class="col-12 col-sm-6 col-md-3">

  <div class="info-box shadow-sm">

    <span class="info-box-icon text-bg-warning shadow-sm"><i class="fas fa-users"></i></span>

    <div class="info-box-content">

      <span class="info-box-text">Total habitantes</span>

      <span class="info-box-number"><?php echo number_format($habitantes["total"]); ?></span>

    </div>

  </div>

</div>



<!--=====================================
CAJA SUPERIOR LENGUAS NATIVAS - HABLANTES
======================================-->

<div class="col-12 col-sm-6 col-md-3">

  <div class="info-box shadow-sm">

    <span class="info-box-icon text-bg-warning shadow-sm"><i class="fas fa-microphone"></i></span>

    <div class="info-box-content">

      <span class="info-box-text">Total hablantes</span>

      <span class="info-box-number"><?php echo number_format($hablantes["total"]); ?></span>

    </div>

  </div>

</div>


<!--=====================================
CAJA SUPERIOR BIBLIOTECAS
======================================-->

<div class="col-12 col-sm-6 col-md-3">

  <div class="info-box shadow-sm">

    <span class="info-box-icon text-bg-primary shadow-sm"><i class="fas fa-book"></i></span>

    <div class="info-box-content">

      <span class="info-box-text">Bibliotecas</span>

      <span class="info-box-number"><?php echo number_format($totalBibliotecas); ?></span>

    </div>

  </div>

</div>
