<?php

if(!empty($_POST['registerLastName']) && !empty($_POST['registerFirstName']) && !empty($_POST['registerPseudo']) && !empty($_POST['registerMail']) && !empty($_POST['registerMDP'])){
	$sql2 = "SELECT * FROM user WHERE pseudo = ?";
	$query2 = $pdo->prepare($sql2);
	$query2->execute([$_POST['registerPseudo']]);
	$user = $query2->fetch(PDO::FETCH_ASSOC);
	if(isset($user) && !empty($user)) {
		exit("Ce nom d'utilisateur existe déjà");
		header('Location: index.php?action=accueil');
	} else {
		$sql = "INSERT INTO user (nom, prenom, pseudo, mdp, mail) VALUES (:nom, :prenom, :pseudo, :mdp, :mail);";

		$query = $pdo->prepare($sql);
		$query->execute(array(
			'nom' => $_POST['registerLastName'],
			'prenom' => $_POST['registerFirstName'],
			'pseudo' => $_POST['registerPseudo'],
			'mail' => $_POST['registerMail'],
			'mdp' => sha1($_POST['registerMDP']),
		));
		echo "<h2 id='confirmRegister'>Votre inscription a bien été prise en compte. Veuillez vous reconnecter</h2>";
		header("Location: index.php?action=accueil");
		exit();
	}

} else {
	echo "<h2 id='confirmRegister'>Veuillez remplir tous les champs.</h2>";
	header('Location: index.php?action=accueil');
}

?>