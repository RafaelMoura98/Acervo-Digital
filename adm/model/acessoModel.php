<?php
class Acesso
{


    //Construtor
    public function __construct()
    {

    }


    // public static function validarSenha($senhaDigitada, $senhaBd) {
    //     if (empty($senhaDigitada) || empty($senhaBd)) {
    //         return false;
    //     }
    //     return password_verify($senhaDigitada, $senhaBd);
    // }

    public static function registrarAcessoValido($usuarioCadastrado){
        $_SESSION["usuario"]["nome"] = $usuarioCadastrado['nome'];
        $_SESSION["usuario"]["login"] = $usuarioCadastrado['login'];
        $_SESSION["usuario"]["id"] = $usuarioCadastrado['id'];
        $_SESSION["usuario"]["status"] = 'logado';
    }


    public static function limparSessao(){
        unset($_SESSION["usuario"]);
        header('Location:'.constant("URL_LOCAL_SITE_PAGINA_LOGIN"));
    }

    public static function protegerTela(){
        if(
            !$_SESSION || 
            !$_SESSION["usuario"]["status"] === 'logado'
        ){
            header('Location:'.constant("URL_LOCAL_SITE_PAGINA_LOGIN"));
        }
    }

}