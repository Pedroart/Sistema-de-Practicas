
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Alumnos en espera de Validacion</h3>
    </div>

    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th style="width: 200px"></th>
                    <th style="width: 100px"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $person):?>
                <tr>
                    <td><?= $person["id_alumno"]?></td>
                    <td><?= $person["nombre"]?></td>
                    <td><?= $person["apellido_paterno"]?></td>
                    <td><?= $person["comentario"]." ".$person["Fecha"]?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="<?=_URL_."/validaciones/".$person["id_alumno"]?>">
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