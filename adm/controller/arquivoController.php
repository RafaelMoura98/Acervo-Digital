<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Acervo-Digital/adm/model/projetosModel.php';

var_dump($id_projeto);
$id = $_GET['id'] ?? null;
$modo = $_GET['modo'] ?? '';


if (!$id || !in_array($modo, ['visualizar', 'download', 'editar'])) {
    http_response_code(400);
    echo "Requisição inválida.";
    exit;
}

// Consultar o projeto pelo ID
$projeto = Projetos::consultarProjetoPorId($id);

if ($paginaUrl === 'editarPI'){
    echo "aqui!";die;
    $_SESSION['projeto']['titulo'] = $projeto['titulo'];
    $_SESSION['projeto']['resumo'] = $projeto['resumo'];
    $_SESSION['projeto']['curso'] = $projeto['curso'];
    $_SESSION['projeto']['ano'] = $projeto['ano'];
    $_SESSION['projeto']['nome_pdf'] = $projeto['nome_pdf'];
}


if (!$projeto) {
    http_response_code(404);
    echo "Arquivo não encontrado.";
    exit;
}

$arquivo = $projeto['nome_pdf'];
$nome_arquivo = $projeto['titulo'];
$caminho = realpath(__DIR__ . '/../../assets/uploads/' . basename($arquivo));


if (!$caminho || !file_exists($caminho)) {
    http_response_code(404);
    echo "Arquivo não encontrado.";
    exit;
}

$mime = mime_content_type($caminho);
header('Content-Type: ' . $mime);


$nome_formatado = $nome_arquivo;
$nome_formatado .= '.pdf';

if ($modo === 'download') {
    header('Content-Disposition: attachment; filename="' . $nome_formatado . '"');
}elseif ($modo === 'visualizar') {
    header('Content-Disposition: inline; filename="' . $nome_formatado . '"');
}

header('Content-Length: ' . filesize($caminho));
readfile($caminho);
exit;
