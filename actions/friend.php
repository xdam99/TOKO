<?php
$search = [];

$sql = "SELECT lien.id as id_lien, lien.idUtilisateur1, lien.idUtilisateur2, lien.etat, user.pseudo, user.avatar FROM lien INNER JOIN user ON user.id = lien.idUtilisateur1 WHERE idUtilisateur2=?";
$q = $pdo->prepare($sql);
$q->execute([$_SESSION['id']]);

$askFriend = [];
while($line = $q->fetch()) {
    $askFriend[] = $line;
}

echo $blade->make('friend', ["title" => "Toko - amis", "search" => $search, "nav" => $nav, "askFriend" => $askFriend])->render();
?>