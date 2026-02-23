<?php include 'src/views/layout/header.php'; ?>

<div class="orders-wrapper">

    <h1>Mes commandes</h1>

    <?php if (empty($commandes)): ?>
        <p>Aucune commande pour le moment.</p>
    <?php else: ?>

        <div class="orders-list">

            <?php foreach ($commandes as $commande): ?>
                <div class="order-card">

                    <h3>Commande #<?= $commande['id'] ?></h3>

                    <p><strong>Date :</strong> <?= $commande['date_commande'] ?></p>
                    <p><strong>Adresse :</strong> <?= $commande['address'] ?> (<?= $commande['city'] ?>)</p>
                    <p><strong>Date prestation :</strong> <?= $commande['date_prestation'] ?> à <?= $commande['heure'] ?></p>
                    <p><strong>Lieu :</strong> <?= $commande['lieu'] ?></p>

                    <p><strong>Total :</strong> <?= $commande['total_final'] ?> €</p>

                    <p><strong>Statut :</strong> 
                        <span class="status <?= $commande['status'] ?>">
                            <?= ucfirst($commande['status']) ?>
                        </span>
                    </p>

                    <!-- ⭐⭐ TIMELINE AJOUTÉE ICI ⭐⭐ -->
                    <div class="timeline">

                        <div class="step <?= $commande['status'] !== 'en_attente' ? 'done' : '' ?>">
                            Acceptée
                        </div>

                        <div class="step <?= in_array($commande['status'], ['en_preparation','en_cours_de_livraison','livre','en_attente_retour_materiel','terminee']) ? 'done' : '' ?>">
                            Préparation
                        </div>

                        <div class="step <?= in_array($commande['status'], ['en_cours_de_livraison','livre','en_attente_retour_materiel','terminee']) ? 'done' : '' ?>">
                            Livraison
                        </div>

                        <div class="step <?= in_array($commande['status'], ['livre','en_attente_retour_materiel','terminee']) ? 'done' : '' ?>">
                            Livré
                        </div>

                        <?php if ($commande['materiel_prete']): ?>
                            <div class="step <?= in_array($commande['status'], ['en_attente_retour_materiel','terminee']) ? 'done' : '' ?>">
                                Retour matériel
                            </div>
                        <?php endif; ?>

                        <div class="step <?= $commande['status'] === 'terminee' ? 'done' : '' ?>">
                            Terminée
                        </div>

                    </div>
                    <!-- ⭐⭐ FIN TIMELINE ⭐⭐ -->

                    <div class="order-actions">

                        <?php if ($commande['status'] === "terminee"): ?>

                            <?php if (!AvisModel::hasReview($commande['id'])): ?>
                                <a href="index.php?page=avis-form&id=<?= $commande['id'] ?>" class="btn-avis">
                                    Laisser un avis
                                </a>
                            <?php else: ?>
                                <span class="avis-ok">Avis déjà donné ✔</span>
                            <?php endif; ?>

                        <?php endif; ?>

                    </div>

                </div>
            <?php endforeach; ?>

        </div>

    <?php endif; ?>

</div>

<?php include 'src/views/layout/footer.php'; ?>
