<?php

$sql = "SELECT * FROM user WHERE id=?";
$q = $pdo->prepare($sql);
$q->execute([$_GET['id']]);

$infoUser = [];
while($line = $q->fetch()) {
    $infoUser[] = $line;
}
//2ème requête SQL
$sql2 = "SELECT *,
            ecrit.id, 
            auteur.avatar AS auteur_avatar, 
            ami.avatar AS ami_avatar,
            auteur.pseudo AS auteur_pseudo,
            ami.pseudo AS ami_pseudo
            FROM ecrit
            JOIN user auteur ON auteur.id = ecrit.idAuteur
            JOIN user ami ON ami.id = ecrit.idAmi
            WHERE idAuteur=? AND idAmi=?
            OR idAuteur=? AND idAmi=?
            OR idAuteur=? AND idAmi=?
            ORDER BY dateEcrit DESC";
$q = $pdo->prepare($sql2);
$q->execute([$_SESSION['id'], $_GET['id'], $_GET['id'], $_GET['id'], $_GET['id'], $_SESSION['id']]);

$postUser = [];
while($line = $q->fetch()) {
    $postUser[] = $line;
}

$sql3 = "SELECT * FROM lien WHERE idUtilisateur1=? AND idUtilisateur2=?";
$q = $pdo->prepare($sql3);
$q->execute([$_SESSION['id'], $_GET['id']]);
$statut = [];
while($line = $q->fetch()) {
    $statut[] = $line;
}

echo $blade->make('user', ["title" => "Toko", 'infoUser' => $infoUser, 'postUser' => $postUser, 'statut' => $statut, "nav" => $nav])->render();