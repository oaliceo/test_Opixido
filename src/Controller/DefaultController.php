<?php

namespace App\Controller;

use App\Models\PersonneModel;
use App\Models\FilmModel;

class DefaultController extends AbstractController
{
    public function genHome() :string
    {
        $filmModel = new FilmModel();
        $films = $filmModel->findAllFilms();

        return $this->render('home', ['films' => $films], 'base.phtml');
    }

    public function genFilm() :string
    {
        $filmModel = new FilmModel();

        $idFilm = (int)$_GET['idFilm'];

        $film = $filmModel->findFilm($idFilm);

        if(!$film){
            echo 'ERREUR : aucun film ne possède l\'ID '.$idFilm;
            exit;
        }

        $acteurs = $filmModel->getActFilm($idFilm);
        $realisateur = $filmModel->getRealFilm($idFilm);

        return $this->render('film', [
            'film' => $film,
            'acteurs' => $acteurs,
            'realisateurs' => $realisateur,
        ], 'base.phtml');
    }

}