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
                 
           <div>
            Veuillez entrer votre adresse mail : <input type="text" name="email"/><br/>
            <input type="submit" value="Envoyer"/>
           </div>
            
            <?php
	            $link = mysqli_connect("localhost", "root", "root");
				mysqli_select_db($link, "mu_db");
				
	            if(!empty($_POST['email']))
				$email = $_POST['email'];
				else
				exit("mail vide.");
				 
				//pas besoin de faire un count
				$sql = "SELECT email FROM validation WHERE email = '".$email."' ";
				$req = mysql_query($sql) or die ('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
				 
				if(mysql_num_rows($req) != 1)//si le nombre de lignes retourne par la requete != 1
				exit("mail inconnu.");
				else
				{
				$row1 = mysql_fetch_assoc($req);
				$retour = mysql_query("SELECT pass FROM validation WHERE email = '".$email."' ");
				$row2 = mysql_fetch_assoc($retour);
				 
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
				$objet = 'Récupération de votre mot de passe';
				 
				if(!mail($row1['email'], $objet, $row2['pass'], $headers))
				echo 'problème lors de l\'envoi du mail';
				else
				echo 'mail envoye';
				}
	            ?>
           
            <!-- FIN CONTENT-->
            
        <!--DEBUT FOOTER-->
        <?php include_once("include/foot.php") ?>
        <!--FIN FOOTER-->
    </body>
</html>
