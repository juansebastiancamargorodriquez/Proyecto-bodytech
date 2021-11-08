<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=127.0.0.1:3306;dbname=gimnasio",
			            "root",
			            "");

		$link->exec("set names utf8_spanish_ci");

		return $link;

	}

}