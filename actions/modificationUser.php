<?php

if(!empty($_POST['modifUserLastName']) && !empty($_POST['modifUserFirstName']) && !empty($_POST['modifUserPseudo']) && !empty($_POST['modifUserMail'])){
    if(empty($_POST['modifUsermdp'])){
        $sql = "UPDATE user
        SET nom= :nom,
            prenom= :prenom,
            pseudo= :pseudo,
            mail= :mail
        WHERE id=".$_SESSION['id'];

        $query = $pdo->prepare($sql);
        try{
            $query->execute(array(
                'nom' => $_POST['modifUserFirstName'],
                'prenom' => $_POST['modifUserLastName'],
                'pseudo' => $_POST['modifUserPseudo'],
                'mail' => $_POST['modifUserMail']
            ));
            $_SESSION['nom'] = $_POST['modifUserFirstName'];
            $_SESSION['prenom'] = $_POST['modifUserLastName'];
            $_SESSION['pseudo'] = $_POST['modifUserPseudo'];
            $_SESSION['mail'] = $_POST['modifUserMail'];
            header("Location: index.php?action=settings");
        }catch(Exception $e){
            echo $e->getMessage();
        }
    } else {
        $sql = "UPDATE user
                SET nom= :nom,
                    prenom= :prenom,
                    pseudo= :pseudo,
                    mail= :mail,
                    mdp= :mdp
                WHERE id=".$_SESSION['id'];
    
        $query = $pdo->prepare($sql);
        try{
            $query->execute(array(
                'nom' => $_POST['modifUserFirstName'],
                'prenom' => $_POST['modifUserLastName'],
                'pseudo' => $_POST['modifUserPseudo'],
                'mail' => $_POST['modifUserMail'],
                'mdp' => sha1($_POST['modifUsermdp'])
            ));
            $_SESSION['nom'] = $_POST['modifUserFirstName'];
            $_SESSION['prenom'] = $_POST['modifUserLastName'];
            $_SESSION['pseudo'] = $_POST['modifUserPseudo'];
            $_SESSION['mail'] = $_POST['modifUserMail'];
            header("Location: index.php?action=settings");
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
} else {
    echo "Veuillez remplir tous les champs";
    header("Location: index.php?action=settings");
}

?>