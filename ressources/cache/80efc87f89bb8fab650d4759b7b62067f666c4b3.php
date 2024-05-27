<?php $__env->startSection('content'); ?>
    <header>

    </header>
    <section id="box-home">
        <div id="menu">
            <hr>
            <nav>
                <a href="#"><img src="../../src/img/home.png" height="87px" width="100px"></a>
                <a href="#"><img src="../../src/img/save.png" height="87px" width="100px"></a>
                <a href="#"><img src="../../src/img/user.png" height="87px" width="100px"></a>
                <a href="#"><img src="../../src/img/settings.png" height="87px" width="100px"></a>
            </nav>
        </div>
        <div id="contenu">
            <?php
                echo $_SESSION['id'];
            ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>