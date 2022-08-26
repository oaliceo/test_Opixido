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

        $acteurs = $filmModel->getActFilm($idFilm);
        $realisateurs = $filmModel->getRealFilm($idFilm);

        return $this->render('film', [
            'film' => $film,
            'acteurs' => $acteurs,
            'realisateurs' => $realisateurs,
        ], 'base.phtml');
    }

    public function genPersonne(): string
    {
        $persModel = new PersonneModel();

        $idPers = (int)$_GET['idPers'];

        $personne = $persModel->findPersonne($idPers);

        $films = $persModel->getFilmPers($idPers);

        return $this->render('personne', [
            'personne' => $personne,
            'films' => $films,
        ], 'base.phtml');
    }
}