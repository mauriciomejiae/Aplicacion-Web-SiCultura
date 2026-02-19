/*=============================================
EDITAR SALA
=============================================*/
$(".tablas").on("click", ".btnEditarSala", function(){

	var idSala = $(this).attr("idSala");

	var datos = new FormData();
    datos.append("idSala", idSala);

    $.ajax({

      url:"ajax/salas.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

      	$("#editarDepartamento").val(respuesta["id"]);
      	$("#editarDepartamento").html(respuesta["departamento"]);

        $("#idSala").val(respuesta["id"])
        $("#editarDepartamento").val(respuesta["departamento"]);
        $("#editarCiudad").val(respuesta["ciudad"]);
        $("#editarExhibidor").val(respuesta["exhibidor"]);
        $("#editarNombre").val(respuesta["nombre"]);
        $("#editarDireccion").val(respuesta["direccion"]);
	  }

  	})

})

/*=============================================
ELIMINAR SALA
=============================================*/
$(".tablas").on("click", ".btnEliminarSala", function(){

	var idSala = $(this).attr("idSala");
	
	Swal.fire({
        title: '¿Está seguro de borrar el registro de la sala de cine?',
        text: "¡Si no lo está puede cancelar la acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=salas&idSala="+idSala;
        }

  })

})