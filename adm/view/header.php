<?php
include_once($caminhoBaseConfig . "configuracao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acervo Digital</title>
    <link rel="shortcut icon" href="./assets/imagens/logo.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <?php if ($paginaUrl === "principal"): ?>
        <link rel="stylesheet" href="<?= $caminhoBaseAssets . 'css/style.css' ?>">
    <?php elseif ($paginaUrl === "cadastrarPI" || $paginaUrl === "adm" || $paginaUrl === "editarPI"): ?>
        <link rel="stylesheet" href="<?= $caminhoBaseAssets . 'css/style.css' ?>">
        <link rel="stylesheet" href="<?= $caminhoBaseAssets . 'css/cadastrarPI.css' ?>">
    <?php elseif ($paginaUrl === "recuperacao"): ?>
        <link rel="stylesheet" href="<?= $caminhoBaseAssets . 'css/style.css' ?>">
        <link rel="stylesheet" href="<?= $caminhoBaseAssets . 'css/recuperacao.css' ?>">
    <?php endif; ?> 

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body class="d-flex flex-column min-vh-100">
<header>
    <nav class="navbar navbar-expand-lg navbar-color-default">
        <div class="container-fluid">

            <a class="navbar-brand d-flex align-items-center" href="<?= constant('URL_LOCAL_SITE_PAGINA_ADM') . 'principal' ?>" style="text-decoration: none; color: #fff;">
                <img src="<?= $caminhoBaseAssets . '/imagens/logo.png' ?>" alt="Logo" height="40px" class="me-3">
                Acervo Digital
            </a>

            <button class="navbar-toggler"  type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">

                <div class="d-flex w-100 align-items-center justify-content-between">

                    <ul class="navbar-nav d-flex flex-row align-items-center gap-3 ms-auto mb-0">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= constant('URL_LOCAL_SITE_PAGINA_ADM') . 'principal' ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= constant('URL_LOCAL_SITE_PAGINA_ADM') . 'cadastrarPI' ?>">Cadastrar Projeto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= constant('URL_LOCAL_SITE_PAGINA') . 'adm' ?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= constant('URL_LOCAL_SITE_PAGINA_ADM') . 'sair' ?>">Sair</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </nav>
</header>

