<h1>Boss</h1>

<table>
    <tr>
        <th class="text-center">Affronter?</th>
        <th class="text-center">Nom</th>
        <th class="text-center">PV</th>
        <th class="text-center">Attaque</th>
        <th class="text-center">Vivant</th>
        <th class="text-center">Crée le</th>
    </tr>

    <!-- C'est ici que nous bouclons sur notre objet Query $soldiers pour afficher les informations de chaque article -->

<?php foreach ($soldiers as $soldier) : ?>
    <tr class="recettes">
        <td class="text-center">
            <?= $this->Html->link('Affronter', ['action' => 'battle', $soldier->slug]) ?>
        </td>
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

    </tr>
<?php endforeach; ?>

</table>



