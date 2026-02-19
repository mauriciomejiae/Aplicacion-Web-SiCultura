<?php
/**
 * ==============================================
 * AJAX — Editar Activo
 * ==============================================
 * Devuelve datos de un activo específico
 * en formato JSON para el modal de edición.
 * ==============================================
 */

require_once "../controladores/activos.controlador.php";
require_once "../modelos/activos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxActivos{

	public $idActivo;

	public function ajaxEditarActivo(){

		$item = "id";
		$valor = $this->idActivo;

		$respuesta = ControladorActivos::ctrMostrarActivos($item, $valor);

		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}
}

if(isset($_POST["idActivo"])){

	$editarActivo = new AjaxActivos();
	$editarActivo->idActivo = $_POST["idActivo"];
	$editarActivo->ajaxEditarActivo();
}
