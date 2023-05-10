
<nav class="navbar navbar-expand-lg navbar-light bg-white rounded mb-5">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
    <ul class="navbar-nav <?=$active[0]?>">
        <?php foreach($etapas as $etapa): ?>
            <?php //echo $etapa['id_etapa'] ?>
        <li class="nav-item">
        <a class="nav-link" href="proceso/<?php echo $etapa['id_etapa'] ?>"><?=$etapa['nombre'] ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
  </div>
</nav>
