<div class="container text-center">
    <h1>Registro de Practicas <?= $titulo?></h1>
    <div class="alert alert-warning" role="alert">
      Aún no se ha registrado ninguna practica.
    </div>
    <p>Al presionar el botón "Continuar" se creará un nuevo proceso de registro. Este proceso es irreversible.</p>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmacion">Confirmar acción</button>
</div>

<div class="modal fade" id="confirmacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Confirmar acción</h4>
        
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          ¿Estás seguro de que deseas realizar esta acción?
        </div>
        <div class="modal-footer">
          <!-- Agregamos los botones de confirmación y cancelación -->
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          
          <button type="button" id="bconfirmacion" data-proceso=<?=$proceso?> class="btn btn-primary">Confirmar</button>
        </div>
      </div>
    </div>
</div>

<script>
  var b_confirmacion = document.getElementById('bconfirmacion');
if(b_confirmacion){
    b_confirmacion.addEventListener('click',function(e){
        e.preventDefault();
            var datos = new FormData();
            datos.append('id', b_confirmacion.dataset.proceso);
            
            fetch('<?= _URL_ ?>/proceso/create',{
                method: 'POST',
                body: datos
            })  .then(res => res.json())
                .then(data=> {
                    if( data.resultado === true){ location.reload()}
                })
        });
}
</script>