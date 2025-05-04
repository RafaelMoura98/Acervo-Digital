<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Acervo-Digital/adm/model/projetosModel.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $termo = isset($_POST['termo']) && !empty($_POST['termo']) ? $_POST['termo'] : null;
    $curso = isset($_POST['curso']) && !empty($_POST['curso']) ? $_POST['curso'] : null;
    $ano = isset($_POST['ano']) && !empty($_POST['ano']) ? $_POST['ano'] : null;

    // --- Lógica de Busca ---
    $resultados = []; // Array para armazenar os resultados

    // CASO 1: Se houver termo de busca, prioriza a busca textual
    if ($termo !== null) {
        $resultados['busca'] = Projetos::buscarPorTermo($termo); // Use a nova função que criamos!
        $resultados['quantidadeBusca'] = count($resultados['busca']); // Conta a quantidade de resultados encontrados
    }
    // CASO 2: Se não houver termo, usa os filtros tradicionais (curso/ano)
    elseif ($curso === null && $ano === null) {
        $resultados['ultimos'] = Projetos::ultimosProjetos(); // Retorna os últimos projetos
        $resultados['curtidos'] = Projetos::ProjetosMaisCurtidos(); // Retorna os projetos mais curtidos
    }
    else {
        // Se não houver termo, mas houver curso ou ano, consulta os projetos
        $resultados['filtrados'] = Projetos::consultarProjetos($curso, $ano);
        $resultados['quantidadeFiltrados'] = count($resultados['filtrados']);
    }

    // Retorna os projetos em JSON
    header('Content-Type: application/json');
    echo json_encode($resultados);
    exit;
}