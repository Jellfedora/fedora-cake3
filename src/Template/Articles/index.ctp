<!-- Affiche les articles du site -->
<?php $this->assign('title', 'Actualités'); ?>

<div class="articles-index text-center" style="margin:0 1.5em;">
    <div class="articles-index__block-title">
        <h2 class="articles-index__block-title__title">NEWS</h2>
    </div>
    <div class="articles-index__block-content" style="flex-wrap:wrap;">
        <?php foreach ($articles as $article) : ?>
        <a class="articles-index__block-content__content"
            href="<?= $this->Url->build(['controller' => 'articles', 'action' => 'view', $article->slug]); ?>">
            <div class="articles-index__block-content__content__block-image">
                <?= $this->Html->image(
                        'articles/'.$article->image,
                        array('class' => 'articles-index__block-content__content__block-image__image'),
                        array('alt' => "Image-article")
                    ); ?>
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



<!-- <div class="container text-center" style="">
    <h1>Actualités</h1>
    <?php $user_id = $this->request->getSession()->read('Auth.User.id');


    //Si administrateur
    if ($user_id === 2) {
        ?>
    <p>
        <?= $this->Html->link(
            $this->Html->tag(
                'i',
                '',
                array('class' => 'fa fa-plus-circle fa-2 btn btn-dark mt-2')
            ),
            array('action' => 'add'),
            array('escape' => false)
        );
        ?>
    </p>
    <?php

} ?>
    <table class="bg-dark text-light">
        <tr>
            <th class="text-center">Titre</th>
            <th class="text-center">Ajouté le</th>
            <?php if ($user_id === 2) { ?>
            <th class="text-center">Action</th>
            <?php

        } ?>
        </tr>


        <?php foreach ($articles as $article) : ?>
        <tr>
            <td class="text-center">
                <?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?>
            </td>
            <td class="text-center">
                <?= $article->created->format('d-m-Y ') ?>
            </td>

            <?php if ($user_id === 2) { ?>
            <td class="text-center">
                <?= $this->Html->link(
                    $this->Html->tag(
                        'i',
                        '',
                        array('class' => 'fa fa-pencil mr-3 ml-2')
                    ),
                    array('action' => 'edit', $article->slug),
                    array('escape' => false)
                );
                ?>
                <?= $this->Form->postLink(
                    $this->Html->tag(
                        'i',
                        '',
                        array('class' => 'fa fa-trash-o')
                    ),
                    array('action' => 'delete', $article->slug),
                    array('escape' => false),
                    array(['confirm' => 'Êtes-vous sûr ?'])
                );
                ?>
            </td>
            <?php

        }
        ?>
        </tr>
        <?php endforeach; ?>

    </table>
</div> -->
<?php echo $this->element('footer'); ?>
