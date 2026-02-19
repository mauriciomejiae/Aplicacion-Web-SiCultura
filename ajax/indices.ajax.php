<?php
/**
 * ==============================================
 * AJAX — Editar Índice
 * ==============================================
 * Devuelve datos de un índice específico
 * en formato JSON para el modal de edición.
 * ==============================================
 */

require_once "../controladores/indices.controlador.php";
require_once "../modelos/indices.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxIndices{

	public $idIndice;

	public function ajaxEditarIndice(){

		$item = "id";
		$valor = $this->idIndice;

		$respuesta = ControladorIndices::ctrMostrarIndices($item, $valor);

		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}
}

if(isset($_POST["idIndice"])){

	$editarIndice = new AjaxIndices();
	$editarIndice->idIndice = $_POST["idIndice"];
	$editarIndice->ajaxEditarIndice();
}
