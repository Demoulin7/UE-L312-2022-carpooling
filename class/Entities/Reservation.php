<?php

namespace App\Entities;

class Reservation
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

    public function getPassagers(): int
    {
        return $this->passagers;
    }

    public function setPassagers(int $passagers): void
    {
        $this->passagers = $passagers;
    }
}
