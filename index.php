<?php

if($_GET && isset($_GET['pagina'])){
    $paginaUrl = $_GET['pagina'];
}else{
    $paginaUrl = null;
}

if ($paginaUrl === "adm") {
    include_once("./adm/view/index.php");
}