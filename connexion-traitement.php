<?php

session_start();

$succes = "";

$erreur = "";

$donnees = $_POST;

$erreurs = [];

if (!isset($_POST["email"]) || empty($_POST["email"])) {
    $erreurs["email"] = "Le champ email est obligatoire. Veuillez le renseigner.";
} else if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
    $erreurs["email"] = "Le champ email est incorret. Veuillez renseigner une adresse mail correct.";
}

if (!isset($_POST["mot-de-passe"]) || empty($_POST["mot-de-passe"])) {
    $erreurs["mot-de-passe"] = "Le champ mot de passe est obligatoire. Veuillez le renseigner.";
}

if (empty($erreurs)) {

    //Traiter le formulaire : verifier si l'utilisateur sont les informations 
    //sont envoyer est autoriser a se connecter.

    if ($_POST["email"] == "connexion@gmail.com" && $_POST["mot-de-passe"] == "qwerty") {
        $succes = "Bravo vous acces a toutes les ressources du site.";
        $_SESSION["utilisateur-connecter"] = $_POST["email"];
        if (isset($_POST["se-souvenir-de-moi"]) && !empty($_POST["se-souvenir-de-moi"]) && "oui" == $_POST["se-souvenir-de-moi"]) {
            setcookie(
                "se-souvenir-de-moi",
                json_encode($donnees),
                [
                    'expires' => time() + 365 * 24 * 3600,
                    'secure' => true,
                    'httponly' => true,
                ]
            );
        }
    } else {
        $erreur = "Oups!!! Email ou mot de passe incorrect. Veuillez réessayer.";
    }
}


header("location: connexion.php?succes=$succes&erreur=$erreur&donnees=" . json_encode($donnees) . "&erreurs=" . json_encode($erreurs));
