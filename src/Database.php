<?php

namespace App\Framework;

class Database
{
    private $pdo;

    public static $instance = NULL;

    private function __construct()
    {
        $this->pdo=$this->getPDOConnection();
    }
    
    public static function getInstance(): self 
    {
        if (is_null(self::$instance)){
            self::$instance = new Database();
        }
        return self::$instance;
    }
    /**
     * Connexion à la BDD avec PDO
     */
    function getPDOConnection():\PDO
    {
        $pdo = new \PDO(
            'mysql:host=localhost;dbname=opixido_films;charset=utf8',
            'opixido', 
            '(:opixido:)' 
        ); 
        
        $pdo->exec('SET NAMES UTF8');
        
        // transformer erreurs SQL en erreur PHP pour qu'elles soient affichées sur la page
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);

        return $pdo;
    }


    /**
     * Prépare et exécute une requête SQL
     */
    function prepareAndExecute(string $sql, array $values = []): \PDOStatement
    {
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->execute($values);

        //var_dump($pdoStatement->errorInfo());
        return $pdoStatement;
    }


    /**
     * Exécute une requête de séléction et récupère UN résultat
     */
    function getOneResult(string $sql, array $values = []): array
    {
        $pdoStatement = $this->prepareAndExecute($sql, $values);
        $result = $pdoStatement->fetch();

        if(!$result){
            return [];
        }

        return $result;
    }

    /**
     * Exécute une requête de séléction et récupère PLUSIEURS résultat
     */
    function getAllResults(string $sql, array $values = []): array
    {
        $pdoStatement = $this->prepareAndExecute($sql, $values);
        $results = $pdoStatement->fetchAll();

        if(!$results){
            return [];
        }

        return $results;
    }
}