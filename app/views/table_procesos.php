

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
                                <?=strtoupper($person["e_nombre"]).":".($person["id_etapa"]-$person["Inicio"])."/".$person["Numero_Pasos"] ?>
                            </small>
                        </td>
                        <td class="project-state">
                            <?php switch($person["id_estado"]): case 1: ?>
                                <span class="badge badge-info">Pendiente</span>
                                <?php break;?>
                                <?php case 2:?>
                                <span class="badge badge-warning">Enviado</span>
                                <?php break;?>
                                <?php case 3:?>
                                <span class="badge badge-success">Completado</span>
                                <?php break;?>
                                <?php case 4:?>
                                <span class="badge badge-danger">Fallido</span>
                                <?php break;?>
                                <?php case "5":?>
                                    <span class="badge badge-primary">Completando</span>
                                <?php break;?>
                                <?php default:?>
                                
                            <?php endswitch;?>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="<?=_URL_."/procesos/".$person["id"]?>">
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