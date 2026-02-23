<head>
    <meta charset="UTF-8">
    <title>Vite & Gourmand</title>

    <!-- LIEN CSS CORRECT -->
    <link rel="stylesheet" href="/projet-traiteur/public/css/home.css">
</head>

<?php
// Calcul du nombre total d'articles dans le panier
$cartCount = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cartCount += $item['quantity'];
    }
}
?>

<header class="header">
    <div class="header-container">
        <div class="logo">Vite & Gourmand</div>

        <nav class="nav">
            <a href="/projet-traiteur/index.php?page=home">Accueil</a>
            <a href="/projet-traiteur/index.php?page=menus">Nos Menus</a>
            <a href="/projet-traiteur/index.php?page=contact">Contact</a>

            <!-- BADGE PANIER CORRECTEMENT PLACÉ -->
            <a href="/projet-traiteur/index.php?page=cart" class="header-cart">
                Panier <span class="cart-badge"><?= $cartCount ?></span>
            </a>

            <a href="/projet-traiteur/index.php?page=login" class="btn-login">Connexion</a>
        </nav>
    </div>
</header>
