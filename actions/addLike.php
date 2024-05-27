<?php
$sql = "INSERT INTO aime(idEcrit, idUtilisateur) VALUES(:idEcrit, :idUtilisateur)";
        $query = $pdo->prepare($sql);
        $query->execute([
            'idEcrit' => $_POST['like'],
            'idUtilisateur' => $_SESSION['id']
        ]);
        
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
?>