<?php 
                     //****** DEFINIENDO VARIABLES DE ENTORNO ********/

// define("BASE_URL", "http://localhost/yakkar/"); //primera forma

//Produccion
// const BASE_URL = "https://managementteck.com/yakkar/";

//Local
const BASE_URL = "http://localhost/yakkarEventosv1/";


//***ZONA HORARIA COLOMBIA***/
date_default_timezone_set('America/Bogota');

//*** Variables de Conexion a BD YakkarEventos ambiente local ***/
const DB_HOST = "localhost";
const DB_NAME = "yakkareventos"; 
const DB_USER = "root"; 
const DB_PASSWORD = ""; 
const DB_CHARSET = "charset=utf8";

//*** Variables de Conexion a BD YakkarEventos ambiente produccion ***/
// const DB_HOST = "localhost";
// const DB_NAME = "u247361945_yakkar_eventos"; 
// const DB_USER = "u247361945_root"; 
// const DB_PASSWORD = "HmDa5QzM8~"; 
// const DB_CHARSET = "charset=utf8";

//** Delimitadores decimal y millar Ej. 24,1989.00 **/
const SPD = ".";
const SPM = ".";


//***SIMBOLO DE LA MONEDA ***/

const SMONEY = "$";
const COP = "COP";

//Datos envio de correo
const NOMBRE_REMITENTE = "Yakkar Eventos";
const EMAIL_REMITENTE = "no-reply@managementteck.com";

//Datos empresa Yakkar
const NOMBRE_EMPRESA = "Yakkar Eventos";
const WEB_EMPRESA = "https://www.yakkareventos.com";

?>

