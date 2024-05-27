<?php
$sql = "INSERT INTO lien (idUtilisateur1, idUtilisateur2, etat) VALUES (:idUtilisateur1, :idUtilisateur2, :etat);";
$q = $pdo->prepare($sql);
$q->execute([
    'idUtilisateur1' => $_SESSION['id'],
    'idUtilisateur2' => $_POST['btnAddFriend'],
    'etat' => 'Attente'
]);

header('Location:'.$_SERVER['HTTP_REFERER']);
?>