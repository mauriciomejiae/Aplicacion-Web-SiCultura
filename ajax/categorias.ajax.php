<?php
/**
 * ==============================================
 * AJAX — Editar Categoría
 * ==============================================
 * Devuelve datos de una categoría específica
 * en formato JSON para el modal de edición.
 * ==============================================
 */

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias{

	public $idCategoria;

	public function ajaxEditarCategoria(){

		$item = "id";
		$valor = $this->idCategoria;

		$respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}
}

if(isset($_POST["idCategoria"])){

	$categoria = new AjaxCategorias();
	$categoria->idCategoria = $_POST["idCategoria"];
	$categoria->ajaxEditarCategoria();
}
