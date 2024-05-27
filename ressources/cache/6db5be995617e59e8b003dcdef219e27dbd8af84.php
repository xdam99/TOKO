<?php $__env->startSection('content'); ?>
        <img id="logo" src="./src/img/TOKO.png">
        <section id="home">
            <div id="home-title">
                <div id="home-title-box">
                    <h1>Bienvenue sur TOKO</h1>
                    <hr>
                </div>
            </div>
            <div id="home-btn">
                <div id="box-btn">
                    <input type="button" id="connexion" value="Connexion">
                    <input type="button" id="register" value="S'inscrire">
                </div>
                <!--
                <form method="post" id="formConnexion" name="actionConnexion">
                    <h1 id="title-connexion">CONNEXION</h1>
                    <input class="connexion-txt" name="connexionPseudo" placeholder="Pseudo">
                    <input type="password" class="connexion-txt" name="connexionMDP" placeholder="Mot de passe">
                    <input type="submit" id="validation-connexion" action="connexion" value="Valider">
                </form>
                <form method="post" id="formRegister" name="actionRegister">
                    <h1 id="title-register">INSCRIPTION</h1>
                    <div id="box-register-fullname">
                        <input class="register-txt" name="registerFirstName" placeholder="Nom">
                        <input class="register-txt" name="registerLastName" placeholder="Prénom">
                    </div>
                    <input class="register-txt" name="registerPseudo" placeholder="Pseudo">
                    <input type="password" class="register-txt" name="registerMDP" placeholder="Mot de passe">
                    <input type="submit" id="validation-register" action="inscription" value="Valider">
                </form>
                -->
            </div>
        </section>
        <script src="./src/js/script.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>