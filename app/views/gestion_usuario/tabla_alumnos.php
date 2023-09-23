
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
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Escuela</th>
                    <th style="width: 100px"></th>
                </tr>
            </thead>
            <tbody>
  
            </tbody>
        </table>
    </div>

</div>


<script>
  window.onload = function () {
    const Dataset =  <?=json_encode($Data)?>;

    $("#example1").DataTable({
      "searching": true,
      "ordering": true,
      "responsive": true,
      "data": Dataset
    }).buttons().container().appendTo('#example1 .col-md-6:eq(0)');
  };
</script>
