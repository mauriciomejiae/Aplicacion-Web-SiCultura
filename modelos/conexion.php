<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=sicultura",
			            "root",
			            "Colombia.2026");

		$link->exec("set names utf8");

		return $link;

	}

}

