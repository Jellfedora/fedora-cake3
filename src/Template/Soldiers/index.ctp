<div class="container text-light bg-dark text-center" style="margin-top:6em;">
    <h1>Boss</h1>

    <table class="table table-striped table-hover table-dark">
        <thead>
            <tr>
                <th  scope="col" class="text-center">Voir</th>
                <th  scope="col" class="text-center">Nom</th>
                <th  scope="col" class="text-center">PV</th>
                <th  scope="col" class="text-center">Attaque</th>
            </tr>
        </thead>
        <!-- C'est ici que nous bouclons sur notre objet Query $soldiers pour afficher les informations de chaque article -->

        <tbody>
            <?php foreach ($soldiers as $soldier) : ?>
                <tr class="">
                    <td class="text-center">
                        <?= $this->Html->link('Go', ['action' => 'view', $soldier->slug]) ?>
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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


