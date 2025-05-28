<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Acervo-Digital/adm/model/projetosModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Ação para carregar HTML
    if ($_POST['action'] === 'carregar_html_projetos') {
    $termo  = $_POST['termo'] ?? '';
    $cursos = $_POST['cursos'] ?? [];  // array de ids
    $anos   = $_POST['anos']   ?? [];  // array de anos

    // Se houver termo, prioriza busca
    if (trim($termo) !== '') {
        $projetos = Projetos::buscarPorTermo($termo);
        $titulo   = count($projetos) . " Resultado(s) Encontrado(s)";
        include '../view/card.php';
    }
    // Se nenhum filtro, mostra últimos+curtidos
    elseif (empty($cursos) && empty($anos)) {
        $ultimos  = Projetos::ultimosProjetos();
        $curtidos = Projetos::ProjetosMaisCurtidos();

        $titulo   = 'Últimos Projetos';  $projetos = $ultimos;
        include '../view/card.php';
        $titulo   = 'Projetos Mais Curtidos'; $projetos = $curtidos;
        include '../view/card.php';
    }
    // Senão, filtra pelos arrays
    else {
        // Supondo que você implemente esse método:
        $projetos = Projetos::consultarProjetos($cursos, $anos);
        $titulo   = 'Projetos Filtrados - ' . count($projetos) . ' Resultado(s)';
        include '../view/card.php';
    }
    exit;
}
    // Ação de like (mantida como JSON)
    if (isset($_POST['action']) && $_POST['action'] === 'like' && isset($_POST['post_id'])) {
        header('Content-Type: application/json');
        $postId = filter_var($_POST['post_id'], FILTER_SANITIZE_NUMBER_INT);
        if ($postId) {
            $success = Projetos::adicionarLike($postId); 
            if ($success) {
                $newLikeCount = Projetos::obterNumeroLikes($postId);
                echo json_encode([
                    'success' => true, 
                    'new_like_count' => $newLikeCount
                ]);
                exit;
            }
            echo json_encode(['success' => false, 'error' => 'Erro ao adicionar like.']);
            exit;
        }
        echo json_encode(['success' => false, 'error' => 'ID do projeto inválido.']);
        exit;
    }
}