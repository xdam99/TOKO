<?php
if(!isset($_SESSION['id'])){
}
else {
    header("Location: index.php?action=home");
}

// render the template file and echo it
echo $blade->make('accueil', ["title" => "Toko - Bienvenue !"])->render();

?>