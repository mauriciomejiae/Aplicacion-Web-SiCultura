/*=============================================
CARGAR LA TABLA DINÁMICA INDICES
=============================================*/

// $.ajax({

//   url: "ajax/datatable-indices.ajax.php",
//   success:function(respuesta){
    
//     console.log("respuesta", respuesta);

//   }

// })


var perfiIndices = $("#perfilIndices").val();
// console.log("perfilIndices", perfiIndices);


$('.tablaIndices').DataTable( {
    "ajax": "ajax/datatable-indices.ajax.php?perfilIndices="+perfiIndices,
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
EDITAR INDICE
=============================================*/

$(".tablaIndices tbody").on("click", "button.btnEditarIndice", function(){

	var idIndice = $(this).attr("idIndice");
	
	var datos = new FormData();
    datos.append("idIndice", idIndice);

     $.ajax({

      url:"ajax/indices.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){


      	$("#editarMedio").val(respuesta["id"]);
      	$("#editarMedio").html(respuesta["medio"]);

      	$("#editarExcepcion").val(respuesta["id"]);
      	$("#editarExcepcion").html(respuesta["excepcion"]); 


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

           $("#editarId_indice").val(respuesta["id_indice"]);

           $("#editarNombre").val(respuesta["nombre"]);

           $("#editarIdioma").val(respuesta["idioma"]);

           $("#editarMedio").val(respuesta["medio"]);

           $("#editarFecha_generacion").val(respuesta["fecha_generacion"]);

           $("#editarResponsable1").val(respuesta["responsable1"]);

           $("#editarResponsable2").val(respuesta["responsable2"]);

           $("#editarObjeto").val(respuesta["objeto"]);

           $("#editarFundamento").val(respuesta["fundamento"]);

           $("#editarEspecifica").val(respuesta["especifica"]);

           $("#editarExcepcion").val(respuesta["excepcion"]);

           $("#editarFecha_calificacion").val(respuesta["fecha_calificacion"]);

           $("#editarPlazo").val(respuesta["plazo"]);

      }

  })

})


/*=============================================
ELIMINAR INDICE
=============================================*/

$(".tablaIndices tbody").on("click", "button.btnEliminarIndice", function(){

	var idIndice = $(this).attr("idIndice");
	var id_indice = $(this).attr("id_indice");

	Swal.fire({

		title: '¿Está seguro de eliminar el índice de información?',
		text: "¡Si no lo está puede cancelar la accíón!",
		icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, eliminar índice!'
        }).then(function(result){
        if (result.value) {

        	window.location = "index.php?ruta=indices&idIndice="+idIndice+"&id_indice="+id_indice;

        }


	})

})


