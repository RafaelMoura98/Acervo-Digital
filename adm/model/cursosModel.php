<?php


class Cursos
{
    public static function consultarCursos()
    {
        $pdo = Database::conexao();
        $sql = "SELECT curso FROM curso_bd ";
        $stmt = $pdo->prepare($sql);
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }
}