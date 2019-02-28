<div class="container text-center" style="margin-top:2.5em;">
    <h1>Actualités</h1>
    <!-- Récupére l'utilisateur connecté -->
    <?php $user_id = $this->request->getSession()->read('Auth.User.id');


    //Si administrateur
    if ($user_id === 2) {
    ?>
    <p><?= $this->Html->link(
            $this->Html->tag(
                'i',
                '',
                array('class' => 'fa fa-plus-circle fa-2 btn btn-dark mt-2')
            ),
            array('action' => 'add'),
            array('escape' => false)
        );
        ?></p>
    <?php } ?>
    <table class="bg-dark text-light">
        <tr>
            <th class="text-center">Titre</th>
            <th class="text-center">Ajouté le</th>
            <!-- Si administrateur -->
            <?php if ($user_id === 2) { ?>
            <th class="text-center">Action</th>
            <?php } ?>
        </tr>

        <!-- C'est ici que nous bouclons sur notre objet Query $articles pour afficher les informations de chaque article -->

    <?php foreach ($articles as $article) : ?>
        <tr>
            <td class="text-center">
                <?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?>
            </td>
            <td class="text-center">
                <?= $article->created->format('d-m-Y ') ?>
            </td>

            <!-- Si administrateur -->
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
</div>
