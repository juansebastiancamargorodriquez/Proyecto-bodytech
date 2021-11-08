<?php

class ControladorVehiculo{

	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearVehiculo(){

		if(isset($_POST["nuevonombre"])){
			
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevonombre"])&&
			   preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["nuevomodelo"])){ 
			   	

				$tabla = "vehiculo";

				$datos = array("nombre" => $_POST["nuevonombre"],
					           "modelo" => $_POST["nuevomodelo"],
					           "marca" => $_POST['nuevomarca'],
					           "placa"=> $_POST["nuevaplaca"],  
					           "tiempo" => $_POST["nuevotiempo"]);					       		
	
				$respuesta = ModeloVehiculo::mdlIngresarVehiculo($tabla, $datos);
				
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El vehiculo ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "cronograma";

						}

					});
				

					</script>';


				}


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El vehiculo no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "cronograma";

						}

					});
				

				</script>';

			}


		}


	}



	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarVehiculo($item, $valor){

		$tabla = "vehiculo";

		$respuesta = ModeloVehiculo::mdlMostrarVehiculo($tabla,$item,$valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/
	static public function ctrEditarVehiculo(){

		if(isset($_POST["editarvehiculos"])){
			
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnombre"])){ 
			   	

				$tabla = "vehiculo";

				$datos = array("nombre" => $_POST["editarnombre"],
					           "modelo" => $_POST["editarmodelo"],
					           "marca" => $_POST['editarmarca'],
					           "placa"=> $_POST["editarplaca"],  
					           "tiempo" => $_POST["editartiempo"],
					       		"valor_total"=>$_POST["editarpago"],
					       		"id_vehiculo"=>$_POST["editarvehiculos"]);     		
	
					           

				$respuesta = ModeloVehiculo::mdlEditarVehiculo($tabla, $datos);
		
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El vehiculo ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "cronograma";

						}

					});
				

					</script>';


				}


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El vehiculo no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "cronograma";

						}

					});
				

				</script>';

			}


		}


	}


	/*=============================================
	BORRAR VEHICULO
	=============================================*/

	static public function ctrBorrarVehiculo(){

		if(isset($_GET["id_vehiculo"])){

			$tabla ="vehiculo";

			$datos = $_GET["id_vehiculo"];

			$respuesta = ModeloVehiculo::mdlBorrarVehiculo($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El vehiculo ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "cronograma";

								}
							})

				</script>';

			}		

		}
	}

	/*=============================================
	MOSTRAR USUARIO PROPIO
	=============================================*/

	static public function ctrMostrarUsuariosPropio($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarUsuariosPropio($tabla, $item, $valor);

		return $respuesta;
	}


}	


