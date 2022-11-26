<?php

namespace App\Services;

use App\Entities\Reservations;

class ReservationsService
{
    /**
     * Return all reservations.
     */
    public function getReservations(): array
    {
        $reservations = [];

        $dataBaseService = new DataBaseService();
        $reservationsDTO = $dataBaseService->getReservations();
        if (!empty($reservationsDTO)) {
            foreach ($reservationsDTO as $reservationDTO) {
                $reservation = new Reservation();
                $reservation->setId($reservationDTO['id']);
                $reservation->setPassagers($reservationDTO['passagers']);
                $reservations[] = $reservation;
            }
        }

        return $reservations;
    }
}
