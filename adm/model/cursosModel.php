<?php


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