<!-- vue/page -->

<!--si l'utilisateur n'est pas connecté, on le redirige vers la page d'inscription-->
<?php echo $vars['estConnecte'] ? null : "<script>document.location.href='inscription.php'</script>" ?>

<div class="col-lg-12">

    <h1>message</h1>

    <form action="f_message.php" method="post" id="posterMessage">
        <div id="row">    
            <div class="col-lg-offset-2 col-lg-8 col-lg-offset-2">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <label for="expediteur">Expéditeur : </label> 
                            </td>
                            <td>
                                <fieldset disabled="disabled">
                                    <input class="form-control" id="expediteur" type="text" name="expediteur" placeholder="" value="<?php echo $vars['expediteur']; ?>"/>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label  for="destinataire">Destinataire : </label> 
                            </td>
                            <td>
                                <fieldset disabled="disabled">
                                    <input class="form-control" id="destinataire" type="text" name="destinataire" placeholder="" value="<?php echo $vars['destinataire']; ?>"/>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="objet">Objet : </label> 
                            </td>
                            <td>
                                <input class="form-control" id="objet" type="text" name="objet" placeholder="" value="<?php echo $vars['objet']; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="txtMessage">Votre message : </label> 
                            </td>
                            <td>
                                <?php echo $vars['lien']; ?>
                                <textarea class="form-control" id="txtMessage" rows="7" type="text" name="txtMessage" placeholder="" value=""/><?php echo $vars['txt']; ?></textarea> 
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td class="text-right">
                                <input class="btn btn-default" type="submit" value="Valider" id="envoyer"/>
                            </td>       
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
    </br>

    <?php echo ($vars['messageEnvoye']) ? "<script>alert('message envoyé');document.location.href='index.php'</script>" : null; ?>

</div>
