<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Acervo-Digital/adm/model/projetosModel.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Acervo-Digital/config/configuracao.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_titulo = isset($_POST['nome_titulo']) && !empty($_POST['nome_titulo']) ? $_POST['nome_titulo'] : null;
    $resumo = isset($_POST['resumo']) && !empty($_POST['resumo']) ? $_POST['resumo'] : null;
    $id_curso = isset($_POST['id_curso']) && !empty($_POST['id_curso']) ? $_POST['id_curso'] : null;
    $ano_publicacao = isset($_POST['ano_publicacao']) && !empty($_POST['ano_publicacao']) ? $_POST['ano_publicacao'] : null;
    if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK) {
        $tmpName  = $_FILES['fileToUpload']['tmp_name'];
        $filename = basename($_FILES['fileToUpload']['name']);
        $destino  = $_SERVER['DOCUMENT_ROOT'] . '/Acervo-Digital/assets/uploads/' . $filename;

        if (move_uploaded_file($tmpName, $destino)) {
            $arquivo = $filename;  // só o nome pro DB
        } else {
            $arquivo = null;
            // opcional: lançar erro ou logar
        }
    } else {
            $arquivo = null;
        }



    
    if (is_numeric($nome_titulo)) { // Verifica se título não são números
        $_SESSION['form_data'] = [
            'titulo' => $nome_titulo,
            'resumo' => $resumo,
            'ano'    => $ano_publicacao,
            'curso'  => $id_curso,
        ];
        echo "<script>
                alert('O título não pode ser um número.');
                window.location.href = '".constant("URL_LOCAL_SITE_PAGINA_CADASTRAR_PI")."';
            </script>";
        exit;
    }elseif (is_numeric($resumo)) { // Verifica se resumo não são números
        $_SESSION['form_data'] = [
            'titulo' => $nome_titulo,
            'resumo' => $resumo,
            'ano'    => $ano_publicacao,
            'curso'  => $id_curso,
        ];
        echo "<script>
                alert('O resumo não pode ser um número.');
                window.location.href = '".constant("URL_LOCAL_SITE_PAGINA_CADASTRAR_PI")."';
            </script>";
        exit;
    }elseif (!filter_var($ano_publicacao, FILTER_VALIDATE_INT)) {
        // Ano inválido
        $_SESSION['form_data'] = [
            'titulo' => $_POST['nome_titulo'],
            'resumo' => $_POST['resumo'],
            'ano'    => $_POST['ano_publicacao'],
            'curso'  => $_POST['id_curso'],
        ];

        echo "<script>
                alert('O campo ano deve conter apenas números inteiros!');
                window.location.href = '".constant("URL_LOCAL_SITE_PAGINA_CADASTRAR_PI")."';
            </script>";
        exit;
    }elseif ($nome_titulo && $resumo && $ano_publicacao && $id_curso && $arquivo) {
        $cadastradoComSucesso = Projetos::cadastrarPI($nome_titulo, $resumo, $id_curso, $ano_publicacao, $arquivo);
        // Retorna uma resposta de sucesso
        if ($cadastradoComSucesso === true) {
            echo "<script>
                    alert('Projeto cadastrado com sucesso!');
                    window.location.href = '".constant("URL_LOCAL_SITE_PAGINA_CADASTRAR_PI")."';
                </script>";
            exit;
        }
    }else {
        // Salvar dados digitados na sessão
        $_SESSION['form_data'] = [
            'titulo' => $nome_titulo,
            'resumo' => $resumo,
            'ano' => $ano_publicacao,
            'curso' => $id_curso,
            // não salve o arquivo em $_SESSION, apenas dados textuais
        ];
        echo "<script>
                alert('Erro ao cadastrar o projeto. Verifique os dados e tente novamente.');
                window.location.href = '".constant("URL_LOCAL_SITE_PAGINA_CADASTRAR_PI")."';
            </script>";
        exit;
    }
}
