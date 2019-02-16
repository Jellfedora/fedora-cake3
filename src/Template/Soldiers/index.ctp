<h1>Nos fiers combattants!</h1>
<li class="text-dark"><?= $this->Html->link(
                            'Voir le combat!',
                            ['controller' => 'Soldiers', 'action' => 'battle'],
                            array('class' => 'nav-link')
                        ); ?>
</li>
<table>
    <tr>
        <th class="text-center">Nom</th>
        <th class="text-center">PV</th>
        <th class="text-center">Attaque</th>
        <th class="text-center">Vivant</th>
        <th class="text-center">Crée le</th>
        <th class="text-center">Crée par</th>
    </tr>

    <!-- C'est ici que nous bouclons sur notre objet Query $soldiers pour afficher les informations de chaque article -->

<?php foreach ($soldiers as $soldier) : ?>
    <tr class="recettes">
        <td class="text-center">
            <?= $soldier->name ?>
        </td>
        <td class="text-center">
            <?= $soldier->hp ?>
        </td>
        <td class="text-center">
            <?= $soldier->attaque ?>
        </td>
        <td class="text-center">
            <?php if ($soldier->alive = true) {
                echo ('Oui');
            }else {
                echo ('Non');
            }  ?>
        </td>
        <td class="text-center">
            <?= $soldier->created ?>
        </td>
        <td class="text-center">
            <?= $soldier->user_id ?>
        </td>

    </tr>
<?php endforeach; ?>

</table>



