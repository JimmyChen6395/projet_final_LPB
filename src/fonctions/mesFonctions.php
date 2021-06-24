<?php
function sendImg($photo)
{
    
    $dossier = "../../src/img/produit/" . time();
    $extensionArray = ["jpeg", "jpg", "png", "gif", "psd", "pdf", "ai", "jfif", "JPEG", "JPG", "PNG", "GIF", "PSD", "PDF", "AI", "JFIF"];

    $infoFichier = pathinfo($photo["name"]);
  
    $extensionImg = $infoFichier["extension"];

    if (in_array($extensionImg, $extensionArray)) {
        $dossier .= basename($photo["name"]);
   

        move_uploaded_file($photo["tmp_name"], $dossier);
        return $dossier;
        // header('location: ../../src/pages/admin.php');
    }
}
