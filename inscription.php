<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <!-- DEBUT DESCRIPTION PAGE -->
    <head>
        <title>MATCH'UP_ACCUEIL</title>
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
            
    <form name="Formulaire_Inscription">
      Nom : <input type="text" placeholder="Ex : Boissise" maxlength="20" name="case1" onKeyUp="suivantLimite(this,'case2', 20)" onkeypress="suivantEnter(event, 'case2')"><br/>
      Prénom :<input type="text" maxlength="20" placeholder="Ex : Remi" name="case2" onKeyUp="suivantLimite(this,'case3', 20)" onkeypress="suivantEnter(event, 'case3')"><br/>
      Age : <input type="number" maxlength="3" placeholder="Ex : 22" name="case3" onKeyUp="suivantLimite(this,'case4', 3)" onkeypress="suivantEnter(event,'case4')"><br/>
      Pseudo : <input type="text" maxlength="3" placeholder="Ex : 22" name="case4" onKeyUp="suivantLimite(this,'case5', 30)" onkeypress="suivantEnter(event,'case4')"><br/>
      Mot de passe : <input type="password" maxlength="20" placeholder="Ex : 22" name="case3" onKeyUp="suivantLimite(this,'case4', 30)" onkeypress="suivantEnter(event,'case4')"><br/>
      Vérification Mot de passe : <input type="password" maxlength="20" placeholder="Ex : 22" name="case3" onKeyUp="suivantLimite(this,'case4', 30)" onkeypress="suivantEnter(event,'case4')"><br/>
      Vous êtes : <input type="checkbox" name="Fonction" value="Rugby"> Artiste<br/>
                  <input type="checkbox" name="Fonction" value="Rugby">Gérant<br/>
    </form>
            
        <!-- FIN CONTENT-->
        </div>

        <!--DEBUT FOOTER-->
        <?php include_once("include/foot.php") ?>

        <!--FIN FOOTER-->
    </body>
</html>