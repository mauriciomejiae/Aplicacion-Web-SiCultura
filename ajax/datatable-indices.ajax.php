<?php
/**
 * ==============================================
 * AJAX — DataTable Índices
 * ==============================================
 * Genera JSON optimizado para DataTables.
 * Precarga categorías en un mapa para evitar
 * consultas N+1 (una consulta por cada fila).
 * ==============================================
 */

require_once "../controladores/indices.controlador.php";
require_once "../modelos/indices.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class TablaIndices{

	public function mostrarTablaIndices(){

		$item = null;
    	$valor = null;

  		$indices = ControladorIndices::ctrMostrarIndices($item, $valor);

		// Precarga de categorías para evitar consultas N+1
		$todasCategorias = ControladorCategorias::ctrMostrarCategorias(null, null);
		$mapaCategorias = array();
		foreach($todasCategorias as $cat){
			$mapaCategorias[$cat["id"]] = $cat["categoria"];
		}

		$data = array();

		for($i = 0; $i < count($indices); $i++){

			// Nombre de categoría desde mapa (sin consulta adicional)
			$nombreCategoria = isset($mapaCategorias[$indices[$i]["id_categoria"]]) 
				? $mapaCategorias[$indices[$i]["id_categoria"]] 
				: "Sin categoría";

			// Botones según perfil
  			if(isset($_GET["perfilIndices"]) && $_GET["perfilIndices"] == "Especial"){

  				$botones = "<div class='btn-group'><button class='btn btn-warning btnEditarIndice' idIndice='".$indices[$i]["id"]."' data-toggle='modal' data-target='#modalEditarIndice'><i class='fa fa-pencil'></i></button></div>"; 

  			}else{

  				$botones = "<div class='btn-group'><button class='btn btn-warning btnEditarIndice' idIndice='".$indices[$i]["id"]."' data-toggle='modal' data-target='#modalEditarIndice'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarIndice' idIndice='".$indices[$i]["id"]."' id_indice='".$indices[$i]["id_indice"]."'><i class='fa fa-times'></i></button></div>"; 

  			}

			$data[] = array(
				($i+1),
				$indices[$i]["id_indice"],
				$nombreCategoria,
				$indices[$i]["nombre"],
				$indices[$i]["idioma"],
				$indices[$i]["medio"],
				$indices[$i]["fecha_generacion"],
				$indices[$i]["responsable1"],
				$indices[$i]["responsable2"],
				$indices[$i]["objeto"],
				$indices[$i]["fundamento"],
				$indices[$i]["especifica"],
				$indices[$i]["excepcion"],
				$indices[$i]["fecha_calificacion"],
				$indices[$i]["plazo"],
				$indices[$i]["fecha"],
				$botones
			);
		}

		header('Content-Type: application/json; charset=utf-8');
		echo json_encode(array("data" => $data), JSON_UNESCAPED_UNICODE);
	}
}

$activarIndices = new TablaIndices();
$activarIndices->mostrarTablaIndices();
