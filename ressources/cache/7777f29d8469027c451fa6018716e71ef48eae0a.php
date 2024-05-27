<?php $__env->startSection('content'); ?>
        <section id="home">
            <div id="home-title">
                <div id="home-title-box">
                    <h1>Bienvenue sur TOKO</h1>
                    <hr>
                </div>
            </div>
            <div id="home-btn" class="divDarkMode">
                <div id="box-btn">
                    <input type="button" id="connexion" value="Connexion">
                    <input type="button" id="register" value="S'inscrire">
                </div>
            </div>
        </section>
        <script src="./src/js/script-accueil.js"></script>
        <script src="./src/js/script-menu.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>