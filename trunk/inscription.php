<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <!-- CONNEXION A LA BDD -->
    <?php
    $link = mysqli_connect("localhost","root","root") ;
    mysqli_select_db($link, "mu_db");
    ?>

    <!-- DEBUT DESCRIPTION PAGE -->
    <head>
        <title>MATCH'UP_INSCRIPTION</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style.css" media="screen" />
            
    </head>
    <!-- FIN DESCRIPTION PAGE -->
    
    <!-- SCRIPT -->

	<script>
			function surligne(champ, erreur){
         if(erreur)
          champ.style.backgroundColor = "#fba";
         else
          champ.style.backgroundColor = "#54F98D";
      }

     function verifPseudo(champ){
	    var pseudo = /^[a-zA-Z0-9]{2,25}$/;
        if(!pseudo.test(champ.value)){
				surligne(champ, true);
				return false;
        	}else{
				surligne(champ, false);
				return true;
   		}
     }

     function verifMail(champ){
     var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
        if(!regex.test(champ.value)){
           surligne(champ, true);
           return false;
   		}else{
   			surligne(champ, false);
   			return true;
   		}
     }	
     
    function verifForm(f){
	var pseudoOk = verifPseudo(f.pseudo);
	var mailOk = verifMail(f.email);
		if(pseudoOk && mailOk)
			return true;
		else{
			alert("Veuillez remplir correctement tous les champs");
			return false;
		}
	}
	</script>

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
                <form method="post" name="verificationInscription1" onsubmit="return verifForm(this)">
	                <p>Veuillez remplir tout les champs ayant le label suivant (*)</p>
	                <label> Adresse e-mail : *<input type="text" name="email" placeholder="test@miage.com" onblur="verifMail(this)"/>										<label><br/>
                    <label> Pseudo : *<input type="text" name="pseudo" placeholder="lhommedu13" onblur="verifPseudo(this)"/></label>(max. 25 caractères) <br/>
                    <label> Mot de passe : *<input type="password" name="passe"/></label><br/>
                    <label> Confirmation du mot de passe : *<input type="password" name="passe2"/></label><br/>
                    <input type="submit" value="M'inscrire"/>
                </form>
            </section>
            
            <?php
                if (empty($_POST['pseudo'])) {
                }
                if (empty($_POST['passe'])) {
                }
                if (!empty($_POST['passe2'])) {
                }
                if (!empty($_POST['email'])) {
                }
                if (!filter_var('email', FILTER_VALIDATE_EMAIL)) {
                }
                if ((!empty($_POST['pseudo']))and ( !empty($_POST['email'])) and ( !empty($_POST['passe']))) {
                    // Je mets aussi certaines sécurités
                    $passe = mysqli_real_escape_string($link, htmlspecialchars($_POST['passe']));
                    $passe2 = mysqli_real_escape_string($link, htmlspecialchars($_POST['passe2']));
                    if ($passe == $passe2) {
                        $pseudo = mysqli_real_escape_string($link, htmlspecialchars($_POST['pseudo']));
                        $email = mysqli_real_escape_string($link, htmlspecialchars($_POST['email']));
                        // Je vais crypter le mot de passe.
                        $passe = sha1($passe);
                        mysqli_query($link, "INSERT INTO validation VALUES('', '$pseudo', '$passe', '$email')");
                    } else {
                        echo('Les deux mots de passe que vous avez rentré ne correspondent pas?');
                    }
                }
                ?>

            <!-- FIN CONTENT-->
        </div>	

        <!--DEBUT FOOTER-->
        <?php include_once("include/foot.php") ?>

        <!--FIN FOOTER-->
    </body>
</html>