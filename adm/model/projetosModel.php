<?php


require_once $_SERVER['DOCUMENT_ROOT'].'/Acervo-Digital/config/conexao.php';


class Projetos 
{
    
        public static function consultarProjetos($curso, $ano)
    {
        $pdo = Database::conexao();
        $sql = "SELECT a.*, c.id
                FROM arquivos_bd a
                JOIN curso_bd c ON a.id_curso = c.id
                WHERE 1=1";
        $params = [];

        if ($curso) {
            $sql .= " AND c.id = :curso";
            $params[':curso'] = $curso;
        }

        if ($ano) {
            $sql .= " AND a.ano_publi = :ano";
            $params[':ano'] = $ano;
        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);  // Passando os parâmetros para a execução
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function consultarAnosPubliProjetos()
    {   
        $pdo = Database::conexao();
        $sql = "SELECT DISTINCT ano_publi FROM arquivos_bd ORDER BY ano_publi ASC;";
        $stmt = $pdo->prepare($sql);
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }


}