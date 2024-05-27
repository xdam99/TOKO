<?php $__env->startSection('content'); ?>
    <section id="friend">
    <div id="add-friend">    
        <h1 id="title-friend">AJOUTER DES UTILISATEURS</h1>
        <form id="search-friend" method="post" action="index.php?action=search">
            <input type="text" name="txtSearch" placeholder="Nom de l'utilisateur">
            <input type="submit" value="Rechercher">
        </form>
        <!--Résultat de recherche-->
        <?php if(!$search): ?>
        <?php else: ?>
        <div class="allUser">
        <?php $__currentLoopData = $search; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="userFriend">
                <img class="PP-user-friend" src="<?php echo e($s['avatar']); ?>">
                <div>
                    <a href="index.php?action=user&id=<?php echo e($s['id']); ?>"><h1><?php echo e($s['pseudo']); ?></h1></a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
        <!--Demandes d'ami-->
        <?php if(!$askFriend): ?>
        <?php else: ?>
        <div id="allInvite">
            <h1 id="title-invite">UTILISATEURS EN ATTENTE</h1>
            <?php $__currentLoopData = $askFriend; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $af): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($af['etat'] == 'Attente'): ?>
                    <?php $pasAmi = false; ?>
                    <div class="invite">
                        <img src="<?php echo e($af['avatar']); ?>">
                        <div>
                            <h1><?php echo e($af['pseudo']); ?></h1>
                            <div>
                                <form method="post" action="index.php?action=acceptFriend">
                                    <input type="hidden" name="btnAddFriend" value="<?php echo e($af['id_lien']); ?>">
                                    <button id="btnAddFriend" type="submit"><img src="./src/img/check_blanc.png" width="30px" heigth="30px"></button>
                                </form>
                                <form method="post" action="index.php?action=declineFriend">
                                    <input type="hidden" name="btnDeclineFriend" value="<?php echo e($af['id_lien']); ?>">
                                    <button id="btnDeclineFriend" type="submit"><img src="./src/img/cross_blanc.png" width="25px" heigth="25px"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <?php $pasAmi = true; ?>
                    
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($pasAmi == true): ?>
                <h2>Vous n'avez pas de demande d'ami, je suis triste pour vous...</h2>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <!---->
        <?php if(!$askFriend): ?>
        <?php else: ?>
        <div id="allFriend">
            <h1 id="title-allFriend">VOS AMIS</h1>
            <?php $__currentLoopData = $askFriend; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $af): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($af['etat'] == 'Ami'): ?>
                    <div class="invite">
                        <img src="<?php echo e($af['avatar']); ?>">
                        <div>
                            <h1><?php echo e($af['pseudo']); ?></h1>
                            <div>
                                <form method="post" action="index.php?action=declineFriend">
                                    <input type="hidden" name="btnDeclineFriend" value="<?php echo e($af['id_lien']); ?>">
                                    <button id="btnDeclineFriend" type="submit"><img src="./src/img/cross_blanc.png" width="25px" heigth="25px"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
    </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>