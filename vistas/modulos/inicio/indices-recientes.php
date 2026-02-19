<?php
$item = null;
$valor = null;
$indices = ControladorIndices::ctrMostrarIndices($item, $valor);
?>

<div class="card card-success card-outline mb-4">
    <div class="card-header">
        <h3 class="card-title">Índices recientes</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-lte-toggle="card-remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    
    <div class="card-body p-0">
        <ul class="products-list product-list-in-card pl-2 pr-2">
            <?php
            for($i = 0; $i < min(3, count($indices)); $i++){
                echo '<li class="item">
                        <div class="product-img">
                            <span class="badge text-bg-secondary float-start p-2">'.$indices[$i]["id"].'</span>
                        </div>
                        <div class="product-info ms-4">
                            <a href="indices" class="product-title">'.$indices[$i]["nombre"].' 
                                <span class="badge text-bg-success float-end">'.$indices[$i]["medio"].'</span> 
                            </a>
                            <span class="product-description">'.$indices[$i]["id_indice"].'</span>
                        </div>
                      </li>';
            }
            ?>
        </ul>
    </div>
    
    <div class="card-footer text-center">
        <a href="indices" class="uppercase">Ver todos</a>
    </div>
</div>
