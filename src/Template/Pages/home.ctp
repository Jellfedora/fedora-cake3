<?php $this->assign('title', 'Le jeu en ligne gratuit!'); ?>

<div class="home container-fluide text-light text-center">
    <?= $this->Html->image('logo-valhalla.png', array('alt' => "Valhalla")); ?>
    <div class="home__subtitle pb-2 text-center">
        <p>Créez votre héros et partez en quête de puissance!</p>
    </div>
    <p>Valhalla est un jeu gratuit en ligne proposant des combats tactiques au tour par tour.</p>
    <p>Actuellement à l'état de protoype il n'aura de cesse de s'étoffer en contenu, avec au programme l'ajout d'ennemis
        toujours plus puissants, d'équipements
        rares et précieux et même un mode multijoueur sortit de dérriére les fagots!</p>
    <a href="games/play" class="home__play-now">Jouer maintenant!</a>
    <!-- Ajouter les articles ici -->
    <?php echo $this->element('articles'); ?>
</div>

<?php echo $this->element('footer'); ?>
