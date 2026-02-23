<?php include 'src/views/layout/header.php'; ?>

<h1>Statistiques</h1>

<h2>Chiffre d’affaires par menu</h2>
<canvas id="caChart"></canvas>

<h2>Nombre de commandes par menu</h2>
<canvas id="cmdChart"></canvas>

<h2>Données MongoDB</h2>
<pre><?php print_r($mongoStats); ?></pre>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// CA par menu
const caLabels = <?= json_encode(array_column($caMenus, 'titre')) ?>;
const caData = <?= json_encode(array_column($caMenus, 'chiffre_affaires')) ?>;

new Chart(document.getElementById('caChart'), {
    type: 'bar',
    data: {
        labels: caLabels,
        datasets: [{
            label: 'Chiffre d’affaires (€)',
            data: caData,
            backgroundColor: '#4CAF50'
        }]
    }
});

// Nombre de commandes
const cmdLabels = <?= json_encode(array_column($nbCommandes, 'titre')) ?>;
const cmdData = <?= json_encode(array_column($nbCommandes, 'nb')) ?>;

new Chart(document.getElementById('cmdChart'), {
    type: 'line',
    data: {
        labels: cmdLabels,
        datasets: [{
            label: 'Nombre de commandes',
            data: cmdData,
            borderColor: '#2196F3',
            fill: false
        }]
    }
});
</script>

<?php include 'src/views/layout/footer.php'; ?>
