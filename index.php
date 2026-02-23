<?php
session_start();
require_once 'src/config/database.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$page = $_GET['page'] ?? 'home';

function loadController($controllerName) {
    $file = __DIR__ . "/src/controllers/" . $controllerName . ".php";
    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "Controller introuvable : $controllerName<br>";
        echo "Chemin attendu : $file";
        exit;
    }
}

switch ($page) {

    /* =========================
       PAGES VITRINE
    ========================= */
    case 'home':
        loadController("HomeController");
        (new HomeController())->index();
        break;

    case 'contact':
        loadController("ContactController");
        (new ContactController())->index();
        break;

    case 'menu':
        loadController("MenuDetailController");
        (new MenuDetailController())->show();
        break;

    /* =========================
       AUTHENTIFICATION
    ========================= */
    case 'login':
        loadController("AuthController");
        (new AuthController())->showLoginForm();
        break;

    case 'login-submit':
        loadController("AuthController");
        (new AuthController())->login();
        break;

    case 'register':
        loadController("AuthController");
        (new AuthController())->showRegisterForm();
        break;

    case 'register-submit':
        loadController("AuthController");
        (new AuthController())->register();
        break;

    case 'logout':
        loadController("AuthController");
        (new AuthController())->logout();
        break;

    case 'forgot-password':
        loadController("AuthController");
        (new AuthController())->showForgotForm();
        break;

    case 'forgot-password-submit':
        loadController("AuthController");
        (new AuthController())->sendResetLink();
        break;

    case 'reset-password':
        loadController("AuthController");
        (new AuthController())->showResetForm();
        break;

    case 'reset-password-submit':
        loadController("AuthController");
        (new AuthController())->resetPassword();
        break;

    /* =========================
       PROFIL UTILISATEUR
    ========================= */
    case 'profil':
        loadController("UserController");
        (new UserController())->showProfil();
        break;

    case 'profil-update':
        loadController("UserController");
        (new UserController())->updateProfil();
        break;

    /* =========================
       COMMANDES CLIENT
    ========================= */
    case 'mes-commandes':
        loadController("CommandeController");
        (new CommandeController())->mesCommandes();
        break;

    case 'commande-annuler':
        loadController("CommandeController");
        (new CommandeController())->annulerCommande();
        break;

    case 'commande-modifier':
        loadController("CommandeController");
        (new CommandeController())->modifierCommande();
        break;

    case 'commande-modifier-submit':
        loadController("CommandeController");
        (new CommandeController())->modifierCommandeSubmit();
        break;

    /* =========================
       COMMANDES ADMIN
    ========================= */
    case 'admin-commandes':
        loadController("AdminCommandeController");
        (new AdminCommandeController())->index();
        break;

    case 'admin-commande-detail':
        loadController("CommandeController");
        (new CommandeController())->adminShow();
        break;

    case 'update-status':
        loadController("AdminCommandeController");
        (new AdminCommandeController())->updateStatus();
        break;

    /* =========================
       ADMIN — EMPLOYÉS
    ========================= */
    case 'admin-employes':
        loadController("AdminController");
        (new AdminController())->listeEmployes();
        break;

    case 'admin-employe-create':
        loadController("AdminController");
        (new AdminController())->showCreateEmployeForm();
        break;

    case 'admin-employe-create-submit':
        loadController("AdminController");
        (new AdminController())->createEmploye();
        break;

    case 'admin-employe-disable':
        loadController("AdminController");
        (new AdminController())->disableEmploye();
        break;

    /* =========================
       ADMIN — STATISTIQUES
    ========================= */
    case 'admin-stats':
        loadController("AdminController");
        (new AdminController())->stats();
        break;

    /* =========================
       ADMIN DASHBOARD (VUES SIMPLES)
    ========================= */
    case 'admin-dashboard':
        include 'src/views/admin-dashboard.php';
        break;

    case 'admin-menus':
        include 'src/views/admin/admin-menus.php';
        break;

    case 'admin-plats':
        include 'src/views/admin/admin-plats.php';
        break;

    /* =========================
       PANIER
    ========================= */
    case 'cart':
        include 'src/views/cart.php';
        break;

    case 'add-to-cart':
        include 'src/controllers/AddToCartController.php';
        break;

    case 'remove-from-cart':
        include 'src/controllers/RemoveFromCartController.php';
        break;

    case 'checkout':
        include 'src/views/checkout.php';
        break;

    case 'confirm-order':
        include 'src/controllers/ConfirmOrderController.php';
        break;

    /* =========================
       CRUD MENUS
    ========================= */
    case 'menus':
        loadController("MenuController");
        (new MenuController())->index();
        break;

    case 'menu-create':
        loadController("MenuController");
        (new MenuController())->showCreateForm();
        break;

    case 'menu-create-submit':
        loadController("MenuController");
        (new MenuController())->create();
        break;

    case 'menu-edit':
        loadController("MenuController");
        (new MenuController())->showEditForm();
        break;

    case 'menu-edit-submit':
        loadController("MenuController");
        (new MenuController())->update();
        break;

    case 'menu-delete':
        loadController("MenuController");
        (new MenuController())->delete();
        break;

    case 'menu-add-plat':
        loadController("MenuController");
        (new MenuController())->addPlat();
        break;

    case 'menu-remove-plat':
        loadController("MenuController");
        (new MenuController())->removePlat();
        break;

    /* =========================
       CRUD PLATS
    ========================= */
    case 'plats':
        loadController("PlatController");
        (new PlatController())->index();
        break;

    case 'plat-create':
        loadController("PlatController");
        (new PlatController())->showCreateForm();
        break;

    case 'plat-create-submit':
        loadController("PlatController");
        (new PlatController())->create();
        break;

    case 'plat-edit':
        loadController("PlatController");
        (new PlatController())->showEditForm();
        break;

    case 'plat-edit-submit':
        loadController("PlatController");
        (new PlatController())->update();
        break;

    case 'plat-delete':
        loadController("PlatController");
        (new PlatController())->delete();
        break;

    case 'plat-add-allergene':
        loadController("PlatController");
        (new PlatController())->addAllergene();
        break;

    case 'plat-remove-allergene':
        loadController("PlatController");
        (new PlatController())->removeAllergene();
        break;

    /* =========================
       CRUD ALLERGENES
    ========================= */
    case 'allergenes':
        loadController("AllergeneController");
        (new AllergeneController())->index();
        break;

    case 'allergene-create':
        loadController("AllergeneController");
        (new AllergeneController())->showCreateForm();
        break;

    case 'allergene-create-submit':
        loadController("AllergeneController");
        (new AllergeneController())->create();
        break;

    case 'allergene-edit':
        loadController("AllergeneController");
        (new AllergeneController())->showEditForm();
        break;

    case 'allergene-edit-submit':
        loadController("AllergeneController");
        (new AllergeneController())->update();
        break;

    case 'allergene-delete':
        loadController("AllergeneController");
        (new AllergeneController())->delete();
        break;

    /* =========================
       CRUD THEMES
    ========================= */
    case 'themes':
        loadController("ThemeController");
        (new ThemeController())->index();
        break;

    case 'theme-create':
        loadController("ThemeController");
        (new ThemeController())->showCreateForm();
        break;

    case 'theme-create-submit':
        loadController("ThemeController");
        (new ThemeController())->create();
        break;

    case 'theme-edit':
        loadController("ThemeController");
        (new ThemeController())->showEditForm();
        break;

    case 'theme-edit-submit':
        loadController("ThemeController");
        (new ThemeController())->update();
        break;

    case 'theme-delete':
        loadController("ThemeController");
        (new ThemeController())->delete();
        break;

    /* =========================
       CRUD REGIMES
    ========================= */
    case 'regimes':
        loadController("RegimeController");
        (new RegimeController())->index();
        break;

    case 'regime-create':
        loadController("RegimeController");
        (new RegimeController())->showCreateForm();
        break;

    case 'regime-create-submit':
        loadController("RegimeController");
        (new RegimeController())->create();
        break;

    case 'regime-edit':
        loadController("RegimeController");
        (new RegimeController())->showEditForm();
        break;

    case 'regime-edit-submit':
        loadController("RegimeController");
        (new RegimeController())->update();
        break;

    case 'regime-delete':
        loadController("RegimeController");
        (new RegimeController())->delete();
        break;

    /* =========================
       404
    ========================= */
    default:
        echo "<h1>404 - Page introuvable</h1>";
        break;
}
