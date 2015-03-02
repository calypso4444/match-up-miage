<header class="container-fluid">
    <div id="banner"  class="col-lg-8 text-center">
        <img src="web/image/banner.png" alt="banner" />
    </div>
    <div id='menuConnexion' class="col-lg-4">
        <?php if (isset($_SESSION['user'])) : ?>
            <a href="deconnexion.php" class="btn btn-danger">deconnexion</a>
        <?php else: ?>
            <p>Connexion :</p>
            <form action="connexion.php" method="POST">
                <input type="text" name="login" placeholder='Votre login' /></br>
                <input type="password" name="passe" placeholder='Votre mot de passe' /></br>
                <input type="submit" value="OK" />
            </form>

            <a href="inscription.php">Pas encore inscrit?</a></br>
            <a href="mot_de_passe_oublie.php">Mot de passe oubli&eacute;?</a><br/> 
        <?php endif ?>
    </div>

</header>