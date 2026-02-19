<?php
/**
 * ==============================================
 * AJAX — DataTable Activos
 * ==============================================
 * Genera JSON optimizado para DataTables.
 * Precarga categorías en un mapa para evitar
 * consultas N+1 (una consulta por cada fila).
 * ==============================================
 */

require_once "../controladores/activos.controlador.php";
require_once "../modelos/activos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class TablaActivos{

	public function mostrarTablaActivos(){

		$item = null;
    	$valor = null;

  		$activos = ControladorActivos::ctrMostrarActivos($item, $valor);

		// Precarga de categorías para evitar consultas N+1
		$todasCategorias = ControladorCategorias::ctrMostrarCategorias(null, null);
		$mapaCategorias = array();
		foreach($todasCategorias as $cat){
			$mapaCategorias[$cat["id"]] = $cat["categoria"];
		}

		$data = array();

		for($i = 0; $i < count($activos); $i++){

			// Nombre de categoría desde mapa (sin consulta adicional)
			$nombreCategoria = isset($mapaCategorias[$activos[$i]["id_categoria"]]) 
				? $mapaCategorias[$activos[$i]["id_categoria"]] 
				: "Sin categoría";

			// Botones según perfil
  			if(isset($_GET["perfilActivos"]) && $_GET["perfilActivos"] == "Especial"){

			  	$botones = "<div class='btn-group'><button class='btn btn-warning btnEditarActivo' idActivo='".$activos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarActivo'><i class='fa fa-pencil'></i></button></div>";

			}else{

			  	$botones = "<div class='btn-group'><button class='btn btn-warning btnEditarActivo' idActivo='".$activos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarActivo'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarActivo' idActivo='".$activos[$i]["id"]."' id_activo='".$activos[$i]["id_activo"]."'><i class='fa fa-times'></i></button></div>"; 
			}

			$data[] = array(
				($i+1),
				$activos[$i]["id_activo"],
				$nombreCategoria,
				$activos[$i]["nombre"],
				$activos[$i]["descripcion"],
				$activos[$i]["idioma"],
				$activos[$i]["medio"],
				$activos[$i]["formato"],
				$activos[$i]["infodisponible"],
				$activos[$i]["infopublicada"],
				$activos[$i]["ubicacion"],
				$activos[$i]["fecha"],
				$botones
			);
		}

		header('Content-Type: application/json; charset=utf-8');
		echo json_encode(array("data" => $data), JSON_UNESCAPED_UNICODE);
	}
}

$activarActivos = new TablaActivos();
$activarActivos->mostrarTablaActivos();
