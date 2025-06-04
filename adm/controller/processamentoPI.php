<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Acervo-Digital/adm/model/projetosModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Acervo-Digital/config/configuracao.php';


$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

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

    // 2) Validações
    if (is_numeric($nome_titulo)) {
        $_SESSION['form_data'] = compact('nome_titulo','resumo','id_curso','ano_publicacao');
        $msg = 'O título não pode ser um número.';
        if ($isAjax) {
            echo json_encode(['success' => false, 'message' => $msg]);
            exit;
        }
        echo "<script>alert('$msg');window.location.href='".constant("URL_LOCAL_SITE_PAGINA_ADM") . "cadastrarPI';</script>";
        exit;
    }

    if (is_numeric($resumo)) {
        $_SESSION['form_data'] = compact('nome_titulo','resumo','id_curso','ano_publicacao');
        $msg = 'O resumo não pode ser um número.';
        if ($isAjax) {
            echo json_encode(['success' => false, 'message' => $msg]);
            exit;
        }
        echo "<script>alert('$msg');window.location.href='".constant("URL_LOCAL_SITE_PAGINA_ADM") . "cadastrarPI';</script>";
        exit;
    }

    if (!filter_var($ano_publicacao, FILTER_VALIDATE_INT)) {
        $_SESSION['form_data'] = compact('nome_titulo','resumo','id_curso','ano_publicacao');
        $msg = 'O campo ano deve conter apenas números inteiros!';
        if ($isAjax) {
            echo json_encode(['success' => false, 'message' => $msg]);
            exit;
        }
        echo "<script>alert('$msg');window.location.href='".constant("URL_LOCAL_SITE_PAGINA_ADM") . "cadastrarPI';</script>";
        exit;
    }

    // 3) Upload
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
            $arquivo = $uploadResultado;
            break;
    }

    if ($arquivo === null) {
        $_SESSION['form_data'] = compact('nome_titulo','resumo','id_curso','ano_publicacao');
        if ($isAjax) {
            echo json_encode(['success' => false, 'message' => $msg]);
            exit;
        }
        echo "<script>alert('Erro: $msg');</script>";
        exit;
    }

    // 4) Banco
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

    // 5) Resposta final
    if ($cadastrado) {
        $msg = ($paginaUrl === "cadastrarPI") ? 'Projeto cadastrado com sucesso!' : 'Projeto editado com sucesso!';
        if ($isAjax) {
            echo json_encode(['success' => true, 'message' => $msg]);
        } else {
            echo "<script>alert('$msg');
                  window.location.href='".constant("URL_LOCAL_SITE_PAGINA_ADM") . "principal';</script>";
        }
        exit;
    } else {
        $_SESSION['form_data'] = compact('nome_titulo','resumo','id_curso','ano_publicacao');
        $msg = 'Erro ao cadastrar o projeto. Tente novamente.';
        if ($isAjax) {
            echo json_encode(['success' => false, 'message' => $msg]);
        } else {
            echo "<script>alert('$msg');
                  window.location.href='".constant("URL_LOCAL_SITE_PAGINA_ADM") . "cadastrarPI';</script>";
        }
        exit;
    }
}
