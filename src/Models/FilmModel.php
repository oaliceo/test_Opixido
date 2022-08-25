<?php

namespace App\Models;

use App\Framework\Database;
use App\Entity\Film;


class FilmModel
{
    protected Database $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function findAllFilms(): array
    {
        $sql = 'SELECT * FROM film';
        $aFilms = [];
        $aResults = $this->db->getAllResults($sql);

        foreach($aResults as $film){
            $aFilms[] = (new Film())->hydrate($film);
        }
        return $aFilms;
    }

    public function findFilm(int $idFilm): Film
    {
        $sql = 'SELECT * 
                FROM film
                WHERE f_id = :idFilm';
        $film = $this->db->getOneResult($sql, [':idFilm' => $idFilm]);

        $oFilm = (new Film())->hydrate($film);

        return $oFilm;
    }

    public function getPersFilm(int $idFilm): array
    {
        $sql = 'SELECT p_nom
        FROM film_has_personne
        INNER JOIN film ON film_has_personne.film_f_id = film.f_id
        INNER JOIN personne ON film_has_personne.personne_p_id = personne.p_id
        WHERE film_f_id = :idFilm';
        $aPersonnes = [];
        $aResults = $this->db->getAllResults($sql, [':idFilm' => $idFilm]);
        // var_dump($aResults);

        foreach ($aResults as $personne){
            $aPersonnes[] = $personne['p_nom'];
        }
        // var_dump($aPersonnes);
        return $aPersonnes;
    }

    public function getActFilm(int $idFilm): array
    {
        $sql = 'SELECT p_nom
        FROM film_has_personne
        INNER JOIN film ON film_has_personne.film_f_id = film.f_id
        INNER JOIN personne ON film_has_personne.personne_p_id = personne.p_id
        WHERE p_role LIKE "Acteur%"
        AND film_f_id = :idFilm';
        $aPersonnes = [];
        $aResults = $this->db->getAllResults($sql, [':idFilm' => $idFilm]);
        // var_dump($aResults);

        foreach ($aResults as $personne){
            $aPersonnes[] = $personne['p_nom'];
        }
        // var_dump($aPersonnes);
        return $aPersonnes;
    }

    public function getRealFilm(int $idFilm): array
    {
        $sql = 'SELECT p_nom
        FROM film_has_personne
        INNER JOIN film ON film_has_personne.film_f_id = film.f_id
        INNER JOIN personne ON film_has_personne.personne_p_id = personne.p_id
        WHERE p_role LIKE "Real%"
        AND film_f_id = :idFilm';
        $aPersonnes = [];
        $aResults = $this->db->getAllResults($sql, [':idFilm' => $idFilm]);
        // var_dump($aResults);

        foreach ($aResults as $personne){
            $aPersonnes[] = $personne['p_nom'];
        }
        // var_dump($aPersonnes);
        return $aPersonnes;
    }

    
}