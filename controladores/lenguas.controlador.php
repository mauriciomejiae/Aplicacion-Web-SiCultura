<?php
/**
 * ==============================================
 * Controlador de Lenguas Nativas
 * ==============================================
 * CRUD y estadísticas de lenguas indígenas.
 * Métodos estáticos para integración con vistas.
 * ==============================================
 */

class ControladorLenguas{

	/*=============================================
	CREAR LENGUAS
	=============================================*/

	static public function ctrCrearLengua(){

		if(isset($_POST["nuevoNombre"])){

			if(preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"]) &&
			   preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaFamilia"]) &&
			   preg_match('/^[0-9]+$/', $_POST["nuevoHabitantes"]) &&
			   preg_match('/^[0-9]+$/', $_POST["nuevoHablantes"])){

			   	$tabla = "lenguas";

			   	$datos = array("nombre"=>$_POST["nuevoNombre"],
					           "descripcion"=>$_POST["nuevaDescripcion"],
					           "departamento"=>$_POST["nuevoDepartamento"],
					           "familia"=>$_POST["nuevaFamilia"],
					           "habitantes"=>$_POST["nuevoHabitantes"],
					           "hablantes"=>$_POST["nuevoHablantes"],
					           "vitalidad"=>$_POST["nuevaVitalidad"]);

			   	$respuesta = ModeloLenguas::mdlIngresarLengua($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El registro de la lengua ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "lenguas";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El registro de la lengua no puede ir vacío o llevar carácteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "lenguas";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR LENGUAS
	=============================================*/

	static public function ctrMostrarLenguas($item, $valor){

		$tabla = "lenguas";

		$respuesta = ModeloLenguas::mdlMostrarLenguas($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR LENGUA
	=============================================*/

	static public function ctrEditarLengua(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"]) &&
			   preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"]) &&
			   preg_match('/^[a-zA-Z-ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarFamilia"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editarHabitantes"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editarHablantes"])){

			   	$tabla = "lenguas";

			   	$datos = array("id"=>$_POST["idLengua"],
			   		           "nombre"=>$_POST["editarNombre"],
					           "descripcion"=>$_POST["editarDescripcion"],
					           "departamento"=>$_POST["editarDepartamento"],
					           "familia"=>$_POST["editarFamilia"],
					           "habitantes"=>$_POST["editarHabitantes"],
					           "hablantes"=>$_POST["editarHablantes"],
					           "vitalidad"=>$_POST["editarVitalidad"]);

			   	$respuesta = ModeloLenguas::mdlEditarLengua($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El registro de la lengua ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "lenguas";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El registro de la lengua no puede ir vacío o llevar carácteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "lenguas";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	ELIMINAR LENGUA
	=============================================*/

	static public function ctrEliminarLengua(){

		if(isset($_GET["idLengua"])){

			$tabla ="lenguas";
			$datos = $_GET["idLengua"];

			$respuesta = ModeloLenguas::mdlEliminarLengua($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El registro de la lengua ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "lenguas";

								}
							})

				</script>';

			}		

		}

	}

	/*=============================================
	SUMA TOTAL DE HABITANTES
	=============================================*/

	static public function ctrSumaTotalHabitantes(){

		$tabla = "lenguas";

		$respuesta = ModeloLenguas::mdlSumaTotalHabitantes($tabla);

		return $respuesta;

	}


    /*=============================================
	SUMA TOTAL DE HABLANTES
	=============================================*/

	static public function ctrSumaTotalHablantes(){

		$tabla = "lenguas";

		$respuesta = ModeloLenguas::mdlSumaTotalHablantes($tabla);

		return $respuesta;

	}

}

