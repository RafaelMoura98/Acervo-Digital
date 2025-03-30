<?php


class Projetos
{

    public static function consultarProjetos()
    {
        $pdo = Database::conexao();
        $sql = "SELECT * FROM arquivos_bd ";
        $stmt = $pdo->prepare($sql);
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
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