<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Acervo-Digital/adm/model/projetosModel.php';

if($_GET && isset($_GET['pagina'])){
    $paginaUrl = $_GET['pagina'];
}else{
    $paginaUrl = null;
}

if ($paginaUrl === "principal") {
    
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificando os filtros
    $curso = isset($_POST['curso']) && !empty($_POST['curso']) ? $_POST['curso'] : null;
    $ano = isset($_POST['ano']) && !empty($_POST['ano']) ? $_POST['ano'] : null;

    // Verificando se pelo menos um filtro foi aplicado
    if ($curso === null && $ano === null) {
        echo json_encode(["error" => "Nenhum filtro foi aplicado."]);
        exit;
    }
    
    $objProjetos = new Projetos();
    // Passando os filtros para o método consultarProjetos
    $projetosFiltrados = Projetos::consultarProjetos($curso, $ano);

    // Retornando os projetos filtrados como JSON
    header('Content-Type: application/json');
    echo json_encode($projetosFiltrados);
    exit;
}



