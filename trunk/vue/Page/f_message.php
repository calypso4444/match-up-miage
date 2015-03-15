<!-- vue/page -->

<div class="col-lg-12">

    <h1>message</h1>

    <form action="f_message.php?" method="post" id="posterMessage">
        <table class="table">
            <tbody>
                <tr>
                    <td class="col-lg-2">
                        <label  for="expediteur">Exéditeur : *</label> 
                    </td>
                    <td class="col-lg-10">
                        <fieldset disabled="disabled">
                            <input class="form-control" id="expediteur" type="text" name="expediteur" placeholder="" value="<?php echo $vars['expediteur']; ?>"/>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <td class="col-lg-2">
                        <label  for="destinataire">Destinataire : *</label> 
                    </td>
                    <td class="col-lg-10">
                        <fieldset disabled="disabled">
                            <input class="form-control" id="destinataire" type="text" name="destinataire" placeholder="" value="<?php echo $vars['destinataire']; ?>"/>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <td class="col-lg-2">
                        <label for="objet">Objet : *</label> 
                    </td>
                    <td class="col-lg-10">
                        <input class="form-control" id="objet" type="text" name="objet" placeholder="" value="<?php echo $vars['objet']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td class="col-lg-2">
                        <label for="txtMessage">Votre message : *</label> 
                    </td>
                    <td class="col-lg-10">
                        <textarea class="form-control" id="txtMessage" type="text" name="txtMessage" placeholder="" value=""/></textarea> 
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="text-center">
            <input class="btn btn-default" type="submit" value="Valider" id="envoyer"/>
        </div>
    </form>
    </br>
    
    <?php echo ($vars['messageEnvoye'])? "<script>alert('message envoyé');</script>":null ;?>
    
</div>
