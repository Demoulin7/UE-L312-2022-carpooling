<!DOCTYPE html>
<html lang="fr-FR" prefix="og: https://ogp.me/ns#">

<head>
    <meta charset="UTF-8">
    <title>Carpooling utilisateurs</title>
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

			use App\Controllers\UsersController;
            use App\Services\CarsService;

			require __DIR__ . '/vendor/autoload.php';

			$controller = new UsersController();
			echo $controller->getUsers();
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

                
                $controller = new UsersController();
                echo $controller->createUser();

                $carsService = new CarsService();
                $cars = $carsService->getCars();

            ?>

            <p>Création d'un utilisateur</p>
            <form method="post" action="users.php" name ="userCreateForm">
                <label for="firstname">Prénom :</label>
                <input type="text" name="firstname">
                <br />
                <label for="lastname">Nom :</label>
                <input type="text" name="lastname">
                <br />
                <label for="email">Email :</label>
                <input type="text" name="email">
                <br />
                <label for="birthday">Date d'anniversaire au format dd-mm-yyyy :</label>
                <input type="text" name="birthday">
                <br />
                <label for="cars">Voiture(s) :</label>
                <?php foreach ($cars as $car): ?>
                    <?php $carName = $car->getBrand() . ' ' . $car->getModel() . ' ' . $car->getColor(); ?>
                    <input type="checkbox" name="cars[]" value="<?php echo $car->getId(); ?>"><?php echo $carName; ?>
                    <br />
                <?php endforeach; ?>
                <br />
                <input type="submit" value="Créer un utilisateur" class="button">
            </form>

        </section>

        <section>
            
            <?php

                require __DIR__ . '/vendor/autoload.php';

                $controller = new UsersController();
                echo $controller->updateUser();

            ?>

            <p>Mise à jour d'un utilisateur</p>
            <form method="post" action="users.php" name ="userUpdateForm">
                <label for="id">Id :</label>
                <input type="text" name="id">
                <br />
                <label for="firstname">Prénom :</label>
                <input type="text" name="firstname">
                <br />
                <label for="lastname">Nom :</label>
                <input type="text" name="lastname">
                <br />
                <label for="email">Email :</label>
                <input type="text" name="email">
                <br />
                <label for="birthday">Date d'anniversaire au format dd-mm-yyyy :</label>
                <input type="text" name="birthday">
                <br />
                <input type="submit" value="Modifier l'utilisateur" class="button">
            </form>

        </section>

        <section>
            
            <?php

                require __DIR__ . '/vendor/autoload.php';

                $controller = new UsersController();
                echo $controller->deleteUser();

            ?>

            <p>Supression d'un utilisateur</p>
            <form method="post" action="users.php" name ="userDeleteForm">
                <label for="id">Id :</label>
                <input type="text" name="id">
                <br />
                <input type="submit" value="Supprimer un utilisateur" class="button">
            </form>

        </section>

    </div>

</main>

</body>
</html>
