<div class="card">
    <div class="card-header">
        <h3 class="card-title">Procesos Alumnos</h3>
    </div>
    <?php //echo json_encode($data);?>
    <div class="card-body p-1">
        <table class="table table-bordered table-striped" id="example2">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Proceso</th>
                    <th>Etapa</th>
                    <th>Estado</th>
                    <th style="width: 100px"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $person):?>
                <tr>
                    <td><?= $person["procesos_alumno"]?></td>
                    <td><?= $person["persona_nombres"]?></td>
                    <td><?= $person["persona_papellido"]?></td>
                    <td><?= $person["tp_nombre"]?></td>
                    <td><?= $person["tetp_nombre"]?></td>
                    <td><?= $person["tep_nombre"]?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="<?=_URL_."/procesos/".$person["procesos_id"]?>">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>


<script>
  window.onload = function () {
    $("#example2").DataTable({
      "searching": true,
      "ordering": true,
      "responsive": true,
    })
  };
</script>