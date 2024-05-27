<?php


// Vérifier si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Vérifie si le fichier a été uploadé sans erreur.
    if(!empty($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg","JPG" => "image/jpg", "jpeg" => "image/jpeg", "JPEG" => "image/jpeg", "gif" => "image/gif", "GIF" => "image/gif", "png" => "image/png", "PNG" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];

        // Vérifie l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

        // Vérifie la taille du fichier - 5Mo maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");
        $uniqueName = uniqid('', true);
        $nomUnique = $uniqueName.".".$allowed;
        // Vérifie le type MIME du fichier
        if(in_array($filetype, $allowed)){
            // Vérifie si le fichier existe avant de le télécharger.
            if(file_exists("upload/" .$nomUnique){
                echo $_FILES["photo"]["name"] . " existe déjà.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "./upload/" .$nomUnique);
                echo "Votre fichier a été téléchargé avec succès.";
                $sql = "UPDATE user
                            SET avatar= :avatar
                        WHERE id=".$_SESSION['id'];

                $query = $pdo->prepare($sql);
                $query->execute(array(
                                    'avatar' => "./upload/".$nomUnique
                                ));
                $_SESSION['avatar'] = "./upload/".$nomUnique;
                header("Location: index.php?action=user&id=".$_SESSION['id']);

            } 
        } else{
            echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
        }
    } else{
        ob_start();
        echo "Error: " . $_FILES["photo"]["error"];
        header("Location: index.php?action=user&id=".$_SESSION['id']);
        exit();
    }
}



?>