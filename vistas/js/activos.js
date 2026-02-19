/*=============================================
CARGAR LA TABLA DINÁMICA DE ACTIVOS
=============================================*/

// $.ajax({

//   url: "ajax/datatable-activos.ajax.php",
//   success:function(respuesta){
    
//     console.log("respuesta", respuesta);

//   }

// })


var perfilActivos = $("#perfilActivos").val();
// console.log("perfilActivos", perfilActivos);


$('.tablaActivos').DataTable( {
    "ajax": "ajax/datatable-activos.ajax.php?perfilActivos="+perfilActivos,
    "deferRender": true,
	"retrieve": true,
	"processing": true,
    "pageLength": 5,
    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],
	"language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

} );

/*=============================================
EDITAR ACTIVO
=============================================*/

$(".tablaActivos tbody").on("click", "button.btnEditarActivo", function(){

	var idActivo = $(this).attr("idActivo");
	
	var datos = new FormData();
    datos.append("idActivo", idActivo);

     $.ajax({

      url:"ajax/activos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

      	$("#editarMedio").val(respuesta["id"]);
      	$("#editarMedio").html(respuesta["medio"]);

      	$("#editarFormato").val(respuesta["id"]);
      	$("#editarFormato").html(respuesta["formato"]);


      	$("#editarInfodisponible").val(respuesta["id"]);
      	$("#editarInfodisponible").html(respuesta["infodisponible"]);

      	$("#editarInfopublicada").val(respuesta["id"]);
      	$("#editarInfopublicada").html(respuesta["infopublicada"]);

          var datosCategoria = new FormData();
          datosCategoria.append("idCategoria",respuesta["id_categoria"]);

           $.ajax({

              url:"ajax/categorias.ajax.php",
              method: "POST",
              data: datosCategoria,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){
                  
                  $("#editarCategoria").val(respuesta["id"]);
                  $("#editarCategoria").html(respuesta["categoria"]);

              }

          })

           $("#editarId_activo").val(respuesta["id_activo"]);

           $("#editarNombre").val(respuesta["nombre"]);

           $("#editarDescripcion").val(respuesta["descripcion"]);

           $("#editarIdioma").val(respuesta["idioma"]);

           $("#editarMedio").val(respuesta["medio"]);

           $("#editarFormato").val(respuesta["formato"]);

           $("#editarInfodisponible").val(respuesta["infodisponible"]);

           $("#editarInfopublicada").val(respuesta["infopublicada"]);

           $("#editarUbicacion").val(respuesta["ubicacion"]);

      }

  })

})


/*=============================================
ELIMINAR ACTIVO
=============================================*/

$(".tablaActivos tbody").on("click", "button.btnEliminarActivo", function(){

	var idActivo = $(this).attr("idActivo");
	var id_activo = $(this).attr("id_activo");

	Swal.fire({

		title: '¿Está seguro de eliminar el activo?',
		text: "¡Si no lo está puede cancelar la accíón!",
		icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, eliminar activo!'
        }).then(function(result){
        if (result.value) {

        	window.location = "index.php?ruta=activos&idActivo="+idActivo+"&id_activo="+id_activo;

        }


	})

})
