/*=============================================
EDITAR LENGUA
=============================================*/
$(".tablas").on("click", ".btnEditarLengua", function(){

	var idLengua = $(this).attr("idLengua");

	var datos = new FormData();
    datos.append("idLengua", idLengua);

    $.ajax({

      url:"ajax/lenguas.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

      	$("#editarDepartamento").val(respuesta["id"]);
      	$("#editarDepartamento").html(respuesta["departamento"]);

      	$("#editarVitalidad").val(respuesta["id"]);
      	$("#editarVitalidad").html(respuesta["vitalidad"]);
      
        $("#idLengua").val(respuesta["id"]);
        $("#editarNombre").val(respuesta["nombre"]);
        $("#editarDescripcion").val(respuesta["descripcion"]);
        $("#editarDepartamento").val(respuesta["departamento"]);
        $("#editarFamilia").val(respuesta["familia"]);
        $("#editarHabitantes").val(respuesta["habitantes"]);
        $("#editarHablantes").val(respuesta["hablantes"]);
        $("#editarVitalidad").val(respuesta["vitalidad"]);
	  }

  	})

})

/*=============================================
ELIMINAR LENGUA
=============================================*/
$(".tablas").on("click", ".btnEliminarLengua", function(){

	var idLengua = $(this).attr("idLengua");
	
	Swal.fire({
        title: '¿Está seguro de borrar el registro de la lengua?',
        text: "¡Si no lo está puede cancelar la acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=lenguas&idLengua="+idLengua;
        }

  })

})