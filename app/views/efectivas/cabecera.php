
    <?php if($estado==3) :?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Respuesta del Sistema</h4>
        <p>Etapa Finalizada</p>
    </div>
    <?php elseif($estado==2) :?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Respuesta del Sistema</h4>
        <p>Datos cargados exitosamente</p>
    </div>
    <button id="borrar" type="submit" class="btn btn-primary mb-5">Cancelar Envio</button>    
    <?php elseif($estado>2) :?>
    <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Docente: Loren Ipsu</h4>
        <p>Datos Erroneos empresa no encontrada</p>
    </div>
       
    <?php endif; ?>