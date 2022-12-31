<?php

/*** Retornar url del proyecto ***/
function base_url()
{
    return BASE_URL;
}
/*** Devolver la ruta base URL+ assets***/
function media()
{
    return BASE_URL."Assets/";
}
function headerAdmin($data="")
{
    $view_header = "Views/Template/header_admin.php";
    require_once ($view_header);
}
function headerLogin($data="")
{
    $view_headerLogin = "Views/Template/header_login.php";
    require_once ($view_headerLogin);
}
function footerAdmin($data="")
{
    $view_footerAdmin = "Views/Template/footer_admin.php";
    require_once ($view_footerAdmin);
}
function footer($data="")
{
    $view_footer = "Views/Template/footer.php";
    require_once ($view_footer);
}
/*** Mostrar informacion formateada***/
function dep($data)
{
    $format = print_r('<pre>');
    $format .= print_r($data);
    $format .= print_r('</pre>');
    return $format;
}
function getModal(string $nameModal, $data)
{
    $view_modal = "Views/Template/Modals/{$nameModal}.php";
    require_once $view_modal;
}
 //TODO: Envio de correo
function sendEmail($data, $template)
{
    $asunto = $data['asunto'];
    $emailDestino = $data['email'];
    $empresa = NOMBRE_REMITENTE;
    $remitente = EMAIL_REMITENTE;
    //TODO: Envio de correo
    $de ="MIME-Version: 1.0\r\n";
    $de .= "Content-type: text/html; charset=UTF-8\r\n";
    $de .= "From: {$empresa} <{$remitente}>\r\n";
    ob_start(); //TODO: Cargar en memoria un archivo
    require_once("Views/Template/Email/".$template.".php");
    $mensaje = ob_get_clean(); //TODO archivo que carga el bufer lo almacenara $mensaje
    $send = mail($emailDestino, $asunto, $mensaje, $de); //TODO: Funcion que envia correos
    return $send;
}
function getPermisos(int $idmodulo)
{
    require_once ("Models/PermisosModel.php");
    $objPermisos = new PermisosModel();
    $idrol = $_SESSION['userData']['idrol'];
    $arrPermisos = $objPermisos->permisosModulo($idrol);
    $permisos = '';
    $permisoMod = '';

    if (count($arrPermisos) > 0) {
        $permisos = $arrPermisos;
        $permisoMod = isset($arrPermisos[$idmodulo]) ? $arrPermisos[$idmodulo] : "";
    }
    $_SESSION['permisos'] = $permisos;
    $_SESSION['permisoMod'] = $permisoMod;
}
/*** Elimina exceso de espacios entre palabras ***/ 
/** Evitar Inyecciones**/
function strClean($strCadena)
{
    $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena); //TODO: Limpiar el exceso de espacios entre palabras
    $string = trim($string); //TODO: Elimina espacios en blanco al inicio y al final.
    $string = stripslashes($string); //TODO: Elimina las \ invertidas
    $string = str_ireplace("<script>","",$string);//TODO: retira las etiquetas <script> 
    $string = str_ireplace("</script>","",$string);//TODO: retira las etiquetas <script> 
    $string = str_ireplace("<script src>","",$string);//TODO: retira las etiquetas <script> 
    $string = str_ireplace("<script type=>","",$string);//TODO: retira las etiquetas <script> 
    $string = str_ireplace("SELECT * FROM","",$string);//TODO: retira los querys de tipo SQL 
    $string = str_ireplace("DELETE FROM","",$string);//TODO: retira los querys de tipo SQL 
    $string = str_ireplace("INSERT INTO","",$string);//TODO: retira los querys de tipo SQL 
    $string = str_ireplace("SELECT COUNT(*) FROM","",$string);//TODO: retira los querys de tipo SQL 
    $string = str_ireplace("DROP TABLE","",$string);//TODO: retira los querys de tipo SQL 
    $string = str_ireplace("OR '1'='1","",$string);
    $string = str_ireplace('OR "1"="1"',"",$string);
    $string = str_ireplace('OR ´1´=´1´',"",$string);
    $string = str_ireplace("IS NULL; --","",$string);
    $string = str_ireplace("IS NULL; --","",$string);
    $string = str_ireplace("LIKE '","",$string);
    $string = str_ireplace('LIKE "',"",$string);
    $string = str_ireplace("LIKE ´","",$string);
    $string = str_ireplace("OR 'a'='a","",$string);
    $string = str_ireplace('OR "a"="a',"",$string);
    $string = str_ireplace("OR ´a´=´a","",$string);
    // $string = str_ireplace("OR ´a´=´a","",$string);
    $string = str_ireplace("--","",$string);
    $string = str_ireplace("^","",$string);
    $string = str_ireplace("[","",$string);
    $string = str_ireplace("]","",$string);
    $string = str_ireplace("==","",$string);
    return $string;
}
//*** Genera una contraseña de 10 caracteres ***/
function passGenerator($length = 10)
{
    $pass = "";
    $longitudPass=$length;
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //TODO: abecedario en mayuscula y minuscula 
    $longitudcadena=strlen($cadena);

    for ($i=0; $i <=$longitudPass; $i++) { 
        $pos = rand(0,$longitudcadena-1);
        $pass .= substr($cadena,$pos,1);
    }
    return $pass;
}

//*** Genera un token ***/ para restablecer contraseñas de clientes
function token()
{
    $r1 = bin2hex(random_bytes(10));
    $r2 = bin2hex(random_bytes(10));
    $r3 = bin2hex(random_bytes(10));
    $r4 = bin2hex(random_bytes(10));
    $token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;
    return $token;
}

/***Formato para los valores monetarios ***/
function formatMoney($cantidad)
{
    $cantidad = number_format($cantidad,2,SPD,SPM);
    return $cantidad;
}