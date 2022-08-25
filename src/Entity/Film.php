<?php

namespace App\Entity;

final class Film
{
    /** @var int */
    private int $idFilm;

    /** @var string */
    private string $titreFilm;

    /** @var int */
    private int $anneeFilm;

    /** @var string */
    private string $resumeFilm;

    /** @var string */
    private string $afficheFilm;

    public function hydrate(array $aFilm): Film
    {
        $this->idFilm = $aFilm['f_id'];
        $this->titreFilm = $aFilm['f_titre'];
        $this->anneeFilm = $aFilm['f_annee'];
        $this->resumeFilm = $aFilm['f_desc'];
        $this->afficheFilm = $aFilm['f_affiche'];

        return $this;
    }

    /**
     * Get the value of idFilm
     */ 
    public function getIdFilm()
    {
        return $this->idFilm;
    }

    /**
     * Set the value of idFilm
     *
     * @return  self
     */ 
    public function setIdFilm($idFilm)
    {
        $this->idFilm = $idFilm;

        return $this;
    }

    /**
     * Get the value of titreFilm
     */ 
    public function getTitreFilm()
    {
        return $this->titreFilm;
    }

    /**
     * Set the value of titreFilm
     *
     * @return  self
     */ 
    public function setTitreFilm($titreFilm)
    {
        $this->titreFilm = $titreFilm;

        return $this;
    }

    /**
     * Get the value of anneeFilm
     */ 
    public function getAnneeFilm()
    {
        return $this->anneeFilm;
    }

    /**
     * Set the value of anneeFilm
     *
     * @return  self
     */ 
    public function setAnneeFilm($anneeFilm)
    {
        $this->anneeFilm = $anneeFilm;

        return $this;
    }

    /**
     * Get the value of resumeFilm
     */ 
    public function getResumeFilm()
    {
        return $this->resumeFilm;
    }

    /**
     * Set the value of resumeFilm
     *
     * @return  self
     */ 
    public function setResumeFilm($resumeFilm)
    {
        $this->resumeFilm = $resumeFilm;

        return $this;
    }

    /**
     * Get the value of afficheFilm
     */ 
    public function getAfficheFilm()
    {
        return $this->afficheFilm;
    }

    /**
     * Set the value of afficheFilm
     *
     * @return  self
     */ 
    public function setAfficheFilm($afficheFilm)
    {
        $this->afficheFilm = $afficheFilm;

        return $this;
    }
}