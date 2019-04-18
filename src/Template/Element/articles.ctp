<!-- Affiche les articles du site -->
<hr>

<div class="articles-index container-fluide text-center">
    <div class="articles-index__block-title">
        <h2 class="articles-index__block-title__title">NEWS</h2>
        <a class="articles-index__block-title__link"
            href="<?= $this->Url->build(['controller' => 'articles', 'action' => 'index']); ?>">Toutes les actualités
            ></a>
    </div>
    <div class="articles-index__block-content">
        <?php foreach ($articles as $article) : ?>
        <a class="articles-index__block-content__content"
            href="<?= $this->Url->build(['controller' => 'articles', 'action' => 'view', $article->slug]); ?>">
            <div class="articles-index__block-content__content__block-image">
                <img class="articles-index__block-content__content__block-image__image" src="<?= $article->image ?>"
                    alt="" srcset="">
            </div>
            <div class="articles-index__block-content__content__block-text">
                <h3 class="articles-index__block-content__content__block-text__title">
                    <?= $article->title ?>
                </h3>
                <?= $this->Text->truncate(
                            $article->body,
                        250,
                        [
                            'ellipsis' => '...(lire la suite)',
                            'exact' => false,
                        ]
                        ); ?>
                <small class="articles-index__block-content__content__block-text__date">
                    Ajouté le <?= $article->created->format('d-m-Y ') ?>
                </small>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</div>
