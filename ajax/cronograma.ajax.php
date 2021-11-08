<?php

require_once "../controladores/cronograma.controlador.php";
require_once "../modelos/cronograma.modelo.php";

class AjaxCronograma{

	/*=============================================
	EDITAR VEHICULOS
	=============================================*/	

	public $idVehiculoEditar;

	public function ajaxEditarVehiculos(){

		$item = "id_vehiculo";

		$valor = $this->idVehiculoEditar;

		$respuesta = ControladorVehiculo::ctrMostrarVehiculo($item,$valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	ACTIVAR VEHICULO
	=============================================*/	

	public $activarvehiculo;
	public $activarId;


	public function ajaxActivarVehiculo(){

		$tabla = "vehiculo";

		$item1 = "estado";
		$valor1 = $this->activarvehiculo;

		$item2 = "id_vehiculo";
		$valor2 = $this->activarId;

		$respuesta = ModeloVehiculo::mdlActualizarVehiculo($tabla, $item1, $valor1, $item2, $valor2);

	}

	/*=============================================
	VALIDAR NO REPETIR PLACA DEL VEHICULO
	=============================================*/	

	public $ValidarPlaca;

	public function ajaxValidarPlaca(){

		$item = "vehiculo";

		$valor = $this->ValidarPlaca;

		$respuesta = ControladorVehiculo::ctrMostrarvehiculo($item, $valor);

		echo json_encode($respuesta);

	}
}
/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idVehiculoEditar"])){

	$editar = new AjaxCronograma();
	$editar -> idVehiculoEditar = $_POST["idVehiculoEditar"];
	$editar -> ajaxEditarVehiculos();

}



/*=============================================
ACTIVAR VEHICULO
=============================================*/	

if(isset($_POST["activarvehiculo"])){

	$activar = new AjaxCronograma();
	$activar -> activarvehiculo = $_POST["activarvehiculo"];
	$activar -> activarId = $_POST["activarId"];
	$activar -> ajaxActivarVehiculo();

}

/*=============================================
VALIDAR NO REPETIR PLACA
=============================================*/

if(isset( $_POST["ValidarPlaca"])){

	$valo = new AjaxCronograma();
	$valo -> validarUsuario = $_POST["ValidarPlaca"];
	$valo -> ajaxEditarVehiculos();

}
