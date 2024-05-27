<?php
$sql = "DELETE FROM lien
        WHERE id=?";
$q = $pdo->prepare($sql);
$q->execute([$_POST['btnDeclineFriend']]);

header("Location: index.php?action=friend");



?>