/*=============================================
EDITAR USUARIO
=============================================*/

$(document).on("click", ".btnFactura", function(){

	var idVehiculoEditar = $(this).attr("id_vehiculo");

	var datos = new FormData();
	datos.append("idVehiculoEditar", idVehiculoEditar);

	$.ajax({

		url:"ajax/cronograma.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			
			$("#editarvehiculos").val(respuesta["id_vehiculo"]);
			$("#editarnombre").val(respuesta["nombre"]);
			$("#editarmodelo").val(respuesta["modelo"]);	
			$("#editarmarca").val(respuesta["marca"]);
			$("#editarplaca").val(respuesta["placa"]);
			$("#editartiempo").val(respuesta["tiempo"]);
			$("#editarpago").val(respuesta["valor_total"]);

		}

	});

})


/*=============================================
ELIMINAR VEHICULO
=============================================*/

$(document).on("click", ".btnEliminarVehiculo", function(){
  
  var nombre = $(this).attr("nombre");
  var placa = $(this).attr("placa");
  var id_vehiculo = $(this).attr("id_vehiculo");

  swal({
    title: '¿ Está seguro de borrar el vehiculo ?',
    text: "¡ Si no lo está puede cancelar la accíón !",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, deseo borrar el registro!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=cronograma&nombre="+nombre+"&placa="+placa+"&id_vehiculo="+id_vehiculo;

    }


  })

})

