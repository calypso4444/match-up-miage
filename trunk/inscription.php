<!DOCTYPE html >

<html xml:lang="fr" lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <title>
            Inscription
        </title>
        <!-- La feuille de styles "base.css" doit être appelée en premier. -->
        <link rel="stylesheet" type="text/css" href="styles/base.css" media="all" />
        <link rel="stylesheet" type="text/css" href="styles/modele08.css" media="screen" />
    </head>

    <body>

        <div id="global">

            <div id="entete">
                <h1 >
                    <a href='Accueil.html'><img alt="" src="picto/08.png" />
                    <span>Match'up</span>
                    </a>
                </h1>
                <!--   <p class="sous-titre">
                        <strong>Caractéristiques:</strong>
              '          menu de navigation horizontal,
                        colonnes factices,
                        largeur fixe 900px
                </p>   -->
            </div><!-- #entete -->

            <div id="navigation">
                <ul>
                    <li class="gauche"><a href="Quefaire.html">Que faire ?</a></li>
                    <li class="gauche"><a href="Salle.html">Salles</a></li>
                    <li class="gauche"><a href="Artiste.html">Artistes</a></li>			
                    <li class="gauche"><a href="Annonce.html">Annonces</a></li>
                    <li class="gauche"><a href="Recherche.html">Recherche</a></li>
                    <li class="droite"><a>Connexion</a></li>
                    <li class="droite"><a href="Inscription.html">Inscription Musicien</a></li>
                    <li class="droite"><a href="Inscription.html">Inscription Salle</a></li>		
                </ul>
                <div id="centre">

                    <div id="principal">
                        <h2>Inscriptions</h2>


                        <form method="post" action="traitement.php" >
                            <table>
                                <tr><td> <label for="email">Email :</label></td>
                                    <td><input type="email" name="email" id="email" placeholder="monaddresse@hotmail.fr" size="30" maxlength="30"/>
                                    </td></tr>

                                <tr><td><label for="pass">Mot de passe :</label></td>
                                    <td><input type="password" name="pass" id="pass" placeholder="Minimun 6 caractères" size="30" minlength="6"/>
                                    </td></tr>

                                <tr><td><label for="pass">Confirmation mot de passe :</label></td>
                                    <td>  <input type="password" name="pass" id="pass"  size="30" minlength="6"/> </td>
                            </tr>
                            <tr>
                                <td> <label for="pass">Pseudo :</label></td>
                                <td>     <input type="password" name="pass" id="pass"  size="30" /></td>
                            </tr>
                            <tr> 
                                <td><input type="submit" value="Envoyer" /></td>
                            </tr>
                            </table> 
                        </form>

                    </div><!-- #principal -->               

                </div>
                <footer> 
                    <p id="copyright">
                        Mise en page &copy; 2014 SimonDesign
                        <a href="Accueil.html">Match'up</a> et
                        <a href="A_propos_du_site">A propos du site</a>
                    </p>
                </footer>
            </div>
    </body>
</html>