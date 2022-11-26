<?php

namespace App\Controllers;

use App\Services\AnnoncesService;

class AnnoncesController
{
    /**
     * Return the html for the create action.
     */
    public function createAnnonce(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['prix']) &&
            isset($_POST['trajet']) &&
            isset($_POST['userId']) &&
            isset($_POST['carId'])) {
            // Create the annonce :
            $annoncesService = new AnnoncesService();
            $annonceId = $annoncesService->setAnnonce(
                null,
                $_POST['prix'],
                $_POST['trajet'],
                $_POST['userId'],
                $_POST['carId']
            );

            $html = 'Annonce créé avec succès.';

        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getAnnonces(): string
    {
        $html = '
            <tr class="table100-head">
            <th class="column1">Id</th>
            <th class="column2">Prix</th>
            <th class="column3">Trajet</th>
            <th class="column4">Utilisateur</th>
            <th class="column5">Voiture</th>
            </tr>
            </thead>
            <tbody>';

        // Get all annonces :
        $annoncesService = new AnnoncesService();
        $annonces = $annoncesService->getAnnonces();

        // Get html :
        foreach ($annonces as $annonce) {
            $annoncesHtml = '';
            $html .=
                '<tr>' .
                '<td class="column1"> #' . $annonce->getId() . '</td>' .
                '<td class="column2">' . $annonce->getPrix() . '</td>' .
                '<td class="column3">' . $annonce->getTrajet() . '</td>' .
                '<td class="column4">' . $annonce->getUserName() . '</td>' .
                '<td class="column5">' . $annonce->getCarPlaces() . '</td>' .
                '</tr>';
        }

        return $html;
    }

    /**
     * Update the annonce.
     */
    public function updateAnnonce(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['prix']) &&
            isset($_POST['trajet']) &&
            isset($_POST['userId']) &&
            isset($_POST['carId'])) {
            // Update the annonce :
            $annoncesService = new AnnoncesService();
            $isOk = $annoncesService->setAnnonce(
                $_POST['id'],
                $_POST['prix'],
                $_POST['trajet'],
                $_POST['userId'],
                $_POST['carId']
            );
            if ($isOk) {
                $html = 'Annonce mis à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de l\'annonce.';
            }
        }

        return $html;
    }

    /**
     * Delete an annonce.
     */
    public function deleteAnnonce(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the annonce :
            $annoncesService = new AnnoncesService();
            $isOk = $annoncesService->deleteAnnonce($_POST['id']);
            if ($isOk) {
                $html = 'Annonce supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de l\'annonce.';
            }
        }

        return $html;
    }
}
