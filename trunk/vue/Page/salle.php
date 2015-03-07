<!-- vue/page -->

<div class="container col-lg-12">

    <h1><?php echo $vars['nomProfil']; ?></h1>

    <div id="photoProfil" class="col-lg-12">
        <img src="<?php echo ($vars['photoProfil']!==null)? $vars['photoProfil']: "web/image/salle.png"; ?>">
    </div>

    <div id="description" class="col-lg-9">
        <h4>Description : </h4>
        <p><?php echo $vars['descProfil']; ?></p>
    </div>

    <div id="interaction" class="col-lg-3">
        </br>
        <a href="" class="glyphicon glyphicon-envelope"> Contacter la salle </a>
        </br>
        <a href="" class="glyphicon glyphicon-star-empty"> Noter la salle </a>
    </div>

    <div id="contenu" class="col-lg-12">
        <aside class="col-lg-3">
            <div id="albumPhoto">
                <h4>Album photo de la salle : </h4></br>
            </div>
            <div id="commentaire">
                <h4>Les derniers commentaires : </h4></br>
            </div>
            <div id="acces">
                <h4>L'accès : </h4></br>
            </div>
        </aside>
        <section class="col-lg-9">
            <h4>Le fil d'actualité : </h4></br>
        </section>
    </div>

</div>
