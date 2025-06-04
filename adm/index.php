<?php

if($_GET && isset($_GET['pagina'])){
    $paginaUrl = $_GET['pagina'];
    $id = $_GET['id'] ?? null;
}else{
    $paginaUrl = null;
}

if ($paginaUrl === "adm"){
    $caminhoBaseAssets = "./assets/";
    $caminhoBaseConfig = "./config/";
    $caminhoBaseModel = "./model/";
    $caminhoBaseController = "./controller/";
}else {
    $caminhoBaseAssets = "../assets/";
    $caminhoBaseConfig = "../config/";
    $caminhoBaseModel= "../model/";
    $caminhoBaseController = "../controller/";
}


include_once($caminhoBaseConfig.'conexao.php');
include_once("view/header.php");

if ($paginaUrl === "adm") {
    include_once("model/acessoModel.php");
    include_once("model/usuarioModel.php");
    include_once("view/login.php");
    include_once("controller/usuarioController.php");

    // Verifica se o usuário já está logado
    if (isset($_SESSION["usuario"]["status"]) && $_SESSION["usuario"]["status"] === 'logado') {
        echo "<script>
            alert('Você já está logado!');
            window.location.href = '".constant("URL_LOCAL_SITE_PAGINA_ADM"). 'principal' ."';
        </script>";
        exit;
    }

}elseif ($paginaUrl === "principal")  {
    include_once("model/cursosModel.php");
    include_once("model/projetosModel.php");
    include_once("controller/cursosController.php");
    include_once("controller/projetosController.php");
    include_once("view/principal.php");
}elseif ($paginaUrl === "recuperacao") {
    include_once("view/recuperacao.php");
}elseif ($paginaUrl === "cadastrarPI") {
    include_once("model/acessoModel.php");
    Acesso::protegerTela();
    include_once("model/projetosModel.php");
    include_once("controller/projetosController.php");
    include_once("view/cadastrarPI.php");
}elseif($paginaUrl === "editarPI") {
    include_once("model/acessoModel.php");
    Acesso::protegerTela();
    include_once("model/projetosModel.php");
    $projeto = Projetos::consultarProjetoPorId(base64_decode($id));
    include_once("view/editarPI.php");
}elseif ($paginaUrl === "sair"){
    include_once("model/acessoModel.php");
    Acesso::limparSessao();
}

include_once("view/footer.php");