<?php $__env->startSection('content'); ?>
    <section id="main-settings" class="divDarkMode">
        <div id="settings">
            <form method="post" id="formModif" action="index.php?action=modificationUser">
                <div>
                    <img src="./src/img/user_avec_fond_blanc.png">
                    <input class="modif-txt" type="text" id="modifUserFirstName" name="modifUserFirstName" value="<?php echo $_SESSION['nom']; ?>" disabled>
                    <input class="modif-txt" type="text" id="modifUserLastName" name="modifUserLastName" value="<?php echo $_SESSION['prenom']; ?>" disabled>
                </div>
                <div>
                    <img src="./src/img/pseudo_avec_fond_blanc.png">
                    <input class="modif-txt" type="text" id="modifUserPseudo" name="modifUserPseudo" value="<?php echo $_SESSION['pseudo']; ?>" disabled>
                </div>
                <div>
                    <img src="./src/img/message_avec_fond_blanc.png">
                    <input class="modif-txt" type="text" id="modifUserMail" name="modifUserMail" value="<?php echo $_SESSION['mail']; ?>" disabled>
                </div>
                <div>
                    <div id="modifUserBoxMDP">
                        <img src="./src/img/lock_fond_blanc.png">
                        <div>
                            <input class="modif-txt" type="password" id="modifUsermdp" name="modifUsermdp" placeholder="Nouveau mot de passe">
                        </div>
                        <a id="modifHide"><img id="imgHide" src="./src/img/noir_avec_fond_blanc.png"></a>
                    </div>
                </div>
                <div id="modifValidation">
                    <input class="modif-btn" type="button" id="btnModif" value="modifier">
                    <input class="modif-btn" type="submit" id="btnValidation" value="Valider" disabled>
                </div>  
            </form>
            <div>
                <form method="post" action="index.php?action=aide">
                    <input type="submit" value="Aide & Assistance">
                </form>
                <form method="post" action="index.php?action=deconnexion">
                    <input type="submit" name="btnDeconnexion" value="Deconnexion">
                </form>
            </div>
        </div>
        </section>
    <script src="./src/js/script-settings.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>