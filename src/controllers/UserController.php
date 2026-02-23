<?php
require_once 'src/models/UserModel.php';

class UserController
{
    public function showProfil()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $user = UserModel::getUserById($_SESSION['user']['id']);
        include 'src/views/user/profil.php';
    }

    public function updateProfil()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $id = $_SESSION['user']['id'];

        UserModel::updateUser($id, [
            'prenom' => $_POST['prenom'],
            'nom'    => $_POST['nom'],
            'email'  => $_POST['email'],
            'telephone' => $_POST['telephone'],
            'adresse'   => $_POST['adresse'],
            'ville'     => $_POST['ville'],
            'pays'      => $_POST['pays']
        ]);

        $_SESSION['success'] = "Profil mis à jour.";
        header("Location: index.php?page=profil");
        exit;
    }
}
