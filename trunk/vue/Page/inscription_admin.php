<!-- vue/page -->

<div class="col-lg-12 text-center">
    <h3> en attente de validation  </h3>
    </br>
    <?php
    foreach ($vars['usersValidation'] as $user):
        echo 'Pseudo: ';
        echo $user['pseudo'];
        echo ' E-mail: ';
        echo $user['email'];
        echo '<a href="inscription_admin.php?action=accepter&id=' . $user['idValidation'] . '"></br> Accepter </a>';
        echo '<a href="inscription_admin.php?action=refuser&id=' . $user['idValidation'] . '"> Refuser </a>';
        echo '<br/>';
    endforeach;
    ?>
</div>
