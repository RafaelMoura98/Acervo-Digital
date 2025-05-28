<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Acervo-Digital/adm/model/projetosModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Acervo-Digital/config/configuracao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1) Captura dos campos
    $nome_titulo = $_POST['nome_titulo'] ?? null;
    $resumo = $_POST['resumo'] ?? null;
    $id_curso = $_POST['id_curso'] ?? null;
    $ano_publicacao = $_POST['ano_publicacao'] ?? null;
    $arquivo = null;
    $paginaUrl = $_POST['paginaUrl'] ?? null;
    $paginaUrl = base64_decode($paginaUrl);
    $id = $_POST['id_projeto'] ?? null;
    $id = base64_decode($id);
    $arquivoAntigo = $_POST['arquivoAntigo'] ?? null;

    

    // 2) Validações de título, resumo e ano (antes do upload)
    if (is_numeric($nome_titulo)) {
        $_SESSION['form_data'] = compact('nome_titulo','resumo','id_curso','ano_publicacao');
        echo "<script>alert('O título não pode ser um número.');window.location.href='"
             .constant("URL_LOCAL_SITE_PAGINA_ADM") . 'cadastrarPI'."';</script>";
        exit;
    }
    if (is_numeric($resumo)) {
        $_SESSION['form_data'] = compact('nome_titulo','resumo','id_curso','ano_publicacao');
        echo "<script>alert('O resumo não pode ser um número.');window.location.href='"
             .constant("URL_LOCAL_SITE_PAGINA_ADM") . 'cadastrarPI'."';</script>";
        exit;
    }
    if (!filter_var($ano_publicacao, FILTER_VALIDATE_INT)) {
        $_SESSION['form_data'] = compact('nome_titulo','resumo','id_curso','ano_publicacao');
        echo "<script>alert('O campo ano deve conter apenas números inteiros!');window.location.href='"
             .constant("URL_LOCAL_SITE_PAGINA_ADM") . 'cadastrarPI'."';</script>";
        exit;
    }

    // 3) Upload (no model) — só executa se os campos estiverem OK
    $uploadResultado = Projetos::uploadArquivoComHash($_FILES['fileToUpload'], $arquivoAntigo);

    switch ($uploadResultado) {
        case 'erro_tipo':
            $msg = 'Apenas arquivos PDF são permitidos.'; break;
        case 'erro_tamanho':
            $msg = 'O arquivo excede o tamanho máximo permitido (2MB).'; break;
        case 'arquivo_ja_existe':
            $msg = 'Já existe um arquivo com esse título.'; break;
        case false:
            $msg = 'Erro ao fazer upload do arquivo.'; break;
        default:
            // deu certo: $uploadResultado é o nome do arquivo
            $arquivo = $uploadResultado;
            break;
    }

    if ($arquivo === null) {
        $_SESSION['form_data'] = compact('nome_titulo','resumo','id_curso','ano_publicacao');
        echo "<script>alert('Erro: {$msg}');</script>";
        exit;
    }

    // 4) Finalmente, cadastra no banco
    if ($paginaUrl === "cadastrarPI") {
        $cadastrado = Projetos::cadastrarPI(
            $nome_titulo,
            $resumo,
            $id_curso,
            $ano_publicacao,
            $arquivo
        );
    } elseif ($paginaUrl === "editarPI") {
        $cadastrado = Projetos::editarPI(
            $id,
            $nome_titulo,
            $resumo,
            $id_curso,
            $ano_publicacao,
            $arquivo
        );
    }

    if ($cadastrado && ($paginaUrl === "cadastrarPI")) {
        echo "<script>alert('Projeto cadastrado com sucesso!');
              window.location.href='".constant("URL_LOCAL_SITE_PAGINA_ADM") . 'principal'."';
              </script>";
        exit;
    }elseif ($cadastrado && ($paginaUrl === "editarPI")) {
        echo "<script>alert('Projeto editado com sucesso!');
              window.location.href='".constant("URL_LOCAL_SITE_PAGINA_ADM") . 'principal'."';
              </script>";
        exit;
    }else {
        $_SESSION['form_data'] = compact('nome_titulo','resumo','id_curso','ano_publicacao');
        echo "<script>alert('Erro ao cadastrar o projeto. Tente novamente.');
              window.location.href='".constant("URL_LOCAL_SITE_PAGINA_ADM") . 'cadastrarPI'."';
              </script>";
        exit;
    }
}
