

<div class="card">

    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        Codigo
                    </th>
                    <th style="width: 20%">
                        Estudiante
                    </th>
                    <th style="width: 30%">
                        Empresa
                    </th>
                    <th>
                        Progreso
                    </th>
                    <th style="width: 8%" class="text-center">
                        Status
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $person) : ?>
                    <tr>
                        <td>
                            <?= $person["id_alumno"]?>
                        </td>
                        <td>
                            <a>
                            <?= $person["nombre"]." ".$person["apellido_paterno"]?>
                            </a>
                        </td>
                        <td>
                            <a>
                            <?= $person["Razon_socal_empresa"]?>
                            </a>
                        </td>
                        <td class="project_progress">
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: <?= 100*round(($person["id_etapa"]-$person["Inicio"])/$person["Numero_Pasos"],2)?>%">
                                </div>
                            </div>
                            <small>
                                Convalidacion
                            </small>
                        </td>
                        <td class="project-state">
                            <span class="badge badge-success">Success</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="#">
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