<?php

if($_GET && isset($_GET['pagina'])){
    $paginaUrl = $_GET['pagina'];
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
    include_once("view/login.php");
}elseif ($paginaUrl === "principal")  {
    include_once("model/cursosModel.php");
    include_once("model/projetosModel.php");
    include_once("controller/cursosController.php");
    include_once("controller/projetosController.php");
    include_once("view/principal.php");
}elseif ($paginaUrl === "recuperacao") {
    include_once("view/recuperacao.php");
}elseif ($paginaUrl === "cadastrarPI") {
    include_once("view/cadastrarPI.php");
}

