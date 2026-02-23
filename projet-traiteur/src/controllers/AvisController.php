<?php
session_start();
require_once 'src/models/CommandeModel.php';
require_once 'src/models/AvisModel.php';

class AvisController
{
    // Affiche le formulaire d'avis
    public function form()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit;
        }

        if (!isset($_GET['id'])) {
            header("Location: index.php?page=mes-commandes");
            exit;
        }

        $commandeId = $_GET['id'];

        // Vérifier que la commande appartient à l'utilisateur
        $commande = CommandeModel::getOrderById($commandeId);

        if (!$commande || $commande['user_id'] != $_SESSION['user']['id']) {
            header("Location: index.php?page=mes-commandes");
            exit;
        }

        // Vérifier que la commande est terminée
        if ($commande['status'] !== "terminee") {
            header("Location: index.php?page=mes-commandes");
            exit;
        }

        // Vérifier si un avis existe déjà
        if (AvisModel::hasReview($commandeId)) {
            header("Location: index.php?page=mes-commandes");
            exit;
        }

        // Afficher la vue
        include 'src/views/avis-form.php';
    }

    // Enregistre l'avis
    public function submit()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit;
        }

        if (!isset($_POST['commande_id'], $_POST['note'])) {
            header("Location: index.php?page=mes-commandes");
            exit;
        }

        $commandeId = $_POST['commande_id'];
        $note = intval($_POST['note']);
        $commentaire = trim($_POST['commentaire']);

        // Vérifier que la commande appartient à l'utilisateur
        $commande = CommandeModel::getOrderById($commandeId);

        if (!$commande || $commande['user_id'] != $_SESSION['user']['id']) {
            header("Location: index.php?page=mes-commandes");
            exit;
        }

        // Vérifier que la commande est terminée
        if ($commande['status'] !== "terminee") {
            header("Location: index.php?page=mes-commandes");
            exit;
        }

        // Vérifier si un avis existe déjà
        if (AvisModel::hasReview($commandeId)) {
            header("Location: index.php?page=mes-commandes");
            exit;
        }

        // Enregistrer l'avis
        AvisModel::addReview(
            $_SESSION['user']['id'],
            $commandeId,
            $note,
            $commentaire
        );

        header("Location: index.php?page=mes-commandes&avis=ok");
        exit;
    }
}
