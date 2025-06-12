<?php
require_once BASE_PATH . '/config/conexao.php';


class Projetos 
{
    
        public static function consultarProjetos($cursos, $anos)
    {
        $pdo = Database::conexao();
        $sql = "SELECT pi.*, c.id AS curso_id, c.curso AS nome_curso
                FROM pi_bd pi
                JOIN curso_bd c ON pi.curso = c.id
                WHERE 1=1";
        $params = [];

        // --- Curso: array ou valor único
        if (!empty($cursos)) {
            if (is_array($cursos)) {
                // IN (?, ?, ...)
                $placeholders = implode(',', array_fill(0, count($cursos), '?'));
                $sql .= " AND c.id IN ($placeholders)";
                // preserva ordem dos ? na array
                $params = array_merge($params, $cursos);
            } else {
                $sql .= " AND c.id = ?";
                $params[] = $cursos;
            }
        }

        // --- Ano: array ou valor único
        if (!empty($anos)) {
            if (is_array($anos)) {
                $placeholders = implode(',', array_fill(0, count($anos), '?'));
                $sql .= " AND pi.ano IN ($placeholders)";
                $params = array_merge($params, $anos);
            } else {
                $sql .= " AND pi.ano = ?";
                $params[] = $anos;
            }
        }

        $sql .= " ORDER BY pi.titulo ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

        public static function consultarProjetoPorId($id)
    {
        $pdo = Database::conexao();
        $sql = "SELECT pi.id, pi.titulo, pi.resumo, pi.curso, pi.ano, pi.nome_pdf
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
    

}