<?php
/**
 * ==============================================
 * Aplicación Web SiCultura v2.0
 * ==============================================
 * Punto de entrada principal (Front Controller)
 * 
 * Carga controladores y modelos del patrón MVC,
 * luego delega la renderización a ControladorPlantilla.
 * 
 * @author   Mauricio Mejía Estévez
 * @version  2.0
 * @link     https://github.com/mauriciomejiae/Aplicacion-Web-SiCultura
 * ==============================================
 */

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/activos.controlador.php";
require_once "controladores/indices.controlador.php";
require_once "controladores/lenguas.controlador.php";
require_once "controladores/salas.controlador.php";
require_once "controladores/bibliotecas.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/activos.modelo.php";
require_once "modelos/indices.modelo.php";
require_once "modelos/lenguas.modelo.php";
require_once "modelos/salas.modelo.php";
require_once "modelos/bibliotecas.modelo.php";




$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();