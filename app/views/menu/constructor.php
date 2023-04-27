<?php

if ($_SESSION['role'] == "admin"){
    include _view_."/menu/data_admin.php";
}elseif ($_SESSION['role'] == "docente") {
    include _view_."/menu/data_admin.php";
}elseif ($_SESSION['role'] == "estudiante") {
    include _view_."/menu/data_admin.php";
}

?>

<?php foreach($menu as $section => $sub): ?>
    
    <div class="sidebar-heading"><?= $section ?></div>
        
        <?php foreach($sub as $grupo): ?>
        
        <?php if ($grupo['type']=="grupo-nav-link"): ?>
            
            <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="<?=$grupo['icon'] ?>"></i>
                            <span><?=$grupo['title'] ?></span>
                        </a>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
                            <div class="bg-white py-2 collapse-inner rounded">
                                
                                <?php foreach($grupo as $ttitle => $turl): ?>
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