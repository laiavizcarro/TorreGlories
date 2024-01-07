<section class="container mt-70">
    <table class="table table-striped table-hover">
            <thead>
                <th>ID</th>
                <th>Nom</th>
                <th>Cognom</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Telèfon</th>
                <th>Data incorporació</th>
                <th colspan="2">Acció</th>

            </thead>
            <tbody>
                <?php foreach($allUsers as $user){ ?>
                    <td><?= $user->getId() ?></td>
                    <td><?= $user->getName() ?></td>
                    <td><?= $user->getSurname() ?></td>
                    <td><?= $user->getEmail() ?></td>
                    <td><?= $user->getRoleId() ?></td>
                <?php } ?>
            </tbody>
    </table>
</section>