<?php
use app\models;

if ($_SESSION['role'] == "3"){
    include _view_."/menu/data_admin.php";
}elseif ($_SESSION['role'] == "2") {
    include _view_."/menu/data_docente.php";
}elseif ($_SESSION['role'] == "1") {
    include _view_."/menu/data_estudiante.php";
    
}

?>

<?php foreach($menu as $section => $sub): ?>
    
    <div class="sidebar-heading"><?= $section ?></div>
        
        <?php foreach($sub as $grupo): ?>
        
        <?php if ($grupo['type']=="grupo-nav-link"): ?>
            
            <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse<?= str_replace(' ', '_', $grupo['title']) ?>" aria-expanded="true" aria-controls="collapse<?= str_replace(' ', '_', $grupo['title']) ?>">
                            <i class="<?=$grupo['icon'] ?>"></i>
                            <span><?=$grupo['title'] ?></span>
                        </a>
                        <div id="collapse<?= str_replace(' ', '_', $grupo['title']) ?>" class="collapse" aria-labelledby="heading<?= str_replace(' ', '_', $grupo['title']) ?>" data-parent="#accordionSidebar" style="">
                            <div class="bg-white py-2 collapse-inner rounded">
                                
                                <?php foreach($grupo['sub'] as $ttitle => $turl): ?>
                                        <a class="collapse-item" href="<?= $turl ?>"><?= $ttitle ?></a>
                                <?php endforeach; ?>

                            </div>
                        </div>
            </li>
        
        <?php elseif ($grupo['type']=="nav-link"): ?>

            <li class="nav-item">
                        <a class="nav-link" href="<?=$grupo['url'] ?>">
                            <i class="<?=$grupo['icon'] ?>"></i>
                            <span><?=$grupo['title'] ?></span></a>
            </li>
        <?php endif ?>

        <?php endforeach; ?>
    <hr class="sidebar-divider d-none d-md-block">

<?php endforeach; ?>