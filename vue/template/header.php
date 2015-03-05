<header class="container-fluid">

    <div id="banner"  class="col-lg-10 ">
        <img src="web/image/banner.png" alt="banner" />
    </div>
    <div id='menuConnexion' class="col-lg-2">
        <?php if (isset($_SESSION['user'])) : ?>
            <img src="
            <?php
            if ($_SESSION['user']['avatar'] !== null) {
                echo $_SESSION['user']['avatar'];
            } else {
                echo'web/image/avatar.png';
            }
            ?>" alt="avatar"/>
            <a href="f_mes_profils.php" class="glyphicon glyphicon-user"> mes profils </a></br>
            <a href="f_info_perso.php" class="glyphicon glyphicon-cog"> mes infos perso </a></br>
            <a href="f_mes_favoris.php" class="glyphicon glyphicon-heart"> mes favoris </a></br>
            <a href="f_mes_participations.php" class="glyphicon glyphicon-thumbs-up"> mes participations </a></br>
            <a href="deconnexion.php" class="glyphicon glyphicon-off"> deconnexion </a>
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

