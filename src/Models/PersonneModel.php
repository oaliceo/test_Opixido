<?php

namespace App\Models;

use App\Framework\Database;
use App\Entity\Personne;

class PersonneModel
{
    protected Database $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }
    
    public function findAllPersonnes(): array
    {
        $sql = 'SELECT * FROM personne';
        $aPersonnes = [];
        $aResults = $this->db->getAllResults($sql);

        foreach($aResults as $personne){
            $aPersonnes[] = (new Personne())->hydrate($personne);
        }
        return $aPersonnes;
    }

    public function findPersonne(int $idPersonne): Personne
    {
        $sql = 'SELECT * 
                FROM personne
                WHERE p_id = :idPersonne';
        $personne = $this->db->getOneResult($sql, [':idPersonne' => $idPersonne]);

        $oPersonne = (new Personne())->hydrate($personne);

        return $oPersonne;
    }
}