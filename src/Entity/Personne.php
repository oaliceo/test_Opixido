<?php

namespace App\Entity;

final class Personne 
{
    /** @var int */
    private int $idPersonne;

    /** @var string */
    private string $nomPersonne;

    /** @var string */
    private string $rolePersonne;

    public function hydrate(array $aPersonne): Personne
    {
        $this->idPersonne = $aPersonne['p_id'];
        $this->nomPersonne = $aPersonne['p_nom'];
        $this->rolePersonne = $aPersonne['p_role'];

        return $this;
    }

    /**
     * Get the value of idPersonne
     */ 
    public function getIdPersonne()
    {
        return $this->idPersonne;
    }

    /**
     * Set the value of idPersonne
     *
     * @return  self
     */ 
    public function setIdPersonne($idPersonne)
    {
        $this->idPersonne = $idPersonne;

        return $this;
    }

    /**
     * Get the value of nomPersonne
     */ 
    public function getNomPersonne()
    {
        return $this->nomPersonne;
    }

    /**
     * Set the value of nomPersonne
     *
     * @return  self
     */ 
    public function setNomPersonne($nomPersonne)
    {
        $this->nomPersonne = $nomPersonne;

        return $this;
    }

    /**
     * Get the value of rolePersonne
     */ 
    public function getRolePersonne()
    {
        return $this->rolePersonne;
    }

    /**
     * Set the value of rolePersonne
     *
     * @return  self
     */ 
    public function setRolePersonne($rolePersonne)
    {
        $this->rolePersonne = $rolePersonne;

        return $this;
    }
}