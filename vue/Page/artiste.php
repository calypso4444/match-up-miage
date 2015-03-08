<!-- vue/page -->

<div class="container col-lg-12">

    <h1><?php echo $vars['nomProfil']; ?></h1>

    <div id="photoProfil" class="col-lg-12">
        <img src="<?php echo ($vars['photoProfil'] !== null) ? $vars['photoProfil'] : "web/image/artiste.png"; ?>">
    </div>

    <div id="description" class="col-lg-9">
        <h4>Description : </h4>
        <p><?php echo $vars['descProfil']; ?></p>
    </div>

    <div id="interaction" class="col-lg-3">
        </br>
        <form action="artiste.php?tmp=<?php echo $vars['noProfil']; ?>" method="post">
            <button type="submit" name="favori" value="true" class="glyphicon glyphicon-heart"> Ajouter en favori </button>
        </form>
        <a href="" class="glyphicon glyphicon-envelope"> Contacter l'artiste </a>
        </br>
        <a href="" class="glyphicon glyphicon-star-empty"> Noter l'artiste </a>
    </div>

    <div id="contenu" class="col-lg-12">
        <aside class="col-lg-3">
            <div id="albumPhoto">
                <h4>Album photo de l'artiste : </h4></br>
            </div>
            <div id="commentaire">
                <h4>Les derniers commentaires : </h4></br>
            </div>
            <div id="agenda">
                <h4>L'agenda : </h4></br>
            </div>
        </aside>
        <section class="col-lg-9">
            <h4>Le fil d'actualité : </h4>
            <!--            à supprimer-->
            <audio controls
                   data-info-album-art="http://farm5.staticflickr.com/4050/4353986539_ec89b52698_d.jpg"
                   data-info-album-title="8874"
                   data-info-artist="Billy Murray"
                   data-info-title="Come, take a trip in my air-ship"
                   data-info-label="Edison Gold Moulded Record"
                   data-info-year="1905"
                   data-info-att="University of California, Santa Barbara Library."
                   data-info-att-link="http://cylinders.library.ucsb.edu/search.php?query=8874">
                <source src="/bootstrap-player/media/cusb-cyl2985d.ogg" type="audio/ogg" />
                <source src="/bootstrap-player/media/cusb-cyl2985d.mp3" type="audio/mpeg" />
                <a href="/bootstrap-player/media/cusb-cyl2985d.mp3">cusb_cyl2985d</a>
            </audio>
        </section>
    </div>

</div>
