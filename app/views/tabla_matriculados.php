<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Alumnos en espera de Validacion</h3>
    </div>
    <?php //echo json_encode($data);?>
    <div class="card-body p-1">
        <table class="table table-bordered table-striped" id="example1">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th style="width: 100px"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $person):?>
                <tr>
                    <td><?= $person["matricula_alumno"]?></td>
                    <td><?= $person["persona_nombres"]?></td>
                    <td><?= $person["persona_papellido"]?></td>
                    <td><?= $person["tep_nombre"]?></td>
                    <td><?= $person["matricula_fecha"]?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="<?=_URL_."/validaciones/".$person["matricula_alumno"]?>">
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
    $("#example1").DataTable({
      "searching": true,
      "ordering": true,
      "responsive": true,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  };
</script>

