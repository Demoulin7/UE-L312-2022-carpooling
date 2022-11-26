<?php

namespace App\Controllers;

use App\Services\CarsService;

class CarsController
{
    /**
     * Return the html for the create action.
     */
    public function createCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['brand']) &&
            isset($_POST['model']) &&
            isset($_POST['color']) &&
            isset($_POST['nbrSlots'])){
            // Create the car :
            $carsService = new CarsService();
            $carId = $carsService->setCar(
                null,
                $_POST['brand'],
                $_POST['model'],
                $_POST['color'],
                $_POST['nbrSlots']
            );

            // Create the car users relations :
            $isOk = true;
            if (!empty($_POST['users'])) {
                foreach ($_POST['users'] as $userId) {
                    $isOk = $carsService->setUserCar($userId, $carId);
                }
            }
            if ($carId && $isOk) {
                $html = 'Voiture créé avec succès.';
                header('location:users.php');
            } else {
                $html = 'Erreur lors de la création de la voiture.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getCars(): string
    {
        $html = '
            <tr class="table100-head">
            <th class="column1">Id</th>
            <th class="column2">Marque</th>
            <th class="column3">Modele</th>
            <th class="column4">Couleur</th>
            <th class="column5">Places</th>
            </tr>
            </thead>
            <tbody>';

        // Get all cars :
        $carsService = new CarsService();
        $cars = $carsService->getCars();

        // Get html :
        foreach ($cars as $car) {
            $carsHtml = '';
            $html .=
                '<tr>' .
                '<td class="column1"> #' . $car->getId() . '</td>' .
                '<td class="column2">' . $car->getBrand() . '</td>' .
                '<td class="column3">' . $car->getModel() . '</td>' .
                '<td class="column4">' . $car->getColor() . '</td>' .
                '<td class="column5">' . $car->getNbrSlots() . '</td>' .
                '</tr>';
        }

        return $html;
    }

    /**
     * Update the car.
     */
    public function updateCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['brand']) &&
            isset($_POST['model']) &&
            isset($_POST['color']) &&
            isset($_POST['nbrSlots'])) {
            // Update the car :
            $carsService = new CarsService();
            $isOk = $carsService->setCar(
                $_POST['id'],
                $_POST['brand'],
                $_POST['model'],
                $_POST['color'],
                $_POST['nbrSlots']
            );
            if ($isOk) {
                $html = 'Voiture mis à jour avec succès.';
                header('location:users.php');
            } else {
                $html = 'Erreur lors de la mise à jour de la voiture.';
            }
        }

        return $html;
    }

    /**
     * Delete a car.
     */
    public function deleteCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the car :
            $carsService = new CarsService();
            $isOk = $carsService->deleteCar($_POST['id']);
            if ($isOk) {
                $html = 'Voiture supprimé avec succès.';
                header('location:users.php');
            } else {
                $html = 'Erreur lors de la supression de la voiture.';
            }
        }

        return $html;
    }
}
