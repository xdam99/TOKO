<?php $__env->startSection('content'); ?>
    <section id="user">
        <!--Pour toutes les infos de l'utilisateur-->
        <?php $__currentLoopData = $infoUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
            <!--Si la page de l'utilisateur est celui de la session connectée-->
            <?php if($u['id'] == $_SESSION['id']): ?>
                    <img class="PP-user" src="<?php echo e($u['avatar']); ?>">
                    <form method="post" class="modifImg" action="index.php?action=modifImg" enctype="multipart/form-data">
                        <label for="file-upload" class="custom-file-upload">
                            <i class="fa fa-cloud-upload"><img src="./src/img/images_BLANC.png" width="50px"></i> 
                        </label>
                        <input id="file-upload" type="file" name="photo">
                        <input id="uploadFileUser" type="submit" class="confirmModifImg" value="Upload">
                    </form>
            <?php else: ?>
            <!--Sinon, on n'affiche que la photo de l'utilisateur-->
                <img class="PP-user" src="<?php echo e($u['avatar']); ?>">
            <?php endif; ?>
                <h1 class="title-user"><?php echo e($u['pseudo']); ?></h1>
            </div>
            <!--Si la page de l'utilisateur n'est pas celle de la session connectée-->
            <?php if($_SESSION['id'] != $_GET['id']): ?>
                <!--Si la session n'est pas ami avec l'utilisateur-->
                <?php if($statut == NULL): ?>
                    <form method="post" action="index.php?action=addFriend">
                        <input type="hidden" name="btnAddFriend" value="<?php echo e($_GET['id']); ?>">
                        <input id="btnAddFriendUser" type="submit" value="Ajouter en ami">
                    </form>
                <?php else: ?>
                    <?php $__currentLoopData = $statut; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!--Si la session est ami avec l'utilisateur-->
                        <?php if($s['etat'] == 'Ami'): ?> 
                            <p class="statut">ami</p>
                        <?php endif; ?>
                        <!--Si la session est en attente pour sa demande d'ami avec l'utilisateur-->
                        <?php if($s['etat'] == 'Attente'): ?>
                            <p class="statut">En attente</p>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                    <h1 class="title-home">Publier sur le mur de <?php echo e($u['pseudo']); ?></h1>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!--Si la page de l'utilisateur n'est pas celle de la session connectée-->
            <?php if($_SESSION['id'] != $_GET['id']): ?>
            <!--Alors, on affiche un formulaire pour créer les posts-->
            <form id="create-post" action="index.php?action=addPublication" method="post" enctype="multipart/form-data">
                <input type="text" class="title-post" name="title" placeholder="Votre titre">
                <input type="text" maxlength="150" class="txt-post" name="txtPublication" placeholder="Qu'avez-vous de beau à nous dire aujourd'hui ?">
                <label for="searchFileHome" class="custom-file-upload-home">
                    <i class="fa fa-cloud-upload"></i> Mettre une image
                </label>
                <input type="file" id="searchFileHome" name="photo">
                <input type="hidden" name="profile-id" value="<?= $_GET['id'] ?>">
                <input class="btn-post" type="submit" value="Envoyer son post">
            </form>
            <?php endif; ?>
            <?php if($_SESSION['id'] == $_GET['id']): ?>
                <h1 id="title-user">VOS PUBLICATIONS</h1>
            <?php else: ?>
                <h1 id="title-user">SES PUBLICATIONS</h1>
            <?php endif; ?>
        <div class="container-postUser">
            <!--Pour toutes les infos de l'utilisateur-->
            <?php $__currentLoopData = $postUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="publication-user-friend" data-aos="fade-bottom">
                <div>
                    <div class="user-margin">
                        <?php if($pu['idAuteur'] == $pu['idAmi']): ?>
                            <a href="index.php?action=user&id=<?php echo e($pu['idAuteur']); ?>" class="name-user-friend"><?php echo e($pu['auteur_pseudo']); ?></a>
                        <?php else: ?>
                            <a href="index.php?action=user&id=<?php echo e($pu['idAuteur']); ?>" class="name-user-friend"><?php echo e($pu['auteur_pseudo']); ?> -></a>
                            <a href="index.php?action=user&id=<?php echo e($pu['idAmi']); ?>" class="name-user-friend"><?php echo e($pu['ami_pseudo']); ?></a>
                        <?php endif; ?>
                    </div>
                    <h1 class="title-user-friend"><?php echo e($pu['titre']); ?></h1>
                    <div class="txt-user-friend">
                        <hr class="bar-post">
                        <p class="p-user-friend">
                            <?php echo e($pu['contenu']); ?>

                            <?php if($pu['image'] != "0"): ?>
                                <img src="<?php echo e($pu['image']); ?>">                                
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
                <div class="details-user-friend">
                    <p class="date_user-friend">Le <?php echo e($pu['dateEcrit']); ?></p>
                <?php if($pu['idAuteur'] == $_SESSION['id']): ?>
                    <form action="index.php?action=deletePost" method="post">
                        <input type="hidden" name="btnDeletePost" value="<?php echo e($pu['id']); ?>">
                        <input type="submit" class="btnDeletePost" value="Supprimer">
                    </form>
                <?php endif; ?>
                </div>
            </div>
            <hr class="bar-seperate">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>