<?php include 'src/views/layout/header.php'; ?>

<h1>Finaliser la commande</h1>

<p>Total : 
    <?php 
        $total = array_sum(array_column($_SESSION['cart'], 'prix'));
        echo $total . " €";
    ?>
</p>

<a href="index.php?page=confirm-order" class="btn">Confirmer la commande</a>

<?php include 'src/views/layout/footer.php'; ?>
