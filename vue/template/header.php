<header class="fluid row">
    <div class="row-same-height">
        <div class="col-lg-10 col-sm-height">
            <div id="banner">
                <img src="web/image/banner.png" alt="banner" />
            </div>
            <nav>
                </br>
                <ul class="menu navbar nav-justified navbar-form ">
                    <li class="text-center"><a href="index.php">Accueil</a></li>
                    <li class="text-center"><a href="que_faire.php">Que faire ?</a></li>
                    <li class="text-center"><a href="tous_les_artistes.php">Artistes</a></li>
                    <li class="text-center"><a href="toutes_les_salles.php">Salles</a></li>
                    <li class="text-center"><a href="petites_annonces.php">Petites annonces</a></li>	
                    <li class="text-center">
                        <form id="formulaireRecherche" method ="post" name="recherche">
                            <label for="recherche"></label> 
                            <input id="recherche" type="text" name="recherche" placeholder="Tapez votre recherche ici" value=""/>
                            <input  type="submit" value="GO" id="envoyer"/>
                            <a href="f_recherche_avancee.php" class="glyphicon glyphicon-plus"></a>
                        </form>
                    </li>
                </ul>

            </nav>
        </div>
        <div id='menuConnexion' class="col-lg-2 col-sm-height">
            <?php if (isset($_SESSION['user'])) : ?>
                <img src="<?php echo $_SESSION['user']['avatar']; ?>" alt="avatar"/></br>
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

