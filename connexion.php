<?php

session_start();

if (isset($_SESSION["utilisateur-connecter"]) && !empty($_SESSION["utilisateur-connecter"])) {
    header("location: index.php ");
}

$donnees = [];

$erreurs = [];

if (isset($_COOKIE["se-souvenir-de-moi"]) && !empty($_COOKIE["se-souvenir-de-moi"])) {
    $donnees = json_decode($_COOKIE["se-souvenir-de-moi"], true);
}

if (isset($_GET["donnees"]) && !empty($_GET["donnees"])) {
    $donnees = json_decode($_GET["donnees"], true);
}

if (isset($_GET["erreurs"]) && !empty($_GET["erreurs"])) {
    $erreurs = json_decode($_GET["erreurs"], true);
}

?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Connexion</title>
</head>

<body>

    <?php include_once "header.php"; ?>

    <div class="container">

        <div class="row">

            <div class="col-md-3"></div>

            <div class="col-md-6 mt-5">

                <form action="connexion-traitement.php" method="POST" novalidate>

                    <h1 class="text-center">Connexion</h1>


                    <?php if (isset($_SESSION["utilisateur-connecter"]) && !empty($_SESSION["utilisateur-connecter"])) { ?>

                        <p>
                            Cliquez ici pour vous déconnecter

                            <a class="btn btn-danger" href="deconnexion.php">
                                Deconnexion
                            </a>

                        </p>

                    <?php } else { ?>

                        <p>Vous etes actuelle déconnecter. Veuillez remlir le formulaire de comnexion</p>

                    <?php }  ?>

                    <?php if (isset($_GET["succes"]) && !empty($_GET["succes"])) { ?>

                        <div class="alert alert-success" role="alert">
                            <?= $_GET["succes"]; ?>
                        </div>

                    <?php } ?>

                    <?php if (isset($_GET["erreur"]) && !empty($_GET["erreur"])) { ?>

                        <div class="alert alert-danger" role="alert">
                            <?= $_GET["erreur"]; ?>
                        </div>

                    <?php } ?>

                    <div class="mb-3">
                        <label for="connexion-email" class="form-label">
                            Email :
                        </label>

                        <input type="email" class="form-control connexion-email" id="connexion-email" name="email" required value="<?= (isset($donnees["email"]) && !empty($donnees["email"])) ? $donnees["email"] : "" ?>" />

                        <?php if (isset($erreurs["email"]) && !empty($erreurs["email"])) { ?>
                            <p class="text-danger">
                                <?= $erreurs["email"]; ?>
                            </p>
                        <?php } ?>
                    </div>

                    <div class="mb-3">
                        <label for="connexion-mot-de-passe" class="form-label">
                            Mot de passe :
                        </label>

                        <input type="password" class="form-control connexion-mot-de-passe" id="connexion-mot-de-passe" name="mot-de-passe" required value="<?= (isset($donnees["mot-de-passe"]) && !empty($donnees["mot-de-passe"])) ? $donnees["mot-de-passe"] : "" ?>" />

                        <?php if (isset($erreurs["mot-de-passe"]) && !empty($erreurs["mot-de-passe"])) { ?>
                            <p class="text-danger">
                                <?= $erreurs["mot-de-passe"]; ?>
                            </p>
                        <?php } ?>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="connexion-se-souvenir-de-moi" name="se-souvenir-de-moi" value="oui">

                        <label class="form-check-label" for="connexion-se-souvenir-de-moi">
                            Se souvenir de moi
                        </label>
                    </div>

                    <button type="reset" class="btn btn-danger">Annuler</button>
                    <button type="submit" class="btn btn-primary">Connexion</button>

                </form>

            </div>

            <div class="col-md-3"></div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>