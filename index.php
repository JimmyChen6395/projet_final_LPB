<?php 

// On appelle tous les éléments qu'on veut afficher sur notre index.php en faisant un require sur cette page
require "./src/common/template.php";
?>


<section>
    <div>
        <?php require "./src/common/promotion.php"; ?>
    </div>

    <div>
        <?php require "./src/common/listCategorie.php" ?>
    </div>

    <div>
        <?php require "./src/common/derniersArticles.php"; ?>
    </div>

</section>

<footer>
    <?php require "./src/common/footer.php" ?>
</footer>


