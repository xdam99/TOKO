<?php
$sql = "SELECT *,
            ecrit.id AS ecrit_id, 
            auteur.avatar AS auteur_avatar, 
            ami.avatar AS ami_avatar,
            auteur.pseudo AS auteur_pseudo,
            ami.pseudo AS ami_pseudo
        FROM ecrit
        JOIN user auteur ON auteur.id = ecrit.idAuteur
        JOIN user ami ON ami.id = ecrit.idAmi
        WHERE idAuteur IN(SELECT user.id 
            FROM user, lien
            WHERE (user.id = lien.idUtilisateur1 OR user.id = lien.idUtilisateur2)
            AND (? = lien.idUtilisateur1 OR ? = lien.idUtilisateur2)
            AND etat='Ami'
            GROUP BY user.id)
        AND idAmi IN(SELECT user.id 
            FROM user, lien
            WHERE (user.id = lien.idUtilisateur1 OR user.id = lien.idUtilisateur2)
            AND (? = lien.idUtilisateur1 OR ? = lien.idUtilisateur2)
            AND etat='Ami'
            GROUP BY user.id)
        ORDER BY ecrit.id DESC";
$q = $pdo->prepare($sql);
$q->execute([$_SESSION['id'], $_SESSION['id'], $_SESSION['id'], $_SESSION['id']]);

$post = [];
while($line = $q->fetch()) {
    $post[] = $line;
}

$sql2 = "SELECT * FROM user";
$q = $pdo->prepare($sql2);
$q->execute([]);

$infoUser = [];
while($line = $q->fetch()) {
    $infoUser[] = $line;
}

echo $blade->make('home', ["title" => "Toko - accueil", 'post' => $post, 'infoUser' => $infoUser, "nav" => $nav])->render();
?>