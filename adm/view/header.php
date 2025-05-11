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
<?php elseif ($paginaUrl === "cadastrarPI" || $paginaUrl === "adm"):?>
    <link rel="stylesheet" href="<?= $caminhoBaseAssets.'css/style.css'?>">
    <link rel="stylesheet" href="<?= $caminhoBaseAssets.'css/cadastrarPI.css'?>">
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
                <?php if ($paginaUrl === "principal"):?>
                    <div class="container-search">
                        <input  type="text" class="search-bar" id="searchInput" placeholder="Buscar por título ou resumo...">
                    </div>  
                <?php endif;?>
                <div id="menu_button">
                    <ul class="navbar-links">
                        <li><a href="<?= constant('URL_LOCAL_SITE_PAGINA_ADM').'principal'?>">Home</a></li>
                        <li><a href="<?= constant('URL_LOCAL_SITE_PAGINA_ADM').'cadastrarPI'?>">Cadastrar Projeto</a></li>
                        <li><a href="<?= constant('URL_LOCAL_SITE_PAGINA').'adm'?>">Login</a></li>
                        <li><a href="<?= constant('URL_LOCAL_SITE_PAGINA_ADM').'sair'?>">Sair</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>