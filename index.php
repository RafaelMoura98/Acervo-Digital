<?php

if($_GET && isset($_GET['pagina'])){
    $paginaUrl = $_GET['pagina'];
}else{
    $paginaUrl = null;
}

if ($paginaUrl === "adm") {
    include_once("./adm/index.php");
}elseif ($paginaUrl === "login") {
    include_once("./adm/view/login.php");
}elseif ($paginaUrl === "recuperacao") {
    include_once("./adm/view/recuperacao.php");
}else {
    echo "ERROR 404 PAGE NOT FOUND";
}