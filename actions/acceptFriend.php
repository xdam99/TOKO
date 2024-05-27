<?php
$sql = "UPDATE lien
        SET etat='Ami'
        WHERE id=?";
$q = $pdo->prepare($sql);
$q->execute([$_POST['btnAddFriend']]);

header("Location: index.php?action=friend");



?>