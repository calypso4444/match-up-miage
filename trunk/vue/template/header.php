<header class="fluid row">
    <div class="row-same-height">
        <div class="col-lg-9 col-sm-height">
            <div id="banner">
                <a href="index.php"><img src="web/image/banner_nobackground.png" alt="banner"/></a>
            </div>
            <?php include_once 'nav.php';?>
        </div>
        <div id='menuConnexion' class="col-lg-2 col-sm-height">
            <?php if (isset($_SESSION['user'])) : ?>
            	<a href="f_info_perso.php"><img src="<?php echo $_SESSION['user']['avatar']; ?>" alt="avatar" class="img img-responsive"/></a></br>
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
    </div>
</header>

<div id="main" class="container-fluid col-lg-12">
