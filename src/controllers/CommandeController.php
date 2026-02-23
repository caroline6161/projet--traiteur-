<?php
require_once 'src/models/CommandeModel.php';

class CommandeController
{
    /* ------------------------------------
       ANNULER UNE COMMANDE
    ------------------------------------ */
    public function annulerCommande()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $id = $_GET['id'];
        $cmd = CommandeModel::getCommande($id);

        // Vérification propriétaire
        if ($cmd['utilisateur_id'] != $_SESSION['user']['id']) {
            die("Accès refusé.");
        }

        // Vérification statut
        if ($cmd['statut'] !== 'en_attente') {
            die("Impossible d'annuler cette commande.");
        }

        CommandeModel::updateStatut($id, 'annulee');

        header("Location: index.php?page=profil");
        exit;
    }

    /* ------------------------------------
       AFFICHER FORMULAIRE MODIFICATION
    ------------------------------------ */
    public function modifierCommande()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $id = $_GET['id'];
        $cmd = CommandeModel::getCommande($id);

        // Vérification propriétaire
        if ($cmd['utilisateur_id'] != $_SESSION['user']['id']) {
            die("Accès refusé.");
        }

        // Vérification statut
        if ($cmd['statut'] !== 'en_attente') {
            die("Impossible de modifier cette commande.");
        }

        include 'src/views/user/modifier-commande.php';
    }

    /* ------------------------------------
       TRAITER MODIFICATION COMMANDE
    ------------------------------------ */
    public function modifierCommandeSubmit()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $id = $_POST['id'];
        $cmd = CommandeModel::getCommande($id);

        // Vérification propriétaire
        if ($cmd['utilisateur_id'] != $_SESSION['user']['id']) {
            die("Accès refusé.");
        }

        // Vérification statut
        if ($cmd['statut'] !== 'en_attente') {
            die("Impossible de modifier cette commande.");
        }

        CommandeModel::updateCommande($id, [
            'nb_personnes' => $_POST['nb_personnes'],
            'date_event'   => $_POST['date_event'],
            'message'      => $_POST['message']
        ]);

        header("Location: index.php?page=profil");
        exit;
    }
}
