<?php


require_once $_SERVER['DOCUMENT_ROOT'].'/Acervo-Digital/config/conexao.php';


class Projetos 
{
    
        public static function consultarProjetos($curso, $ano)
    {
        $pdo = Database::conexao();
        $sql = "SELECT pi.*, c.id AS curso_id, c.curso AS nome_curso
                FROM pi_bd pi
                JOIN curso_bd c ON pi.curso = c.id
                WHERE 1=1";
        $params = [];

        if ($curso) {
            $sql .= " AND c.id = :curso";
            $params[':curso'] = $curso;
        }

        if ($ano) {
            $sql .= " AND pi.ano = :ano";
            $params[':ano'] = $ano;
        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);  // Passando os parâmetros para a execução
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

        public static function consultarProjetoPorId($id)
    {
        $pdo = Database::conexao();
        $sql = "SELECT pi.id, pi.nome_pdf
                FROM pi_bd pi
                WHERE pi.id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    public static function consultarAnosPubliProjetos()
    {   
        $pdo = Database::conexao();
        $sql = "SELECT DISTINCT ano FROM pi_bd ORDER BY ano ASC;";
        $stmt = $pdo->prepare($sql);
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    public static function buscarPorTermo($termo)
    {
        $pdo = Database::conexao();
        
        $sql = "SELECT pi.*, c.id AS curso_id, c.curso AS nome_curso
                FROM pi_bd pi
                JOIN curso_bd c ON pi.curso = c.id 
                WHERE titulo LIKE :termo OR resumo LIKE :termo LIMIT 5" ;
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':termo', '%' . $termo . '%', PDO::PARAM_STR);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function ultimosProjetos()
    {
        $pdo = Database::conexao();
        $sql = "SELECT pi.*, c.id AS curso_id, c.curso AS nome_curso
                FROM pi_bd pi
                JOIN curso_bd c ON pi.curso = c.id
                ORDER BY pi.data DESC
                LIMIT 5";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function ProjetosMaisCurtidos()
    {
        $pdo = Database::conexao();
        $sql = "SELECT pi.*, c.id AS curso_id, c.curso AS nome_curso
                FROM pi_bd pi
                JOIN curso_bd c ON pi.curso = c.id
                ORDER BY pi.like_pi DESC
                LIMIT 5";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function adicionarLike($postId) 
    { 
        $pdo = Database::conexao();
        $sql = "UPDATE pi_bd 
                SET like_pi = like_pi + 1 
                WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $postId, PDO::PARAM_INT);

        return $stmt->execute();
    } 

    public static function obterNumeroLikes($postId) 
    { 
        $pdo = Database::conexao();
        $sql = "SELECT like_pi 
                FROM pi_bd 
                WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $postId, PDO::PARAM_INT); 
        $stmt->execute(); 
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC); 

        return $resultado ? $resultado['like_pi'] : 0; 
    } 
    
    public static function cadastrarPI($titulo, $resumo, $curso, $ano, $arquivo)
    {
        if(!$titulo || !$resumo || !$curso || !$ano || !$arquivo){return;}
        $pdo = Database::conexao();
        $sql = "INSERT INTO pi_bd (titulo, resumo, curso, ano, nome_pdf) VALUES (:titulo, :resumo, :curso, :ano, :nome_pdf)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':titulo', $titulo);
        $stmt->bindValue(':resumo', $resumo);
        $stmt->bindValue(':curso', $curso);
        $stmt->bindValue(':ano', $ano);
        $stmt->bindValue(':nome_pdf', $arquivo);
        $result = $stmt->execute();
        return ($result)?true:false;
    }
}