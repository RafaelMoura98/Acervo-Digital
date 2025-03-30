<?php


if($_GET && isset($_GET['pagina'])){
    $paginaUrl = $_GET['pagina'];
}else{
    $paginaUrl = null;
}


if ($paginaUrl === "adm"){
    $caminhoBaseAssets = "./assets/";
    $caminhoBaseConfig = "./config/";
}else {
    $caminhoBaseAssets = "../assets/";
    $caminhoBaseConfig = "../config/";
}



include_once("view/header.php");

if ($paginaUrl === "adm") {
    include_once("view/login.php");

}elseif ($paginaUrl === "principal")  {
    include_once("view/principal.php");
    
}elseif ($paginaUrl === "recuperacao") {
    include_once("view/recuperacao.php");
}

