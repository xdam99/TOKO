<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="16x16" href="src/img/toko_58B_icon.ico">

        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        
        <link rel="stylesheet" id="theme-link" href="src/css/style_light.css">
        <link rel="stylesheet" media="screen and (max-width: 1500px)" href="src/css/screen.css"/>

        <title><?php echo e($title); ?></title>
    </head>
    <body>
    <section id="main">
        <a id="lien-logo"><img src="src/img/TOKO.png" id="logo"></a>
        <section id="box-home">
            <div id="menu">
                <hr>
                <nav>
                    <?php if($nav == "home"): ?>
                        <a class="active" href="index.php?action=home"><img src="./src/img/home2.png" height="67px" width="70px"></a>
                    <?php else: ?>
                        <a href="index.php?action=home"><img id="dm_home" src="./src/img/home.png" height="67px" width="70px"></a>
                    <?php endif; ?>

                    <?php if($nav == "user"): ?>
                        <a class="active" href="index.php?action=user&id=<?php echo $_SESSION['id'] ?>">
                        <?php if($_SESSION['avatar'] == "./src/img/toko.png"): ?>
                            <img src="./src/img/user_blanc.png" height="67px" width="70px"></a>
                        <?php else: ?>
                            <img src="<?php echo $_SESSION['avatar'] ?>" id="userImg" height="67px" width="70px"></a>
                        <?php endif; ?>
                    <?php else: ?>
                        <a href="index.php?action=user&id=<?php echo $_SESSION['id'] ?>">
                        <?php if($_SESSION['avatar'] == "./src/img/toko.png"): ?>
                            <img id="dm_user" src="./src/img/user.png" height="67px" width="70px"></a>
                        <?php else: ?>
                            <img src="<?php echo $_SESSION['avatar'] ?>" id="userImg" height="67px" width="70px"></a>
                        <?php endif; ?>
                    <?php endif; ?>   

                    <?php if($nav == "friend" || $nav == "search"): ?>
                        <a class="active" href="index.php?action=friend&id=<?php echo $_SESSION['id'] ?>"><img src="./src/img/friends2_blanc.png" height="67px" width="70px"></a>
                    <?php else: ?>   
                        <a href="index.php?action=friend&id=<?php echo $_SESSION['id'] ?>"><img id="dm_friend" src="./src/img/friends2.png" height="67px" width="70px"></a> 
                    <?php endif; ?>

                    <?php if($nav == "settings"): ?>
                        <a class="active" href="index.php?action=settings"><img src="./src/img/settings2.png" height="67px" width="70px"></a>
                    <?php else: ?>
                        <a href="index.php?action=settings"><img id="dm_settings" src="./src/img/settings.png" height="67px" width="70px"></a>
                    <?php endif; ?>
                </nav>
            </div>
        </section>
        <?php echo $__env->yieldContent("content"); ?>
    </section>
    <button id="theme"></button>
    <script src="./src/js/script-easterEgg.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        let themeLink = document.querySelector("#theme-link")
        window.onload = () => { // Nous attendons que le DOM soit entièrement chargé
            // Nous allons chercher la balise "link" contenant le thème

            // Nous vérifions si un thème est déjà stocké
            if(localStorage.theme != null){
                // Si un thème est stocké, nous le chargeons dans le href de la balise link
                themeLink.href = `./src/css/style_${localStorage.theme}.css`
                document.querySelector('#theme').innerHTML = `<img src='./src/img/${localStorage.theme}.png' width='50px' height='50px'>`
            }else{
                // Si aucun thème n'est stocké, nous initialisons le lien
                themeLink.href = `./src/css/style_light.css`
                // Nous stockons le thème clair
                document.querySelector('#theme').innerHTML = `<img src='./src/img/${localStorage.theme}.png' width='50px' height='50px'>`
                localStorage.theme = "light"
            }
        }
        document.getElementById("theme").addEventListener("click", function(){
            // Si le thème stocké est "clair"
            if(localStorage.theme == "light"){
                // On stocke le thème "sombre"
                localStorage.theme = "dark"
                // On prépare le texte de la span pour revenir au thème clair
                var themeText = `<img src='./src/img/${localStorage.theme}.png' width='50px' height='50px'>`
            }else{ // Sinon
                // On stocke le thème "clair"
                localStorage.theme = "light"
                // On prépare le texte de la span pour revenir au thème sombre
                var themeText = `<img src='./src/img/${localStorage.theme}.png' width='50px' height='50px'>`
            }
            // On met à jour le texte de la span
            this.innerHTML = `${themeText}`
            // On met à jour le href de la balise link
            themeLink.href = `./src/css/style_${localStorage.theme}.css`
        })
    </script>
    </body>
</html>
