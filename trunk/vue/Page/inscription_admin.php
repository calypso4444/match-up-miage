<!-- vue/page -->

<div>
    <h1> En attente de validation  </h1>
</div>
<div>
    <?php
    foreach ($vars['usersValidation'] as $user):
        echo 'Pseudo: ';
        echo $user['pseudo'];
        echo ' Mot de passe: ';
        echo $user['passe'];
        echo ' E-mail: ';
        echo $user['email'];
        echo '<a href="inscription_admin.php?action=accepter&id=' . $user['id'] . '"></br> Accepter </a>';
        echo '<a href="inscription_admin.php?action=refuser&id=' . $user['id'] . '"> Refuser </a>';
        echo '<br/>';
    endforeach;
    ?>
</div>
