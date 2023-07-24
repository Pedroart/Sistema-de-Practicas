
<nav class="navbar navbar-expand-lg navbar-light bg-white rounded mb-5">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse justify-content-center" id="navbarsExample10">
    <ul class="nav nav-tabs">
        <?php foreach($etapas as $etapa): ?>
            <?php //echo $etapa['id_etapa'] ?>
        <li class="nav-item ">
        <a class="nav-link <?php echo ($activo == $etapa['tetp_id_etapa'])? "active" : ""; ?> <?php echo ($actual >= $etapa['tetp_id_etapa'])? "" : "disabled"; ?>" href="http://practicas.test/efectivas/proceso/<?php echo $etapa['tetp_id_etapa'] ?>"><?=$etapa['tetp_nombre'] ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
  </div>

</nav>
