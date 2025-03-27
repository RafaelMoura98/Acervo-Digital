<?php


// include_once("./config/configuracao.php");
// include_once("./adm/view/login.php");

if($_GET && isset($_GET['pagina'])){
    $paginaUrl = $_GET['pagina'];
}else{
    $paginaUrl = null;
}

if ($paginaUrl === "adm") {
    include_once("./config/configuracao.php");
    include_once("./adm/view/login.php");
}elseif ($paginaUrl === "principal")  {
    include_once("../config/configuracao.php");
    include_once("./view/principal.php");
}