<?php

require_once __DIR__ . '/Database.php';

class ArtistQuery extends Database
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
                FROM artists
        ";
        $statement = static::$pdo->prepare($sql);
        $statement->execute();
        $artists = $statement->fetchAll(PDO::FETCH_OBJ);
        return $artists;
    }
}
?>