<?php
/**
 * ==============================================
 * AJAX — Editar Lengua
 * ==============================================
 * Devuelve datos de una lengua específica
 * en formato JSON para el modal de edición.
 * ==============================================
 */

require_once "../controladores/lenguas.controlador.php";
require_once "../modelos/lenguas.modelo.php";

class AjaxLenguas{

	public $idLengua;

	public function ajaxEditarLengua(){

		$item = "id";
		$valor = $this->idLengua;

		$respuesta = ControladorLenguas::ctrMostrarLenguas($item, $valor);

		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}
}

if(isset($_POST["idLengua"])){

	$lengua = new AjaxLenguas();
	$lengua->idLengua = $_POST["idLengua"];
	$lengua->ajaxEditarLengua();
}