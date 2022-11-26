<!DOCTYPE html>
<html lang="fr-FR" prefix="og: https://ogp.me/ns#">

<head>
    <meta charset="UTF-8">
    <title>Carpooling voitures</title>
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

            use App\Controllers\CarsController;
            use App\Services\CarsService;

            require __DIR__ . '/vendor/autoload.php';

            $controller = new CarsController();
            echo $controller->getCars();
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

                
                $controller = new CarsController();
                echo $controller->createCar();

            ?>

            <p>Création d'une voiture</p>
            <form method="post" action="cars.php" name ="carsCreateForm">
                <label for="brand">Marque :</label>
                <input type="text" name="brand">
                <br />
                <label for="model">Modèle :</label>
                <input type="text" name="model">
                <br />
                <label for="color">Couleur :</label>
                <input type="text" name="color">
                <br />
                <label for="nbrSlots">Places :</label>
                <input type="text" name="nbrSlots">
                <br />
                <input type="submit" value="Créer une voiture" class="button">
            </form>

        </section>

        <section>
            
            <?php

                require __DIR__ . '/vendor/autoload.php';

                $controller = new CarsController();
                echo $controller->deleteCar();

            ?>

            <p>Supression d'une voiture</p>
            <form method="post" action="cars.php" name ="carsDeleteForm">
                <label for="id">Id :</label>
                <input type="text" name="id">
                <br />
                <input type="submit" value="Supprimer une voiture" class="button">
            </form>

        </section>

        <section>
            
            <?php

                require __DIR__ . '/vendor/autoload.php';

                $controller = new CarsController();
                echo $controller->updateCar();

            ?>

            <p>Mise à jour d'une voiture</p>
            <form method="post" action="cars.php" name ="carsUpdateForm">
                <label for="id">Id :</label>
                <input type="text" name="id">
                <br />
                <label for="brand">Marque :</label>
                <input type="text" name="brand">
                <br />
                <label for="model">Modèle :</label>
                <input type="text" name="model">
                <br />
                <label for="color">Couleur :</label>
                <input type="text" name="color">
                <br />
                <label for="nbrSlots">Places :</label>
                <input type="text" name="nbrSlots">
                <br />
                <input type="submit" value="Modifier la voiture" class="button">
            </form>

        </section>

    </div>

</main>

</body>
</html>
