<?php include 'src/views/layout/header.php'; ?>

<div class="menus-wrapper">

    <h2 class="menus-title">Nos Menus</h2>
    <p class="menus-subtitle">Découvrez nos menus pour tous vos événements</p>

    <!-- FILTRES -->
    <div class="menus-filters">

        <div class="filter-group">
            <label>Thème</label>
            <select id="filter-theme">
                <option value="all">Tous les thèmes</option>
                <option value="noel">Noël</option>
                <option value="paques">Pâques</option>
                <option value="classique">Classique</option>
                <option value="evenement">Événement</option>
                <option value="vegetarien">Végétarien</option>
            </select>
        </div>

        <div class="filter-group">
            <label>Régime</label>
            <select id="filter-regime">
                <option value="all">Tous les régimes</option>
                <option value="classique">Classique</option>
                <option value="vegetarien">Végétarien</option>
            </select>
        </div>

        <div class="filter-group">
            <label>Prix max / pers. (€)</label>
            <input id="filter-price" type="number" placeholder="Ex: 50">
        </div>

        <div class="filter-group">
            <label>Personnes max.</label>
            <input id="filter-people" type="number" placeholder="Ex: 6">
        </div>

        <div class="filter-results">5 résultat(s)</div>
    </div>

    <!-- GRILLE DES MENUS -->
    <div class="menus-grid">

        <!-- MENU 1 -->
        <a href="index.php?page=menu-detail&id=1" class="menu-card"
           data-theme="noel"
           data-regime="classique"
           data-price="55"
           data-min="6">

            <img src="/projet-traiteur/public/images/menu-noel.jpg" alt="">
            <div class="menu-info">
                <span class="menu-badge">Menu Noël Tradition</span>
                <span class="menu-price">55€ / pers.</span>
                <span class="menu-stock">En stock</span>
                <p>Un menu festif qui célèbre les saveurs classiques de Noël avec des produits nobles.</p>
                <span class="menu-min">Min : 6 pers.</span>
            </div>
        </a>

        <!-- MENU 2 -->
        <a href="index.php?page=menu-detail&id=2" class="menu-card"
           data-theme="paques"
           data-regime="classique"
           data-price="42"
           data-min="4">

            <img src="/projet-traiteur/public/images/menu-paques.jpg" alt="">
            <div class="menu-info">
                <span class="menu-badge">Menu Pâques Printanier</span>
                <span class="menu-price">42€ / pers.</span>
                <span class="menu-stock">En stock</span>
                <p>Un menu frais et coloré célébrant le renouveau du printemps.</p>
                <span class="menu-min">Min : 4 pers.</span>
            </div>
        </a>

        <!-- MENU 3 -->
        <a href="index.php?page=menu-detail&id=3" class="menu-card"
           data-theme="classique"
           data-regime="classique"
           data-price="48"
           data-min="2">

            <img src="/projet-traiteur/public/images/menu-bordelais.jpg" alt="">
            <div class="menu-info">
                <span class="menu-badge">Le Bordelais Classique</span>
                <span class="menu-price">48€ / pers.</span>
                <span class="menu-stock">En stock</span>
                <p>Un voyage au cœur de la gastronomie bordelaise.</p>
                <span class="menu-min">Min : 2 pers.</span>
            </div>
        </a>

        <!-- MENU 4 -->
        <a href="index.php?page=menu-detail&id=4" class="menu-card"
           data-theme="evenement"
           data-regime="classique"
           data-price="75"
           data-min="10">

            <img src="/projet-traiteur/public/images/soiree-prestige.jpg" alt="">
            <div class="menu-info">
                <span class="menu-badge">Soirée Prestige</span>
                <span class="menu-price">75€ / pers.</span>
                <span class="menu-stock">Plus que 5 !</span>
                <p>Un menu d’exception pour vos événements marquants.</p>
                <span class="menu-min">Min : 10 pers.</span>
            </div>
        </a>

        <!-- MENU 5 -->
        <a href="index.php?page=menu-detail&id=5" class="menu-card"
           data-theme="vegetarien"
           data-regime="vegetarien"
           data-price="38"
           data-min="4">

            <img src="/projet-traiteur/public/images/le-vegetal-gourmand.jpg" alt="">
            <div class="menu-info">
                <span class="menu-badge">Le Végétal Gourmand</span>
                <span class="menu-price">38€ / pers.</span>
                <span class="menu-stock">En stock</span>
                <p>Un menu 100% végétal, raffiné et savoureux.</p>
                <span class="menu-min">Min : 4 pers.</span>
            </div>
        </a>

    </div>

</div>

<?php include 'src/views/layout/footer.php'; ?>

<!-- SCRIPT FILTRES -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    const menus = document.querySelectorAll(".menu-card");

    const themeFilter = document.querySelector("#filter-theme");
    const regimeFilter = document.querySelector("#filter-regime");
    const priceFilter = document.querySelector("#filter-price");
    const peopleFilter = document.querySelector("#filter-people");
    const resultCount = document.querySelector(".filter-results");

    function filterMenus() {
        let count = 0;

        menus.forEach(menu => {
            const theme = menu.dataset.theme;
            const regime = menu.dataset.regime;
            const price = parseInt(menu.dataset.price);
            const min = parseInt(menu.dataset.min);

            let show = true;

            if (themeFilter.value !== "all" && theme !== themeFilter.value) show = false;
            if (regimeFilter.value !== "all" && regime !== regimeFilter.value) show = false;
            if (priceFilter.value && price > priceFilter.value) show = false;
            if (peopleFilter.value && min > peopleFilter.value) show = false;

            menu.style.display = show ? "block" : "none";
            if (show) count++;
        });

        resultCount.textContent = count + " résultat(s)";
    }

    themeFilter.addEventListener("change", filterMenus);
    regimeFilter.addEventListener("change", filterMenus);
    priceFilter.addEventListener("input", filterMenus);
    peopleFilter.addEventListener("input", filterMenus);
});
</script>
