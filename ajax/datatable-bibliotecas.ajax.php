<?php
/**
 * ==============================================
 * AJAX — DataTable Bibliotecas
 * ==============================================
 * Genera JSON optimizado para DataTables.
 * Usa json_encode() nativo en lugar de
 * concatenación manual para mejor rendimiento.
 * ==============================================
 */

require_once "../controladores/bibliotecas.controlador.php";
require_once "../modelos/bibliotecas.modelo.php";

class TablaBibliotecas{

	public function mostrarTablaBibliotecas(){

		$item = null;
    	$valor = null;

  		$bibliotecas = ControladorBibliotecas::ctrMostrarBibliotecas($item, $valor);	

		$data = array();

		for($i = 0; $i < count($bibliotecas); $i++){

			// Botones según perfil
			if(isset($_GET["perfilBibliotecas"]) && $_GET["perfilBibliotecas"] == "Especial"){

				$botones = "<div class='btn-group'><button class='btn btn-warning btnEditarBiblioteca' idBiblioteca='".$bibliotecas[$i]["id"]."' data-toggle='modal' data-target='#modalEditarBiblioteca'><i class='fa fa-pencil'></i></button></div>"; 

			}else{

				$botones = "<div class='btn-group'><button class='btn btn-warning btnEditarBiblioteca' idBiblioteca='".$bibliotecas[$i]["id"]."' data-toggle='modal' data-target='#modalEditarBiblioteca'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarBiblioteca' idBiblioteca='".$bibliotecas[$i]["id"]."' codigo='".$bibliotecas[$i]["codigo"]."'><i class='fa fa-times'></i></button></div>"; 

			}

			$data[] = array(
				($i+1),
				$bibliotecas[$i]["codigo"],
				$bibliotecas[$i]["departamento"],
				$bibliotecas[$i]["municipio"],
				$bibliotecas[$i]["centropoblado"],
				$bibliotecas[$i]["naturaleza"],
				$bibliotecas[$i]["tipo"],
				$bibliotecas[$i]["nombre"],
				$bibliotecas[$i]["direccion"],
				$bibliotecas[$i]["barrio"],
				$bibliotecas[$i]["telefonos"],
				$bibliotecas[$i]["extension"],
				$bibliotecas[$i]["fax"],
				$bibliotecas[$i]["pagina"],
				$bibliotecas[$i]["estado"],
				$bibliotecas[$i]["georeferencia"],
				$bibliotecas[$i]["fecha"],
				$botones
			);
		}

		header('Content-Type: application/json; charset=utf-8');
		echo json_encode(array("data" => $data), JSON_UNESCAPED_UNICODE);
	}
}

$activarBibliotecas = new TablaBibliotecas();
$activarBibliotecas->mostrarTablaBibliotecas();
