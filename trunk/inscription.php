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
    <!-- SCRIPT -->

  <script language="Javascript" src="../js/verifInscription.js"></script>
    
    <!-- FIN SCRIPT-->
    
    <!-- DEBUT PAGE -->
    <body>
        <div class="content">
            <!-- DEBUT HEADER -->
            <?php include_once("include/head.php") ?>
            <!-- FIN HEADER -->

            <!-- DEBUT CONTENT -->

            <?php include_once("include/menu.php") ?>

            <section>
                <form name="fInscription">
                
                    Pseudo : <input type="text" maxlength="30" placeholder="lhommedu13100" name="case1" onKeyUp="suivantLimite(this, 'case2', 30)" onkeypress="suivantEnter(event, 'case2')" onblur="verifPseudo(this)"><br/>

                    Mot de passe : <input type="password" maxlength="20" name="case2" onKeyUp="suivantLimite(this, 'case3', 30)" onkeypress="suivantEnter(event, 'case3')"><br/>

                    Vérification Mot de passe : <input type="password" maxlength="20" name="case3"><br/>
                    
                  Vous êtes :<Select name"Fonction">
                  <option>------</option>
                  <option>Artiste</option>
                  <option>Gérant</option>
                  <option>Utilisateur</option>    
                  </select>
          
          <input button="submit" value="valider">
          </form>
            </section>

            <!-- FIN CONTENT-->
        </div>

        <!--DEBUT FOOTER-->
        <?php include_once("include/foot.php") ?>

        <!--FIN FOOTER-->
    </body>
</html>