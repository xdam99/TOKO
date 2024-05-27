<?php

// render the template file and echo it
echo $blade->make('aide', ["title" => "Toko - Aide & assistance", "nav" => $nav])->render();

?>