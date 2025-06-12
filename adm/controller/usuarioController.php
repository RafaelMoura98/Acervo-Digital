<?php
// Verifica a página (mantido igual)
if($_GET && isset($_GET['pagina'])) {
    $paginaUrl = $_GET['pagina'];
} else {
    $paginaUrl = null;
}

// Obtém credenciais
$login = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['login'])) ? trim($_POST['login']) : null;
$senhaDigitada = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['senha'])) ? $_POST['senha'] : null;

// Verifica login
if ($login && $senhaDigitada) {
    $usuarioCadastrado = Usuario::consultarLogin($login);
    
    if ($usuarioCadastrado && isset($usuarioCadastrado["login"])) {
        // Verifica a senha sem criptografar antes
        $senhaValida = password_verify($senhaDigitada, $usuarioCadastrado["senha"]);
        
        if ($senhaValida) {
            Acesso::registrarAcessoValido($usuarioCadastrado);
            header("Location: " . constant("URL_LOCAL_SITE_PAGINA_ADM") . 'principal');
            exit;
        } else {
            echo "<script>alert('Senha incorreta!');</script>";
        }
    } else {
        echo "<script>alert('Usuário não encontrado!');</script>";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<script>alert('Preencha todos os campos!');</script>";
}




