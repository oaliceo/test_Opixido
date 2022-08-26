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

    // Trouver le film sur lequel la personne à travaillé
    public function getFilmPers(int $idPers): array
    {
        $sql = 'SELECT f_titre, f_id, f_affiche
        FROM film_has_personne
        INNER JOIN film ON film_has_personne.film_f_id = film.f_id
        INNER JOIN personne ON film_has_personne.personne_p_id = personne.p_id
        WHERE personne_p_id = :idPers';
        $aFilms = [];
        $aResults = $this->db->getAllResults($sql, [':idPers' => $idPers]);

        foreach ($aResults as $film){
            $aFilms[] = [$film['f_titre'], $film['f_id'], $film['f_affiche']];
        }
        return $aFilms;
    }
}