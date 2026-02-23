<?php
require_once 'src/models/CommandeModel.php';

class AdminCommandeController
{
    public function index()
    {
    
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header("Location: index.php?page=login");
            exit;
        }

        $commandes = CommandeModel::getAll();
        include 'src/views/admin/admin-commandes.php';
    }

    public function updateStatus()
    {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header("Location: index.php?page=login");
            exit;
        }

        if (!isset($_GET['id'], $_GET['status'])) {
            header("Location: index.php?page=admin-commandes");
            exit;
        }

        $id = intval($_GET['id']);
        $status = $_GET['status'];

        CommandeModel::updateStatus($id, $status);

        header("Location: index.php?page=admin-commandes");
        exit;
    }
}
