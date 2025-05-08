<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Acervo-Digital/adm/model/projetosModel.php';



$id = $_GET['id'] ?? null;
$modo = $_GET['modo'] ?? '';

if (!$id || !in_array($modo, ['visualizar', 'download'])) {
    http_response_code(400);
    echo "Requisição inválida.";
    exit;
}

// Consultar o projeto pelo ID
$projeto = Projetos::consultarProjetoPorId($id);

if (!$projeto) {
    http_response_code(404);
    echo "Arquivo não encontrado.";
    exit;
}

$arquivo = $projeto['nome_pdf'];
$caminho = realpath(__DIR__ . '/../../assets/uploads/' . basename($arquivo));

if (!$caminho || !file_exists($caminho)) {
    http_response_code(404);
    echo "Arquivo não encontrado.";
    exit;
}

$mime = mime_content_type($caminho);
header('Content-Type: ' . $mime);

if ($modo === 'download') {
    header('Content-Disposition: attachment; filename="' . basename($arquivo) . '"');
} else {
    header('Content-Disposition: inline; filename="' . basename($arquivo) . '"');
}

header('Content-Length: ' . filesize($caminho));
readfile($caminho);
exit;
