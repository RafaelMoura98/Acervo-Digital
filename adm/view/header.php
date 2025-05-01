<?php
include_once($caminhoBaseConfig."configuracao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acervo Digital</title>
    <link rel="shortcut icon" href="./assets/imagens/logo.ico" type="image/x-icon">

<?php if ($paginaUrl === "principal"):?>
    <link rel="stylesheet" href="<?= $caminhoBaseAssets.'css/style.css'?>">
<?php elseif ($paginaUrl === "cadastrarPI"):?>
    <link rel="stylesheet" href="<?= $caminhoBaseAssets.'css/style.css'?>">
    <link rel="stylesheet" href="<?= $caminhoBaseAssets.'css/cadastrarPI.css'?>">
<?php elseif ($paginaUrl === "adm"):?>
    <link rel="stylesheet" href="<?= $caminhoBaseAssets.'css/style.css'?>">
    <link rel="stylesheet" href="<?= $caminhoBaseAssets.'css/login.css'?>">
<?php elseif ($paginaUrl === "recuperacao"):?>
    <link rel="stylesheet" href="<?= $caminhoBaseAssets.'css/style.css'?>">
    <link rel="stylesheet" href="<?= $caminhoBaseAssets.'css/recuperacao.css'?>">
<?php endif;?> 
    
    <link rel="shortcut icon" href="<?= $caminhoBaseAssets.'/imagens/logo.png'?>" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>@import url('https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap');</style>

</head>
<body>
    <header>
        <nav id="nav">
        <img src="<?= $caminhoBaseAssets.'/imagens/logo.png'?>" id="img_logo">
            <div id="menu">
            <h2 class="fontWhite">Acervo Digital</h2>
                <div id="menu_button">
                    <a href="<?= constant('URL_LOCAL_SITE_PAGINA_ADM').'principal'?>"><button class="button_menu">Home</button></a>
                    <a href="<?= constant('URL_LOCAL_SITE_PAGINA_ADM').'cadastrarPI'?>"><button class="button_menu">Cadastrar Projeto</button></a>
                    <a href="<?= constant('URL_LOCAL_SITE_PAGINA').'adm'?>"><button class="button_menu">Login</button></a>
                    <a href="#"><button class="button_menu">Sair</button></a>
                </div>
            </div>
        </nav>
    </header>