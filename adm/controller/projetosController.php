<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Acervo-Digital/adm/model/projetosModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   
    $termo = isset($_POST['termo']) && !empty($_POST['termo']) ? $_POST['termo'] : null;
    $curso = isset($_POST['curso']) && !empty($_POST['curso']) ? $_POST['curso'] : null;
    $ano = isset($_POST['ano']) && !empty($_POST['ano']) ? $_POST['ano'] : null;

    // --- Lógica para dar Like ---
    if (isset($_POST['action']) && $_POST['action'] === 'like' && isset($_POST['post_id'])) {
        $postId = filter_var($_POST['post_id'], FILTER_SANITIZE_NUMBER_INT);
        if ($postId) {
            $success = Projetos::adicionarLike($postId); 
            if ($success) {
                $newLikeCount = Projetos::obterNumeroLikes($postId);
                echo json_encode(['success' => true, 'new_like_count' => $newLikeCount]);
                exit;
            } else {
                echo json_encode(['success' => false, 'error' => 'Erro ao adicionar like.']);
                exit;
            }
        }else {
            echo json_encode(['success' => false, 'error' => 'ID do projeto inválido.']);
            exit;
        }
    }

    // --- Lógica de Busca ---
    $resultados = []; // Array para armazenar os resultados

    // CASO 1: Se houver termo de busca, prioriza a busca textual
    if ($termo !== null) {
        $resultados['busca'] = Projetos::buscarPorTermo($termo); // Use a nova função que criamos!
        $resultados['quantidadeBusca'] = count($resultados['busca']); // Conta a quantidade de resultados encontrados
        echo json_encode($resultados);
        exit; 
    }
    // CASO 2: Se não houver termo, usa os filtros tradicionais (curso/ano)
    elseif ($curso === null && $ano === null) {
        $resultados['ultimos'] = Projetos::ultimosProjetos(); // Retorna os últimos projetos
        $resultados['curtidos'] = Projetos::ProjetosMaisCurtidos(); // Retorna os projetos mais curtidos
        echo json_encode($resultados);
        exit;
    }
    else {
        // Se não houver termo, mas houver curso ou ano, consulta os projetos
        $resultados['filtrados'] = Projetos::consultarProjetos($curso, $ano);
        $resultados['quantidadeFiltrados'] = count($resultados['filtrados']);
        echo json_encode($resultados);
        exit;
    }

    // Retorna os projetos em JSON
    
}