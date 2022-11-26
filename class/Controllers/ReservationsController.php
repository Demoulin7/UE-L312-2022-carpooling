<?php

namespace App\Controllers;

use App\Services\ReservationsService;

class ReservationsController
{
    /**
     * Return the html for the create action.
     */
    public function createReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['passagers'])){
            // Create the reservation :
            $reservationsService = new ReservationsService();
            $reservationId = $reservationsService->setReservation(
                null,
                $_POST['passagers']
            );

            $html = 'Reservation créé avec succès.';
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getReservations(): string
    {
        $html = '
            <tr class="table100-head">
            <th class="column1">Id</th>
            <th class="column2">passagers</th>
            </tr>
            </thead>
            <tbody>';

        // Get all users :
        $reservationsService = new ReservationsService();
        $reservations = $reservationsService->getReservations();

        // Get html :
        foreach ($reservations as $reservation) {
            $reservationsHtml = '';
            $html .=
                '<tr>' .
                '<td class="column1"> #' . $reservation->getId() . '</td>' .
                '<td class="column2">' . $reservation->getPassagers() . '</td>' .
                '</tr>';
        }

        return $html;
    }

    /**
     * Update the reservation.
     */
    public function updateReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['passagers'])) {
            // Update the reservation :
            $usersService = new UsersService();
            $isOk = $usersService->setUser(
                $_POST['id'],
                $_POST['passagers']
            );
            if ($isOk) {
                $html = 'Reservation mis à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de la reservation.';
            }
        }

        return $html;
    }

    /**
     * Delete an reservation.
     */
    public function deleteReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the reservation :
            $reservationsService = new ReservationsService();
            $isOk = $reservationsService->deleteReservation($_POST['id']);
            if ($isOk) {
                $html = 'Reservation supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de la reservation.';
            }
        }

        return $html;
    }
}
