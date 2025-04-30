<?php

if($_GET && isset($_GET['pagina'])){
    $paginaUrl = $_GET['pagina'];
}else{
    $paginaUrl = null;
}

if ($paginaUrl === "principal") {
    $objCursos = new Cursos();
}