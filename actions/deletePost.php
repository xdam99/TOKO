<?php

$sql = "DELETE FROM ecrit 
        WHERE ecrit.id=:id";
$q = $pdo->prepare($sql);
$q->execute([
    'id' => $_POST['btnDeletePost']
    ]);
header('Location:'.$_SERVER['HTTP_REFERER']);
