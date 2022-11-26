<!DOCTYPE html>
<html lang="fr-FR" prefix="og: https://ogp.me/ns#">

<head>
    <meta charset="UTF-8">
    <title>Carpooling reservations</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
</head>
<body>

<?php
include("header.php");
?>

<main id="content" class="content">
    <section>

        <div class="container-table100">
        <div class="wrap-table100">
        <div class="table100">
        <table>
        <thead>

        <?php

            use App\Controllers\ReservationsController;
            use App\Services\ReservationsService;

            require __DIR__ . '/vendor/autoload.php';

            $controller = new ReservationsController();
            echo $controller->getReservations();
        ?>

        </tbody>
        </table>
        </div>
        </div>
        </div>

    </section>

    <div id="bdd" class="bdd">

        <section>

            <?php

                require __DIR__ . '/vendor/autoload.php';

                
                $controller = new ReservationsController();
                echo $controller->createReservation();

            ?>

            <p>Création d'une reservation</p>
            <form method="post" action="reservations.php" name ="reservationsCreateForm">
                <label for="places">Places :</label>
                <input type="text" name="places">
                <br />
                <input type="submit" value="Créer une reservation" class="button">
            </form>

        </section>

        <section>
            
            <?php

                require __DIR__ . '/vendor/autoload.php';

                $controller = new ReservationsController();
                echo $controller->deleteReservation();

            ?>

            <p>Supression d'une reservation</p>
            <form method="post" action="reservations.php" name ="reservationsDeleteForm">
                <label for="id">Id :</label>
                <input type="text" name="id">
                <br />
                <input type="submit" value="Supprimer une reservation" class="button">
            </form>

        </section>

        <section>
            
            <?php

                require __DIR__ . '/vendor/autoload.php';

                $controller = new ReservationsController();
                echo $controller->updateReservation();

            ?>

            <p>Mise à jour d'une reservation</p>
            <form method="post" action="reservations.php" name ="reservationsUpdateForm">
                <label for="id">Id :</label>
                <input type="text" name="id">
                <br />
                <label for="places">Places :</label>
                <input type="text" name="places">
                <br />
                <input type="submit" value="Modifier la reservation" class="button">
            </form>

        </section>

    </div>

</main>

</body>
</html>
