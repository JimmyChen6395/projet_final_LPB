<?php 
    require "../../common/template.php";
    require "../../fonctions/dbCategorieFonctions.php";

    if(isset($_POST["addCategory"])){
        $option = array(
            'addCategory' => FILTER_SANITIZE_STRING
        );        
        $result = filter_input_array(INPUT_POST, $option);        
        $categorie = $result["addCategory"];        
        addCategory($categorie);
    }
?>
<section class="container d-flex flex-column align-items-center mt-5">
   <h2 class="border border-dark mb-4">Catégories de produit</h2> 
    <?php foreach (listCategories() as $value): ?>
        <h4><?php echo $value->typeProduct; ?></h4> 
    <?php endforeach; ?>

    <form class="row row-cols-lg-auto g-3 align-items-center my-1" action="" method="post">
        <div class="col-12">
            <input type="text" class="form-control" name="addCategory" placeholder="Ajouter nouveau produit">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-outline-success">Ajouter</button>
        </div>
    </form>
</section>