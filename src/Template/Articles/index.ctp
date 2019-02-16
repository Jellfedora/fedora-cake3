
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
<table>
    <tr>
        <th class="text-center">Titre</th>
        <th class="text-center">Ajouté le</th>
        <th class="text-center">Action</th>
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
    </tr>
<?php endforeach; ?>

</table>

