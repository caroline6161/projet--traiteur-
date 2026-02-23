<?php
require_once 'src/models/UserModel.php';

class AdminController
{
    private function checkAdmin()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header("Location: index.php?page=login");
            exit;
        }
    }

    public function listeEmployes()
    {
        $this->checkAdmin();

        $employes = UserModel::getEmployes();
        include 'src/views/admin/employes.php';
    }

    public function showCreateEmployeForm()
    {
        $this->checkAdmin();
        include 'src/views/admin/employe-create.php';
    }

    public function createEmploye()
    {
        $this->checkAdmin();

        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];

        if (UserModel::emailExists($email)) {
            $error = "Un compte existe déjà avec cet email.";
            include 'src/views/admin/employe-create.php';
            return;
        }

        // Mot de passe temporaire
        $tempPass = bin2hex(random_bytes(4));
        $hash = password_hash($tempPass, PASSWORD_DEFAULT);

        UserModel::createEmploye([
            'prenom' => $prenom,
            'nom'    => $nom,
            'email'  => $email,
            'password' => $hash
        ]);

        // Mail de création
        $subject = "Votre compte employé - Vite & Gourmand";
        $message = "
Bonjour $prenom,

Votre compte employé a été créé.

Identifiants :
Email : $email
Mot de passe temporaire : $tempPass

Merci de vous connecter et de changer votre mot de passe.

L'équipe Vite & Gourmand
";
        @mail($email, $subject, $message);

        header("Location: index.php?page=admin-employes&created=1");
        exit;
    }

    public function disableEmploye()
    {
        $this->checkAdmin();

        $id = $_GET['id'];
        UserModel::disableUser($id);

        header("Location: index.php?page=admin-employes&disabled=1");
        exit;
    }
    public function stats()
{
    $this->checkAdmin();

    // CA par menu
    $db = Database::getConnection();
    $stmt = $db->query("
        SELECT m.titre, SUM(c.total) AS chiffre_affaires
        FROM commande c
        JOIN menu m ON c.menu_id = m.menu_id
        WHERE c.statut = 'acceptee'
        GROUP BY m.menu_id
    ");
    $caMenus = $stmt->fetchAll();

    // Nombre de commandes par menu
    $stmt = $db->query("
        SELECT m.titre, COUNT(*) AS nb
        FROM commande c
        JOIN menu m ON c.menu_id = m.menu_id
        GROUP BY m.menu_id
    ");
    $nbCommandes = $stmt->fetchAll();

    // Récupération MongoDB
    require_once 'src/models/MongoModel.php';
    $mongoStats = MongoModel::getStats();

    include 'src/views/admin/stats.php';
}

}
