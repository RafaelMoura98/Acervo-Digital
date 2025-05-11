<?php
class Acesso
{


    //Construtor
    public function __construct()
    {

    }


    public static function validarSenha($senhaDigitada, $senhaBd){
        if(!$senhaDigitada || !$senhaBd){return false;}
        if($senhaDigitada == $senhaBd){return true;}
        return false;
    }

    public static function registrarAcessoValido($usuarioCadastrado){
        $_SESSION["usuario"]["nome"] = $usuarioCadastrado['nome'];
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