<?php

require_once __DIR__ . '/Database.php';

class GenreQuery extends Database
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }
    
    public function getAll()
    {
        $sql = "
                SELECT *
                FROM genres
        ";
        $statement = static::$pdo->prepare($sql);
        $statement->execute();
        $genres = $statement->fetchAll(PDO::FETCH_OBJ);
        return $genres;
    }
}
?>