<?php

class CadastrarPI
{
    public static function cadastrarPI($titulo, $resumo, $curso, $ano, $arquivo)
    {
        $pdo = Database::conexao();
        $sql = "INSERT INTO pi_bd (titulo, resumo, curso, ano, nome_pdf) VALUES (:titulo, :resumo, :curso, :ano, :nome_pdf)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':titulo', $titulo);
        $stmt->bindValue(':resumo', $resumo);
        $stmt->bindValue(':curso', $curso);
        $stmt->bindValue(':ano', $ano);
        $stmt->bindValue(':nome_pdf', $arquivo);
        return $stmt->execute();
    }
}

class Cursos
{
    public static function consultarNomeCursos()
    {
        $pdo = Database::conexao();
        $sql = "SELECT id,curso FROM curso_bd ";
        $stmt = $pdo->prepare($sql);
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

}