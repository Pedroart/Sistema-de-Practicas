

<p class="mb-4">
  En este espacio podrás visualizar todas las cartas de presentación que
  generaste, debes descargarlo e imprimirlo a colores.
</p>

<div class="card mb-4">
  <table class="table">
    <thead>
      <tr>
        <th>Numero</th>
        <th>Centro de prácticas</th>
        <th>Descarga</th>
      </tr>
    </thead>
    <tbody>
    <?php if($estado) :?>
      <tr>
        <td><?=$dataProceso["procesos_id"]?></td>
        <td><?=$data_empresa[0]["empresa_razon_social"]?></td>
        <td>
          <a href="<?= _URL_ ?>/efectivas/cartas/1" class="btn btn-success btn-circle"><i class="fas fa-check"></i></a>
        </td>
      </tr>
    <?php else:?>
      <tr>
        <td>0</td>
        <td>Carta No generada</td>
        <td>
        </td>
      </tr>
    <?php endif; ?>

      
    </tbody>
  </table>
</div>

<div class="alert alert-warning" role="alert">
  <h4 class="alert-heading">Recordatorio</h4>
  <p>Se le recuerda que tiene un plazo máximo de 10 dias para subir su carta de aceptación,
    caso contrario no se reconocerá las prácticas en dicha empresa. Mayores detalles serán
    enviados a tu correo corporativo</p>
</div>