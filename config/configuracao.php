<?php


session_start();


// $SERVER["SERVER_NAME"]
switch ('prod') {
    case 'localhost':
        $enviroment['local'] = "http://localhost/";
        break;
    case 'homol':
        $enviroment['homol'] = "https://meusite.com.br";
        break;
    case 'prod':
        $enviroment['prod'] = "http://192.168.5.219/";
        break;
}

/**
 * Definindo constante URL_LOCAL
 * Caminho absoluto
 */

define("URL_LOCAL_BASE",$enviroment['prod']);
define("URL_LOCAL_SITE",constant("URL_LOCAL_BASE")."Acervo-Digital");
define("URL_LOCAL_SITE_PAGINA",constant("URL_LOCAL_SITE")."?pagina=");
define("URL_LOCAL_SITE_PAGINA_LOGIN",constant("URL_LOCAL_SITE_PAGINA")."adm");
define("URL_LOCAL_SITE_PAGINA_ADM",constant("URL_LOCAL_SITE")."/adm/?pagina=");



define("URL_CONTROLLER_USER",constant("URL_LOCAL_SITE")."/user/controller");
define("URL_USER_CONTROLLER_PROJETOS",constant("URL_CONTROLLER_USER")."/projetosController.php");
define("URL_USER_CONTROLLER_ARQUIVOS",constant("URL_CONTROLLER_USER")."/arquivoController.php");


define("URL_CONTROLLER_ADM",constant("URL_LOCAL_SITE")."/adm/controller");
define("URL_ADM_CONTROLLER_PROJETOS",constant("URL_CONTROLLER_ADM")."/projetosController.php");
define("URL_ADM_CONTROLLER_ARQUIVOS",constant("URL_CONTROLLER_ADM")."/arquivoController.php");

?>