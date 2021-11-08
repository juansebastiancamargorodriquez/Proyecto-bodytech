<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item,$valor, PDO::PARAM_STR ,PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function mdlIngresarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, usuario, password, perfil, mail) VALUES (:nombre, :usuario, :password, :perfil, :mail)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":mail", $datos["mail"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		

		$idPerfil = explode(",", $datos["perfil"]);

		foreach ($idPerfil as $value) {
			$addPerfil = Conexion::conectar()->prepare("INSERT INTO usuarios_permisos(usuario, id_perfil) VALUES ('{$datos["usuario"]}', '$value')");
			$addPerfil->execute();
		}

				

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}


	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function mdlEditarUsuario($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, perfil = :perfil,  mail= :mail WHERE usuario = :usuario");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":mail", $datos["mail"], PDO::PARAM_STR);
		$stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);		
		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function mdlBorrarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

	static public function mdlPerfilesUsuario($tabla, $respuesta){

		$stmt = Conexion::conectar()->prepare("SELECT  usuarios_perfiles.perfil FROM $tabla INNER JOIN usuarios_permisos ON usuarios.usuario = usuarios_permisos.usuario INNER JOIN usuarios_perfiles ON usuarios_permisos.id_perfil = usuarios_perfiles.id_perfil WHERE usuarios.usuario = '$respuesta' and estado = '1' GROUP BY usuarios_perfiles.perfil");


		$stmt -> bindParam(":usuario", $respuesta, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlSubPerfilesUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("SELECT usuarios_permisos.usuario,usuarios_perfiles.perfil,usuarios_perfiles.descripcion AS `descripcion perfil`,usuarios_subperfiles.sub_perfil,usuarios_subperfiles.descripcion,usuarios_subperfiles.estado FROM $tabla INNER JOIN usuarios_perfiles ON usuarios_permisos.id_perfil=usuarios_perfiles.id_perfil INNER JOIN usuarios_subperfiles ON usuarios_permisos.id_subperfil=usuarios_subperfiles.id_subperfil WHERE usuario='$datos' AND usuarios_subperfiles.estado='1' GROUP BY sub_perfil");

		

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlSesionUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("SELECT * from $tabla where usuario='$datos'");

		$stmt -> execute();

		$resultado=$stmt -> fetchAll();

		if(sizeof($resultado)>0){

			return 'Loggeado';

			$stmt -> close();

			$stmt = null;

		} else {

			return 'No Loggeado';

			$stmt -> close();

			$stmt = null;

		}

	}

	static public function mdlactivarSesion($tabla, $datos){

	$stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuario='$datos'");

		$stmt->execute();

		$stmt = null;

	}

	static public function mdleliminarSesion($tabla, $datos){

		$stmt= Conexion::conectar()->prepare("DELETE FROM $tabla WHERE usuario='$datos'");

		$stmt->execute();

		$stmt = null;


	}

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuariosPropio($tabla, $item, $valor){


		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR USUARIO PROPIO
	=============================================*/

	static public function mdlEditarUsuarioPropio($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, mail = :mail  WHERE usuario = :usuario");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":mail", $datos["mail"], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
	

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlMostrarPerfiles($tabla){


		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE perfil !='Administrador';");

		$stmt -> execute();

		return $stmt -> fetchAll();		

		$stmt -> close();

		$stmt = null;

	}


}