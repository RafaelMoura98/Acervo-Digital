<?php
session_start();

$projeto = "Acervo-Digital";
$ambiente = 'localhost';
$exibirErros = true; //ATENÇÃO: Exibir erro no servidor mesmo em produção MESMO EM PROD
$enviroment = '';

switch ($ambiente) {
    case 'localhost':
        $enviroment = "http://localhost/";
        break;
    case 'homol':
        $enviroment = "https://meusite.com.br";
        break;
    case 'prod':
        $enviroment = "https://diogoramalho.com.br/ete/";
        break;
}

/**
 * ATENÇÃO
 * Exibir erro no servidor mesmo em produção
 */
if($exibirErros){
    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);
}

/**
 * Definindo constante URL_LOCAL
 * Caminho absoluto
 */

// CAMINHOS
define('BASE_PATH', realpath(dirname(__FILE__) . '/../'));
define('PROJECT_NAME', $projeto);


define("URL_LOCAL_BASE",$enviroment);
define("URL_LOCAL_SITE",constant("URL_LOCAL_BASE").$projeto);
define("URL_CONFIGURACAO",constant("URL_LOCAL_SITE").'/configuracao/configuracao.php');
define("URL_CONEXAO",constant("URL_LOCAL_SITE").'/configuracao/conexao.php');

define("URL_LOCAL_SITE_PAGINA",constant("URL_LOCAL_SITE")."?pagina=");
define("URL_LOCAL_SITE_PAGINA_LOGIN",constant("URL_LOCAL_SITE_PAGINA")."adm");
define("URL_LOCAL_SITE_PAGINA_ADM",constant("URL_LOCAL_SITE")."/adm/?pagina=");

//user
define("URL_CONTROLLER_USER",constant("URL_LOCAL_SITE")."/user/controller");
define("URL_USER_CONTROLLER_PROJETOS",constant("URL_CONTROLLER_USER")."/projetosController.php");
define("URL_USER_CONTROLLER_ARQUIVOS",constant("URL_CONTROLLER_USER")."/arquivoController.php");
define("URL_MODEL_USER",constant("URL_LOCAL_SITE")."/user/model");
define("URL_USER_MODEL_PROJETOS",constant("URL_MODEL_USER")."/projetosModel.php");
define("URL_USER_MODEL_ARQUIVOS",constant("URL_MODEL_USER")."/arquivoModel.php");

//ADM
define("URL_CONTROLLER_ADM",constant("URL_LOCAL_SITE")."/adm/controller");
define("URL_ADM_CONTROLLER_PROJETOS",constant("URL_CONTROLLER_ADM")."/projetosController.php");
define("URL_ADM_CONTROLLER_ARQUIVOS",constant("URL_CONTROLLER_ADM")."/arquivoController.php");
define("URL_MODEL_ADM",constant("URL_LOCAL_SITE")."/adm/model");
define("URL_ADM_MODEL_PROJETOS",constant("URL_MODEL_ADM")."/projetosModel.php");
define("URL_ADM_MODEL_CURSOS",constant("URL_MODEL_ADM")."/cursosModel.php");
define("URL_ADM_MODEL_ARQUIVOS",constant("URL_MODEL_ADM")."/arquivoModel.php");

?>