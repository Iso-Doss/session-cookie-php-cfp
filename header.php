<nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
    <a class="navbar-brand" href="#">Mon site</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    Acceuil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="a-propos.php">
                    A propos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">
                    Contact
                </a>
            </li>
        </ul>

        <?php if (isset($_SESSION["utilisateur-connecter"]) && !empty($_SESSION["utilisateur-connecter"])) { ?>

           <p class="text-white"> Bienvenu <?= $_SESSION["utilisateur-connecter"] ?></p>
            
            <a class="btn btn-outline-danger my-2 my-sm-0" href="deconnexion.php">Déconnexion</a>

        <?php }else{ ?>

            <a class="btn btn-outline-primary my-2 my-sm-0" href="deconnexion.php">Se connecter</a>

        <?php }  ?>

    </div>
</nav>