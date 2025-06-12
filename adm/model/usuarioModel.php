<?php 

class Usuario{

    private $id;
    private $login;
    private $senha;

        //Construtor
        public function __construct($login = null, $senha = null)
        {
            $this->setLogin($login);
            $this->setSenha($senha);
        }

        public function getLogin(){
            return $this->login;
        }
        public function getSenha(){
            return $this->senha;
        }
    

        public function setLogin($login){
            $this->login = $login;
        }
        public function setSenha($senha){
            $this->senha = $senha;
        }


    public static function consultarLogin($login){
        $pdo = Database::conexao();
        $sql = "SELECT `id`,`nome`,`login`,`senha` FROM usuario_bd WHERE `login` = '$login'";
        $stmt = $pdo->prepare($sql);
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return @$list[0];
    }

    public static function criptografia($senha) {
        if (empty($senha)) {
            return false;
        }
        return password_hash($senha, PASSWORD_BCRYPT);
}

}