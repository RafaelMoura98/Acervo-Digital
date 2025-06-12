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
        if (empty($senha) || !is_string($senha)) {
            return false;
        }

        // Gera um salt aleatório (22 caracteres)
        $salt = substr(str_replace('+', '.', base64_encode(openssl_random_pseudo_bytes(17))), 0, 22);
        
        // Custo (10 é padrão seguro)
        $custo = '10';

        // Monta o hash Bcrypt manual
        return crypt($senha, '$2y$' . $custo . '$' . $salt . '$');
    }

    // Verifica se a senha digitada corresponde ao hash armazenado
    public static function validarSenha($senhaDigitada, $senhaHash) {
        if (empty($senhaDigitada) || empty($senhaHash) || !is_string($senhaDigitada) || !is_string($senhaHash)) {
            return false;
        }

        // Compara usando o próprio hash como base (Bcrypt é determinístico com mesmo salt)
        return crypt($senhaDigitada, $senhaHash) === $senhaHash;
    }
}

