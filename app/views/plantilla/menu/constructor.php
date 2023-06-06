<?php

use app\models;

if ($_SESSION['role'] == "1") {
    include _view_ . "/plantilla/menu/data_admin.php";
} elseif ($_SESSION['role'] == "2") {
    include _view_ . "/plantilla/menu/data_docente.php";
} elseif ($_SESSION['role'] == "3") {
    include _view_ . "/plantilla/menu/data_estudiante.php";
}

?>

<!-- Sidebar -->
<div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="" class="nav-link active">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Inicio
                    </p>
                </a>
            </li>
            <?php foreach ($menu as $section => $sub) : ?>

                <li class="nav-header"><?= $section ?></li>
                
                <?php foreach ($sub as $grupo) : ?>

                    <?php if ($grupo['type'] == "nav-link") : ?>
                        <li class="nav-item">
                            <a href="pages/kanban.html" class="nav-link d-flex">
                                <i class="nav-icon <?=$grupo['icon'] ?>"></i>
                                <p>
                                <?=$grupo['title'] ?>
                                </p>
                            </a>
                        </li>
                    <?php elseif ($grupo['type'] == "grupo-nav-link") : ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link d-flex">
                                <i class="nav-icon <?=$grupo['icon'] ?>"></i>
                                
                                <p>
                                <?=$grupo['title'] ?>
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                
                                <?php foreach($grupo['sub'] as $ttitle => $turl): ?>
                                    <li class="nav-item">
                                    <a href="<?= $turl ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p><?= $ttitle ?></p>
                                    </a>
                                </li>
                                        
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endif ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->