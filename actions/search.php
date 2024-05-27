<?php
$keyword = $_POST['txtSearch'];
$sql = "SELECT * FROM user WHERE pseudo like '%$keyword%'";
$q = $pdo->prepare($sql);
$q->execute([]);

$askFriend = [];
$search = [];
while($line = $q->fetch()) {
    $search[] = $line;
}

echo $blade->make('friend', ["title" => "Toko - amis", 'search' => $search, "askFriend" => $askFriend, "nav" => $nav]);
?>