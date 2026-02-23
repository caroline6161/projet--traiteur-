<?php include __DIR__ . '/../layout/header.php'; ?>

<link rel="stylesheet" href="/projet-traiteur/public/css/home.css">
<script src="/projet-traiteur/public/js/home.js" defer></script>

<!-- ================= HERO ================= -->
<section class="hero">
    <div class="hero-content">
        <h1>Vite & Gourmand</h1>
        <p class="subtitle">Traiteur d'exception à Bordeaux depuis 25 ans.<br>
        Sublimez vos événements avec passion et savoir‑faire.</p>

        <div class="hero-buttons">
            <a href="#menus" class="btn-primary">Découvrir nos menus</a>
            <a href="#contact" class="btn-secondary">Nous contacter</a>
        </div>

        <div class="hero-stats">
            <div class="stat"><span>25+</span> Années d'expérience</div>
            <div class="stat"><span>2 000+</span> Clients satisfaits</div>
            <div class="stat"><span>5 000+</span> Événements réalisés</div>
            <div class="stat"><span>4.8/5</span> Note moyenne</div>
        </div>
    </div>
</section>

<!-- ================= NOTRE HISTOIRE ================= -->
<section class="histoire" id="histoire">
    <h2>NOTRE HISTOIRE</h2>
    <h3>La passion du goût, depuis 1999</h3>

    <p class="histoire-text">
        Fondée par Julie et José à Bordeaux, Vite & Gourmand est née d'une passion commune pour la gastronomie française.
        Depuis 25 ans, nous mettons notre savoir-faire au service de vos événements — des repas intimes aux grandes réceptions.
        Chaque plat est préparé avec des produits frais et locaux, dans le respect des traditions culinaires bordelaises
        tout en apportant une touche de modernité.
    </p>

    <div class="fondateurs">
        <div class="fondateur">
            <h4>Julie</h4>
            <p>Co-fondatrice & Chef</p>
        </div>

        <div class="fondateur">
            <h4>José</h4>
            <p>Co-fondateur & Chef</p>
        </div>
    </div>
</section>

<!-- ================= MENUS ================= -->
<section class="creations" id="menus">
    <h2>NOS CRÉATIONS</h2>
    <h3>Menus à la carte</h3>
    <p class="creations-text">
        Des menus soigneusement composés pour chaque occasion, du repas familial à la réception prestigieuse.
    </p>

    <div class="menus-grid">

        <div class="menu-card">
            <img src="/projet-traiteur/public/images/menu-noel.jpg" alt="Menu Noël">
            <h4>Noël</h4>
            <h5>Menu Noël Tradition</h5>
            <p>Un menu festif qui célèbre les saveurs classiques de Noël avec des produits nobles...</p>
            <span class="min">À partir de 6 personnes</span>
            <span class="price">55€ / pers.</span>
        </div>

        <div class="menu-card">
            <img src="/projet-traiteur/public/images/menu-paques.jpg" alt="Menu Pâques">
            <h4>Pâques</h4>
            <h5>Menu Pâques Printanier</h5>
            <p>Un menu frais et coloré célébrant le renouveau du printemps avec des légumes...</p>
            <span class="min">À partir de 4 personnes</span>
            <span class="price">42€ / pers.</span>
        </div>

        <div class="menu-card">
            <img src="/projet-traiteur/public/images/menu-bordelais.jpg" alt="Menu Bordelais">
            <h4>Classique</h4>
            <h5>Le Bordelais Classique</h5>
            <p>Un voyage au cœur de la gastronomie bordelaise, entre canelés et entrecôte...</p>
            <span class="min">À partir de 2 personnes</span>
            <span class="price">48€ / pers.</span>
        </div>

    </div>

    <div class="btn-center">
        <a href="/projet-traiteur/index.php?page=menus" class="btn-view-all">Voir tous les menus</a>
    </div>
</section>

<!-- ================= TÉMOIGNAGES ================= -->
<section class="temoignages">
    <h2>TÉMOIGNAGES</h2>
    <h3>Ce que disent nos clients</h3>

    <div class="temoignages-grid">

        <div class="avis">
            <div class="stars">★★★★★</div>
            <p>"Un service impeccable et des plats divins ! Le menu de Noël a enchanté toute ma famille."</p>
            <span class="author">Marie L. - 28/12/2025</span>
        </div>

        <div class="avis">
            <div class="stars">★★★★★</div>
            <p>"Le Bordelais Classique est un pur délice. Les huîtres étaient d'une fraîcheur exceptionnelle."</p>
            <span class="author">Pierre D. - 15/11/2025</span>
        </div>

        <div class="avis">
            <div class="stars">★★★★☆</div>
            <p>"Très beau buffet pour notre mariage. Tout le monde a adoré. Merci Julie et José !"</p>
            <span class="author">Sophie M. - 02/10/2025</span>
        </div>

        <div class="avis">
            <div class="stars">★★★★★</div>
            <p>"Le menu végan était incroyable, même les non-végans ont été bluffés !"</p>
            <span class="author">Thomas B. - 20/09/2025</span>
        </div>

    </div>
</section>

<!-- ================= CTA FINAL ================= -->
<section class="cta-final" id="contact">
    <h3>Prêt à régaler vos invités ?</h3>
    <p>Contactez-nous pour composer le menu parfait pour votre prochain événement.</p>

    <div class="cta-buttons">
        <a href="/projet-traiteur/index.php?page=menus" class="btn-cta">Voir les menus</a>
        <a href="/projet-traiteur/index.php?page=contact" class="btn-cta-secondary">Nous contacter</a>
    </div>
</section>

<?php include __DIR__ . '/../layout/footer.php'; ?>
