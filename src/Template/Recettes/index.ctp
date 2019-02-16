
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
        <th class="text-center"></th>
        <th class="text-center">Nos Recettes</th>
        <th class="text-center">Prix</th>
        <th class="text-center">Temps de préparation</th>
        <th class="text-center">Action</th>
    </tr>

    <!-- C'est ici que nous bouclons sur notre objet Query $articles pour afficher les informations de chaque article -->

<?php foreach ($recettes as $recette) : ?>
    <tr class="recettes">
        <td class="text-center">
            <?= '<img class="avatar" src="'.$recette->photo.'" alt=""> <br>';?>

        </td>
        <td class="text-center">
            <?= $this->Html->link($recette->title, ['action' => 'view', $recette->slug]) ?>
        </td>
        <td class="text-center">
            <?= $recette->price ?> Euros
        </td>
        <td class="text-center">
            <?= $recette->time ?>
        </td>
        <td class="text-center">
            <?= $this->Html->link(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'fa fa-pencil mr-3 ml-2')
                ),
                array('action' => 'edit', $recette->slug),
                array('escape' => false)
            );
            ?>
            <?= $this->Form->postLink(
                $this->Html->tag(
                    'i',
                    '',
                    array('class' => 'fa fa-trash-o')
                ),
                array('action' => 'delete', $recette->slug),
                array('escape' => false),
                array(['confirm' => 'Êtes-vous sûr ?'])
            );
            ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>

