<!DOCTYPE html>
<html lang="fr-FR" prefix="og: https://ogp.me/ns#">

<head>
    <meta charset="UTF-8">
    <title>Carpooling annonces</title>
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

            use App\Controllers\AnnoncesController;
            use App\Services\AnnoncesService;

            require __DIR__ . '/vendor/autoload.php';

            $controller = new AnnoncesController();
            echo $controller->getAnnonces();
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

                
                $controller = new AnnoncesController();
                echo $controller->createAnnonce();

            ?>

            <p>Création d'une annonce</p>
            <form method="post" action="annonces.php" name ="annoncesCreateForm">
                <label for="prix">Prix :</label>
                <input type="text" name="prix">
                <br />
                <label for="trajet">Trajet (A=>B) :</label>
                <input type="text" name="trajet">
                <br />
                <label for="userName">UserName :</label>
                <input type="text" name="userName">
                <br />
                <label for="carPlaces">CarPlaces :</label>
                <input type="text" name="carPlaces">
                <br />
                <input type="submit" value="Créer une annonce" class="button">
            </form>

        </section>

        <section>
            
            <?php

                require __DIR__ . '/vendor/autoload.php';

                $controller = new AnnoncesController();
                echo $controller->deleteAnnonce();

            ?>

            <p>Supression d'une annonce</p>
            <form method="post" action="annonces.php" name ="annoncesDeleteForm">
                <label for="id">Id :</label>
                <input type="text" name="id">
                <br />
                <input type="submit" value="Supprimer une annonce" class="button">
            </form>

        </section>

        <section>
            
            <?php

                require __DIR__ . '/vendor/autoload.php';

                $controller = new AnnoncesController();
                echo $controller->updateAnnonce();

            ?>

            <p>Mise à jour d'une annonce</p>
            <form method="post" action="annonces.php" name ="annoncesUpdateForm">
                <label for="id">Id :</label>
                <input type="text" name="id">
                <br />
                <label for="prix">Prix :</label>
                <input type="text" name="prix">
                <br />
                <label for="trajet">Trajet (A=>B) :</label>
                <input type="text" name="trajet">
                <br />
                <label for="userId">UserId :</label>
                <input type="text" name="userId">
                <br />
                <label for="carId">CarId :</label>
                <input type="text" name="carId">
                <br />
                <input type="submit" value="Modifier l annonce" class="button">
            </form>

        </section>

    </div>

</main>

</body>
</html>
