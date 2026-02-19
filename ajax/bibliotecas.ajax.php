<?php
/**
 * ==============================================
 * AJAX — Editar Biblioteca
 * ==============================================
 * Devuelve datos de una biblioteca específica
 * en formato JSON para el modal de edición.
 * ==============================================
 */

require_once "../controladores/bibliotecas.controlador.php";
require_once "../modelos/bibliotecas.modelo.php";

class AjaxBibliotecas{

	public $idBiblioteca;

	public function ajaxEditarBiblioteca(){

		$item = "id";
		$valor = $this->idBiblioteca;

		$respuesta = ControladorBibliotecas::ctrMostrarBibliotecas($item, $valor);

		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}
}

if(isset($_POST["idBiblioteca"])){

	$editarBiblioteca = new AjaxBibliotecas();
	$editarBiblioteca->idBiblioteca = $_POST["idBiblioteca"];
	$editarBiblioteca->ajaxEditarBiblioteca();
}
