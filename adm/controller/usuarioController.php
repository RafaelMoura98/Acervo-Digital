<?php


if($_GET && isset($_GET['pagina'])){
    $paginaUrl = $_GET['pagina'];
  }else{
    $paginaUrl = null;
}

$login = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['login'])) ? $_POST['login'] : null;
@$senha = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty(Usuario::criptografia($_POST['senha']))) ? Usuario::criptografia($_POST['senha']) : null;
$usuarioCadastrado = Usuario::consultarLogin($login);

if($usuarioCadastrado && Acesso::validarSenha($senha, $usuarioCadastrado['senha'])){
  Acesso::registrarAcessoValido($usuarioCadastrado);
  if (isset($_SESSION["usuario"]["status"]) && $_SESSION["usuario"]["status"] === 'logado'){
    echo "<script>
        alert('Login realizado com sucesso!');
        window.location.href = '".constant("URL_LOCAL_SITE_PAGINA_CADASTRAR_PI")."';
        </script>";
    exit; // Interrompe o script após o redirecionamento
  }
}




