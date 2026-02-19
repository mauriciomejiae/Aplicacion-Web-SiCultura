<?php
/**
 * ==============================================
 * AJAX — Usuarios
 * ==============================================
 * Endpoints AJAX para la gestión de usuarios:
 * - Editar: Devuelve datos de un usuario
 * - Activar: Cambia el estado de un usuario
 * - Validar: Verifica si un usuario ya existe
 * ==============================================
 */

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	public $idUsuario;

	public function ajaxEditarUsuario(){

		$item = "id";
		$valor = $this->idUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}

	/*=============================================
	ACTIVAR / DESACTIVAR USUARIO
	=============================================*/

	public $activarUsuario;
	public $activarId;

	public function ajaxActivarUsuario(){

		$tabla = "usuarios";

		$item1 = "estado";
		$valor1 = $this->activarUsuario;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);
	}

	/*=============================================
	VALIDAR USUARIO ÚNICO
	=============================================*/

	public $validarUsuario;

	public function ajaxValidarUsuario(){

		$item = "usuario";
		$valor = $this->validarUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}
}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idUsuario"])){

	$editar = new AjaxUsuarios();
	$editar->idUsuario = $_POST["idUsuario"];
	$editar->ajaxEditarUsuario();
}

/*=============================================
ACTIVAR USUARIO
=============================================*/
if(isset($_POST["activarUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario->activarUsuario = $_POST["activarUsuario"];
	$activarUsuario->activarId = $_POST["activarId"];
	$activarUsuario->ajaxActivarUsuario();
}

/*=============================================
VALIDAR USUARIO ÚNICO
=============================================*/
if(isset($_POST["validarUsuario"])){

	$valUsuario = new AjaxUsuarios();
	$valUsuario->validarUsuario = $_POST["validarUsuario"];
	$valUsuario->ajaxValidarUsuario();
}