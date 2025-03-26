<?php

include_once("./config/configuracao.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acervo Digital</title>
    <link rel="stylesheet" href="./assets/css/style.css">

    <?php if ($paginaUrl === "login"):?>
    <link rel="stylesheet" href="./assets/css/login.css">
    <?php endif;?>

    <?php if ($paginaUrl === "recuperacao"):?>
    <link rel="stylesheet" href="./assets/css/esq.css">
    <?php endif;?> 
    
    <link rel="shortcut icon" href="./assets/imagens/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap');
    </style>

</head>
<body>
    <header>
        <nav id="nav">
            <img src="./assets/imagens/logo.ico" id="img_logo">
            <div id="menu">
                <h2 class="center">Acervo Digital</h2>
                <div id="menu_button">
                <button class="button_menu"><a href="<?= constant('URL_LOCAL_SITE_PAGINA').'adm'?>">Home</a></button>
                <button class="button_menu"><a href="#">Cadastrar PI</a></button>
                <button class="button_menu"><a href="<?= constant('URL_LOCAL_SITE_PAGINA').'login'?>">Login</a></button>
                <button class="button_menu"><a href="#">Sair</a></button>
                </div>
            </div>
        </nav>
    </header>