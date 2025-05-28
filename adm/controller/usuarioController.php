<?php


if($_GET && isset($_GET['pagina'])){
    $paginaUrl = $_GET['pagina'];
  }else{
    $paginaUrl = null;
}

$login = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['login'])) ? $_POST['login'] : null;
@$senha = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty(Usuario::criptografia($_POST['senha']))) ? Usuario::criptografia($_POST['senha']) : null;
$usuarioCadastrado = Usuario::consultarLogin($login);


if (isset($usuarioCadastrado["login"]) && $usuarioCadastrado["login"] === $login) {
    $senhaValida = Acesso::validarSenha($senha, $usuarioCadastrado["senha"]);

    if ($senhaValida === true) {
        Acesso::registrarAcessoValido($usuarioCadastrado);
        header("Location: " . constant("URL_LOCAL_SITE_PAGINA_ADM") . 'principal');
        exit; // Interrompe o script após o redirecionamento
    } else {
        echo "<script>
            alert('Senha incorreta!');
            </script>";
        exit;
    }
} elseif ($login != null) {
    echo "<script>
        alert('Usuário incorreto!');
        </script>";
    exit;
}




