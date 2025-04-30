<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Acervo-Digital/adm/model/projetosModel.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os parâmetros (termo, curso, ano)
    $termo = isset($_POST['termo']) && !empty($_POST['termo']) ? $_POST['termo'] : null;
    $curso = isset($_POST['curso']) && !empty($_POST['curso']) ? $_POST['curso'] : null;
    $ano = isset($_POST['ano']) && !empty($_POST['ano']) ? $_POST['ano'] : null;

    // --- Lógica de Busca ---
    // CASO 1: Se houver termo de busca, prioriza a busca textual
    if ($termo !== null) {
        $projetos = Projetos::buscarPorTermo($termo); // Use a nova função que criamos!
    } 
    // CASO 2: Se não houver termo, usa os filtros tradicionais (curso/ano)
    else {
        // Verifica se pelo menos um filtro foi aplicado
        if ($curso === null && $ano === null) {
            echo json_encode(["error" => "Nenhum filtro ou termo de busca foi aplicado."]);
            exit;
        }
        $projetos = Projetos::consultarProjetos($curso, $ano);
    }

    // Retorna os projetos em JSON
    header('Content-Type: application/json');
    echo json_encode($projetos);
    exit;
}



