<header class="fluid row">
    <div class="row-same-height">
        <div class="col-lg-9 col-sm-height">
            <div id="banner">
                <a href="index.php"><img src="web/image/banner_nobackground.png" alt="banner" /></a>
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
              	<h3 class="form-signin-heading">Connexion</h3>
                <form action="connexion.php" method="POST">
                    <div style="margin-bottom: 5px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="login" value="" placeholder="pseudo / email">
                    </div>
                    <div style="margin-bottom: 5px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="passe" placeholder="mot de passe">
                    </div>
                    <div class="text-right">
                    <input class="btn btn-success" type="submit" value="OK" />
                    </div>
                </form>

                <a href="inscription.php">Pas encore inscrit?</a></br>
                <a href="mot_de_passe_oublie.php">Mot de passe oubli&eacute;?</a><br/> 
            <?php endif ?>
        </div>
    </div>
</header>

<div id="main" class="container-fluid col-lg-12">
