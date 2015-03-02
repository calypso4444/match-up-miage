<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <!-- DEBUT DESCRIPTION PAGE -->
    <head>
        <title>MATCH'UP_INFOS_PERSOS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style.css" media="screen" />
    </head>
    <!-- FIN DESCRIPTION PAGE -->

    <!-- DEBUT PAGE -->
    <body>
        <div class="content">
            <!-- DEBUT HEADER -->
            <?php include_once("include/head.php") ?>
            <!-- FIN HEADER -->

            <!-- DEBUT CONTENT -->
            <?php include_once("include/menu.php") ?>
    
            <section id="formulaireI">
                <h1> Votre profil </h1>
                <form id="formulaireInscription" method ="post" name="verificationInscription1">

                    <div>
                        <label for="email"> Votre mail : * </label> 
                        <input id="email" type="text" name="email" placeholder="test@sorbonne.fr" value=""/>
                        <span id="emailInfo"></span><br/>
                    </div>

                    <div>   
                        <label for="pseudo"> Pseudo : * </label>
                        <input id="pseudo" type="text" name="pseudo" placeholder="lhommedu13" value=""/>
                        <span id="pseudoInfo"></span><br/>
                    </div>

                    <div>   
                        <label for="passe"> Mot de passe : * </label>
                        <input id="passe" type="password" name="passe" value=""/>
                        <span id="passeInfo"></span><br/>
                    </div>

                    <div>    
                        <label for="passe2"> V&eacute;rification de votre mot de passe : * </label>
                        <input id="passe2" type="password" name="passe2" value=""/>
                        <span id="passe2Info"></span><br/>
                    </div>

                    <div>
                        <input type="submit" value="M'inscrire" id="envoyer"/>
                    </div>

                </form>
            </section>
        <!-- FIN CONTENT-->
        </div>

        <!--DEBUT FOOTER-->
        <?php include_once("include/foot.php") ?>

        <!--FIN FOOTER-->
    </body>
</html>