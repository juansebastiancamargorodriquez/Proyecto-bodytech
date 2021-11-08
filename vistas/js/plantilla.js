/*=============================================
SideBar Menu
=============================================*/

$('.sidebar-menu').tree()

/*=============================================
Data Table
=============================================*/

$(".tablas").DataTable({

	"language": {

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "BUSCAR :",
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


	},
	lengthMenu: [
      [10, 20, 50, 100, 500, -1], [10, 20, 50, 100, 500, 'Todos']
  ],
  dom:'Bfrtip',
  buttons:[
  		   {extend:'pageLength', text: "Cantidad Registros"},
  		   {extend:'excel', text:'EXCEL' }
  		   ]
  		  
});


$(".tablaProduc").DataTable({

  info: true,
  paging: true,
  ordering: true,
  searching: true,
  pageLength: -1,
  fixedHeader: true,
  scrollY: "65vh",
  scrollX: "100%",
  language: {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
  },
  
  lengthMenu: [
      [10, 20, 50, 100, 500, -1], [10, 20, 50, 100, 500, 'Todos']
  ],
  dom:'Bfrtip',
  buttons:[{extend:'pageLength', text: "Cantidad Registros"},
  		   {extend:'copy', text:'Copiar'},
  		   {extend:'fa-file-excel-o', text:'EXCEL'},
  		   {extend:'csv', text:'Csv'}]


});


/*=============================================
Data Table
=============================================*/

$(".tab").DataTable({

	"language": {

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "BUSCAR :",
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


	},
	lengthMenu: [
      [10, 20, 50, 100, 500, -1], [10, 20, 50, 100, 500, 'Todos']
  ],
  dom:'Bfrtip',
  buttons:[
  		   {extend:'pageLength', text: "Cantidad Registros"} 		 
  		   ]
  		  
});


$(".tablaProduc").DataTable({

  info: true,
  paging: true,
  ordering: true,
  searching: true,
  pageLength: -1,
  fixedHeader: true,
  scrollY: "65vh",
  scrollX: "100%",
  language: {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
  },
  
  lengthMenu: [
      [10, 20, 50, 100, 500, -1], [10, 20, 50, 100, 500, 'Todos']
  ],
  dom:'Bfrtip',
  buttons:[{extend:'pageLength', text: "Cantidad Registros"},
  		   {extend:'copy', text:'Copiar'},
  		   {extend:'excel', text:'EXCEL'},
  		   {extend:'csv', text:'Csv'}]


});

/*==================================================
=            BOTON MODAL EDITAR USUARIO            =
==================================================*/

$(".btnEditarUsuarioPropio").click(function(){

	var Usuario= $(this).attr("Usuario");

	var datos = new FormData();
	datos.append("Usuario", Usuario);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarNombreUsuario").val(respuesta["nombre"]);
			$("#editarUsuarioPropio").val(respuesta["usuario"]);
			$("#editarCorreoPropio").val(respuesta["mail"]);
			$("#passwordActualUsuario").val(respuesta["password"]);
			$("#passwordActualUsuario").val(respuesta["password"]);
			$("#editarPerfilPropio").val(respuesta["perfil"]);


		}

	});

})

/*=====  END OF BOTON MODAL EDITAR USUARIO  ======*/


/*=============================================
CORRECCIÓN BOTONERAS OCULTAS BACKEND	
=============================================*/

if(window.matchMedia("(max-width:767px)").matches){
	
	$("body").removeClass('sidebar-collapse');

}else{

	$("body").addClass('sidebar-collapse');
}

