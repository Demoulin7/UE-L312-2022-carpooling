<?php

namespace App\Services;

use App\Entities\Annonce;

class AnnoncesService
{
    /**
     * Return all annonces.
     */
    public function getAnnonces(): array
    {
        $annonces = [];

        $dataBaseService = new DataBaseService();
        $annoncesDTO = $dataBaseService->getAnnonces();
        if (!empty($annoncesDTO)) {
            foreach ($annoncesDTO as $annonceDTO) {
                $annonce = new Annonce();
                $annonce->setId($annonceDTO['id']);
                $annonce->setPrix($annonceDTO['prix']);
                $annonce->setTrajet($annonceDTO['trajet']);
                $annonce->setUserName($annonceDTO['firstname'] . " " . $annonceDTO['lastname']);
                $annonce->setCarPlaces($annonceDTO['brand'] . " " . $annonceDTO['nbrSlots'] . " places");
                $annonces[] = $annonce;
            }
        }

        return $annonces;
    }
}
