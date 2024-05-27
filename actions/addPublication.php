<?php
if(!empty($_POST['txtPublication']) && !empty($_POST['title'])){
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
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
            if(file_exists("upload/" . $nomUnique)){
                echo $_FILES["photo"]["name"] . " existe déjà.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "./upload/" . $nomUnique);
                echo "Votre fichier a été téléchargé avec succès.";
                $sql = "INSERT INTO ecrit(titre, contenu, dateEcrit, image, idAuteur, idAmi) VALUES(:titre, :contenu, :dateEcrit, :image, :idAuteur, :idAmi)";
                $query = $pdo->prepare($sql);
                $query->execute(array(
                    'titre' => $_POST['title'],
                    'contenu' => $_POST['txtPublication'],
                    'image' => "./upload/".$nomUnique,
                    'dateEcrit' => date('d/m/y \à H:i'),
                    'idAuteur' => $_SESSION['id'],
                    'idAmi' => $_POST['profile-id']
                ));
                header("Location: ".$_SERVER['HTTP_REFERER']);
                exit();
            } 
        } else{
            echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
        }
    } else{    

        $sql = "INSERT INTO ecrit(titre, contenu, dateEcrit, image, idAuteur, idAmi) VALUES(:titre, :contenu, :dateEcrit, :image, :idAuteur, :idAmi)";
        $query = $pdo->prepare($sql);
        $query->execute(array(
            'titre' => $_POST['title'],
            'contenu' => $_POST['txtPublication'],
            'image' => "0",
            'dateEcrit' => date('d/m/y \à H:i'),
            'idAuteur' => $_SESSION['id'],
            'idAmi' => $_POST['profile-id']
        ));
        
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    }
} else {
    echo "Veuillez remplir tous les champs.";
        header("Location: index.php?action=home");
}
    
    
