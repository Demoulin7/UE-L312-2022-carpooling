<?php

namespace App\Entities;

class Annonce
{
    private $id;
    private $nom;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getPrix(): int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): void
    {
        $this->prix = $prix;
    }

    public function getTrajet(): string
    {
        return $this->trajet;
    }

    public function setTrajet(string $trajet): void
    {
        $this->trajet = $trajet;
    }
}
