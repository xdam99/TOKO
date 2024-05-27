<?php

if(!empty($_POST['connexionPseudo']) && !empty($_POST['connexionMDP'])){
	$sql = "SELECT * FROM user WHERE pseudo=? AND mdp=?";

	$query = $pdo->prepare($sql);
	$query->execute(array($_POST['connexionPseudo'], sha1($_POST['connexionMDP'])));
	$line = $query->fetch();
	
	if ($line == true){
		$_SESSION['id'] = $line['id'];
		$_SESSION['pseudo'] = $line['pseudo'];
		$_SESSION['nom'] = $line['nom'];
		$_SESSION['prenom'] = $line['prenom'];
		$_SESSION['mail'] = $line['mail'];
		$_SESSION['avatar'] = $line['avatar'];
		header("Location: index.php?action=home");
	}
	else {
		echo "mot de passe incorrect";
		header("Location: index.php?action=accueil");
	}
}
?>