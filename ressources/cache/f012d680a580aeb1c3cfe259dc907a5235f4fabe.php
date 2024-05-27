<?php $__env->startSection('content'); ?>
    <section id="home-post" class="divDarkMode">
        <h1 class="title-home">Créer votre publication</h1>
        <form id="create-post" action="index.php?action=addPublication" method="post" enctype="multipart/form-data">
            <input type="text" class="title-post" name="title" placeholder="Votre titre">
            <input type="text" maxlength="150" class="txt-post" name="txtPublication" placeholder="Qu'avez-vous de beau à nous dire aujourd'hui ?">
            <label for="searchFileHome" class="custom-file-upload-home">
                <i class="fa fa-cloud-upload"><img src="./src/img/images_BLANC.png" width="50px"></i> 
            </label>
            <input type="hidden" name="profile-id" value="<?= $_SESSION['id'] ?>">
            <input type="file" id="searchFileHome" name="photo">
            <input class="btn-post" type="submit" value="Envoyer son post">
        </form>
        <p id="error-post"></p>
        <div class="all-post">
            <h1 class="title-home">Publications de vos amis</h1>
            <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="publication-user-friend" data-aos="fade-bottom">
                        <div class="user-friend">
                            <div>
                                <?php if($p['idAuteur'] == $p['idAmi']): ?>
                                    <img class="PP-user-friend" src="<?php echo e($p['avatar']); ?>">
                                    <a href="index.php?action=user&id=<?php echo e($p['idAuteur']); ?>" class="name-user-friend"><?php echo e($p['auteur_pseudo']); ?></a>
                                <?php else: ?>
                                    <img class="PP-user-friend" src="<?php echo e($p['auteur_avatar']); ?>">
                                    <a href="index.php?action=user&id=<?php echo e($p['idAuteur']); ?>" class="name-user-friend"><?php echo e($p['auteur_pseudo']); ?> -></a>
                                    <a href="index.php?action=user&id=<?php echo e($p['idAmi']); ?>" class="name-user-friend"><?php echo e($p['ami_pseudo']); ?></a>
                                <?php endif; ?>
                                <hr class="bar-user">
                            </div>
                        </div>
                        <div>
                            <h1 class="title-user-friend"><?php echo e($p['titre']); ?></h1>
                            <div class="txt-user-friend">
                                <hr class="bar-post">
                                <p class="p-user-friend">
                                    <?php echo e($p['contenu']); ?>

                                    <?php if($p['image'] != "0"): ?>
                                        <img src="<?php echo e($p['image']); ?>">                                
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                        <div class="details-user-friend">
                            <p class="date_user-friend">Le <?php echo e($p['dateEcrit']); ?></p>
                        <?php if($p['idAuteur'] == $_SESSION['id']): ?>
                            <form action="index.php?action=deletePost" method="post">
                                <input type="hidden" name="btnDeletePost" value="<?php echo e($p['ecrit_id']); ?>">
                                <input type="submit" class="btnDeletePost" value="Supprimer">
                            </form>
                        <?php endif; ?>
                            <form method="post" action="index.php?action=addLike">
                                <input type="hidden" name="like" value="<?php echo e($p['ecrit_id']); ?>">
                                <input class="aimer" type="submit" value="Like">
                            </form>
                        </div>
                    </div>
                    <hr class="bar-seperate">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>