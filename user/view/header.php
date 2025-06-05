<?php
include_once($caminhoBaseConfig . "configuracao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkyFile</title>
    <link rel="shortcut icon" href="./assets/imagens/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $caminhoBaseAssets . 'css/style.css' ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body class="d-flex flex-column min-vh-100">
<header>
    <nav class="navbar navbar-expand-lg navbar-color-default">
        <div class="container-fluid">

            <a class="navbar-brand d-flex align-items-center" href="<?= constant('URL_LOCAL_SITE_PAGINA_ADM') . 'principal' ?>" style="text-decoration: none; color: #fff;">
                <img src="<?= $caminhoBaseAssets . '/imagens/logo.png' ?>" alt="Logo" height="40px" class="me-3">
                SkyFile
            </a>

        </div>
    </nav>
</header>

