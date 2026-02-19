/*=============================================
CARGAR LA TABLA DINÁMICA DE BIBLIOTECAS
=============================================*/

// $.ajax({

//   url: "ajax/datatable-bibliotecas.ajax.php",
//   success:function(respuesta){
    
//     console.log("respuesta", respuesta);

//   }

// })


var perfilBibliotecas = $("#perfilBibliotecas").val();
// console.log("perfilBibliotecas", perfilBibliotecas);


$('.tablaBibliotecas').DataTable( {
    "ajax": "ajax/datatable-bibliotecas.ajax.php?perfilBibliotecas="+perfilBibliotecas,
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
EDITAR BIBLIOTECA
=============================================*/

$(".tablaBibliotecas tbody").on("click", "button.btnEditarBiblioteca", function(){

	var idBiblioteca = $(this).attr("idBiblioteca");
	
	var datos = new FormData();
    datos.append("idBiblioteca", idBiblioteca);

     $.ajax({

      url:"ajax/bibliotecas.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
        console.log("respuesta", respuesta);
        

       $("#editarDepartamento").val(respuesta["id"]);
       $("#editarDepartamento").html(respuesta["departamento"]);

       $("#editarNaturaleza").val(respuesta["id"]);
       $("#editarNaturaleza").html(respuesta["naturaleza"]); 

       $("#editarTipo").val(respuesta["id"]);
       $("#editarTipo").html(respuesta["tipo"]); 

       $("#editarEstado").val(respuesta["id"]);
       $("#editarEstado").html(respuesta["estado"]); 


       $("#editarCodigo").val(respuesta["codigo"]);
       $("#editarDepartamento").val(respuesta["departamento"]);
       $("#editarMunicipio").val(respuesta["municipio"]);
       $("#editarCentropoblado").val(respuesta["centropoblado"]);
       $("#editarNaturaleza").val(respuesta["naturaleza"]);
       $("#editarTipo").val(respuesta["tipo"]);
       $("#editarNombre").val(respuesta["nombre"]);
       $("#editarDireccion").val(respuesta["direccion"]);
       $("#editarBarrio").val(respuesta["barrio"]);
       $("#editarTelefonos").val(respuesta["telefonos"]);
       $("#editarExtension").val(respuesta["extension"]);
       $("#editarFax").val(respuesta["fax"]);
       $("#editarPagina").val(respuesta["pagina"]);
       $("#editarEstado").val(respuesta["estado"]);;
       $("#editarGeoreferencia").val(respuesta["georeferencia"]);

      }

  })

})


/*=============================================
ELIMINAR BIBLIOTECA
=============================================*/

$(".tablaBibliotecas tbody").on("click", "button.btnEliminarBiblioteca", function(){

	var idBiblioteca = $(this).attr("idBiblioteca");
	var codigo = $(this).attr("codigo");

	Swal.fire({

		title: '¿Está seguro de eliminar la biblioteca?',
		text: "¡Si no lo está puede cancelar la accíón!",
		icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, eliminar biblioteca!'
        }).then(function(result){
        if (result.value) {

        	window.location = "index.php?ruta=bibliotecas&idBiblioteca="+idBiblioteca+"&codigo="+codigo;

        }


	})

})


