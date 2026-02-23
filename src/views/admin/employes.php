<?php include 'src/views/layout/header.php'; ?>

<h1>Gestion des employés</h1>

<a href="index.php?page=admin-employe-create" class="btn">Créer un employé</a>

<?php if (!empty($_GET['created'])): ?>
    <p class="success">Employé créé avec succès.</p>
<?php endif; ?>

<?php if (!empty($_GET['disabled'])): ?>
    <p class="success">Employé désactivé.</p>
<?php endif; ?>

<table class="table">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Actif</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($employes as $e): ?>
        <tr>
            <td><?= $e['utilisateur_id'] ?></td>
            <td><?= htmlspecialchars($e['prenom'] . ' ' . $e['nom']) ?></td>
            <td><?= htmlspecialchars($e['email']) ?></td>
            <td><?= $e['actif'] ? 'Oui' : 'Non' ?></td>
            <td>
                <?php if ($e['actif']): ?>
                    <a href="index.php?page=admin-employe-disable&id=<?= $e['utilisateur_id'] ?>" class="btn-red">Désactiver</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include 'src/views/layout/footer.php'; ?>
