<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Acervo-Digital/adm/model/projetosModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'carregar_html_projetos':
            $termo  = $_POST['termo'] ?? '';
            $cursos = $_POST['cursos'] ?? [];
            $anos   = $_POST['anos'] ?? [];

            if (trim($termo) !== '') {
                $projetos = Projetos::buscarPorTermo($termo);
                $titulo   = count($projetos) . " Resultado(s) Encontrado(s)";
                include '../view/card.php';
            } elseif (empty($cursos) && empty($anos)) {
                $ultimos  = Projetos::ultimosProjetos();
                $curtidos = Projetos::ProjetosMaisCurtidos();

                $titulo = 'Últimos Projetos';  $projetos = $ultimos;
                include '../view/card.php';

                $titulo = 'Projetos Mais Curtidos'; $projetos = $curtidos;
                include '../view/card.php';
            } else {
                $projetos = Projetos::consultarProjetos($cursos, $anos);
                $titulo   = 'Projetos Filtrados - ' . count($projetos) . ' Resultado(s)';
                include '../view/card.php';
            }
            exit;

        case 'like':
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
            echo json_encode(['success' => false, 'error' => 'ID inválido.']);
            exit;

        default:
            http_response_code(400);
            echo json_encode(['success' => false, 'error' => 'Ação desconhecida.']);
            exit;
    }
}