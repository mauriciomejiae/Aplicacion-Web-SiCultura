<?php
/**
 * ==============================================
 * AJAX — Editar Sala
 * ==============================================
 * Devuelve datos de una sala de cine específica
 * en formato JSON para el modal de edición.
 * ==============================================
 */

require_once "../controladores/salas.controlador.php";
require_once "../modelos/salas.modelo.php";

class AjaxSalas{

	public $idSala;

	public function ajaxEditarSala(){

		$item = "id";
		$valor = $this->idSala;

		$respuesta = ControladorSalas::ctrMostrarSalas($item, $valor);

		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}
}

if(isset($_POST["idSala"])){

	$sala = new AjaxSalas();
	$sala->idSala = $_POST["idSala"];
	$sala->ajaxEditarSala();
}