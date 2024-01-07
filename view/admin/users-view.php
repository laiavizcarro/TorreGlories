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
            </thead>
            <tbody>
                <?php foreach($allUsers as $user){ ?>
                    <tr>
                        <td><?= $user->getId() ?></td>
                        <td><?= $user->getName() ?></td>
                        <td><?= $user->getSurname() ?></td>
                        <td><?= $user->getEmail() ?></td>
                        <td><?= $user->isAdmin() ? "Admin" : "Basic" ?></td>
                        <td><?= $user->isAdmin() ? "-" : $user->getPhoneNumber() ?></td>
                        <td><?= $user->isAdmin() ? $user->getIncorporationDate() : "-" ?></td>
                    </tr>
                <?php } ?>
            </tbody>
    </table>
</section>