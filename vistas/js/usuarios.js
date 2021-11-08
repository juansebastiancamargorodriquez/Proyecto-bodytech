/*=============================================
EDITAR USUARIO
=============================================*/
$(document).on("click", ".btnEditarUsuario", function(){

	var idUsuario = $(this).attr("idUsuario");
	
	var datos = new FormData();
	datos.append("idUsuario", idUsuario);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			
			$("#editarNombre").val(respuesta["nombre"]);
			$("#editarUsuario").val(respuesta["usuario"]);
			$("#editarCorreo").val(respuesta["mail"]);	
			$("#editarPerfil").val(respuesta["perfil"]);
			if(respuesta["perfil"] == "Administrador"){$("#editarPerfil").val('1');}else if(respuesta["perfil"] == "Usuario"){$("#editarPerfil").val('2');};
			$("#passwordActual").val(respuesta["password"]);

		}

	});

})

/*=============================================
ACTIVAR USUARIO
=============================================*/
$(document).on("click", ".btnActivar", function(){

	var idUsuario = $(this).attr("idUsuario");
	var estadoUsuario = $(this).attr("estadoUsuario");

	var datos = new FormData();
 	datos.append("activarId", idUsuario);
  	datos.append("activarUsuario", estadoUsuario);

  	$.ajax({

	  url:"ajax/usuarios.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

      	if(window.matchMedia("(max-width:767px)").matches){
		
      		 swal({
		      	title: "El usuario ha sido actualizado",
		      	type: "success",
		      	confirmButtonText: "¡Cerrar!"
		    	}).then(function(result) {
		        
		        	if (result.value) {

		        	window.location = "usuarios";

		        }

		      });


		}
      }

  	})

  	if(estadoUsuario == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoUsuario',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoUsuario',0);

  	}

})

/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoUsuario").change(function(){

	$(".alert").remove();

	var usuario = $(this).val();

	var datos = new FormData();
	datos.append("validarUsuario", usuario);
  
  
	 $.ajax({
	    url:"ajax/usuarios.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

	    		$("#nuevoUsuario").val("");

	    	}

	    }

	})
})

/*=============================================
ELIMINAR USUARIO
=============================================*/
$(document).on("click", ".btnEliminarUsuario", function(){

  var idUsuario = $(this).attr("idUsuario");
  var fotoUsuario = $(this).attr("fotoUsuario");
  var usuario = $(this).attr("usuario");

  swal({
    title: '¿Está seguro de borrar el usuario?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar usuario!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;

    }

  })

})

/*===========================================
=            USUARIOS PRODUCCION            =
===========================================*/

/*$('#perfilPro').on('change', function(){ 
	var val = $('#perfilPro').val();

	
		$.ajax({
		  type: 'POST',
		  url: 'ajax/lista_usuarios_perfiles.php',
		  data: {'id': val}
		})
		.done(function(tipoglosa){
		  $('#UsuarioPro').html(tipoglosa)
		})
		.fail(function(){
		  alert('Hubo un errror al los perfiles');
		})



	        

})*/

/*================================
=            Perfiles            =
================================*/

$(".btnAgregaPerfiles").click(function(){
  var datos = new Array();
  var descripcion = new Array();

  var ul = document.getElementById("listaPerfiles");

  let item = Array.prototype.slice.call(document.getElementsByClassName("item"), 0);
  
  for(element of item){
    console.log(element);
    element.remove();
  } 

  $("input:checkbox:checked").each(function() {
    if($(this).val()!='on'){
      datos.push($(this).val());
      descripcion.push($(this).attr("perfilDescrip"));
    }
  });
  $("#nuevoPerfil").val(datos);
 	/* Listado Automatico */
    var t, tt;
    productList = descripcion;
    
   
    productList.forEach(renderProductList);

    function renderProductList(element, index, arr) {
        var li = document.createElement('li');
        li.setAttribute('class','item');
        
        ul.appendChild(li);
        
        t = document.createTextNode(element);
        
        li.innerHTML=li.innerHTML + element;
    }

	if (descripcion.length===0){
		document.getElementById("mensajePerfiles").style.display="block";
		document.getElementById("perfilesSelec").style.display="none";
	}else{
		document.getElementById("perfilesSelec").style.display="block";
		document.getElementById("mensajePerfiles").style.display="none";
	}

   
  console.log(descripcion); 
  console.log(descripcion.length); 
 

})

/*=====  End of Perfiles  ======*/







