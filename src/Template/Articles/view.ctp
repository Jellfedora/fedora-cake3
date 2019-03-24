<?php $this->assign('title', $article->title); ?>

<div class="article container-fluide text-light">
    <div class="article__block-title">
        <h2 class="article__block-title__title">NEWS</h2>
    </div>
    <div class="article__block-content">
        <div class="article__block-content__content__block-image text-center">
            <img class="article__block-content__content__block-image__image" src="<?= $article->image ?>" alt="" srcset="">
        </div>
        <div class="article__block-content__content__block-text">
            <h3 class="article__block-content__content__block-text__title">
                <?= $article->title ?>
            </h3>
            <p class="article__block-content__content__block-text__text"><?= $article->body ?></p>
            <small class="article__block-content__content__block-text__date">
                Ajouté le <?= $article->created->format(DATE_RFC850) ?>
            </small>
        </div>
    </div>
</div>

<?php echo $this->element('footer'); ?>
