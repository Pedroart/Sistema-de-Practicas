<div class="container-fluid text-center">
    <?php
    include _view_ . "/efectivas/submenu.php";
    ?>

    <h1 class="h2 mb-2 text-gray-800">Datos del jefe inmediato</h1>
    <p class="mb-4">
        Rellena la ficha con los datos de tu jefe inmediato, los datos deben ser auténticos
        y verídicos de lo contrario no podrá continuar con los siguientes pasos.
    </p>

    <?php if ($estado == 3) : ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Respuesta del Sistema</h4>
            <p>Etapa Finalizada</p>
        </div>
    <?php elseif ($estado == 2) : ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Respuesta del Sistema</h4>
            <p>Datos cargados exitosamente</p>
        </div>
    <?php elseif ($estado == 1) : ?>
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Docente: Loren Ipsu</h4>
            <p>Datos Erroneos empresa no encontrada</p>
        </div>
    <?php endif; ?>

    <div class="row justify-content-center">
        <form name="formFichaDatos" id="formFichaDatos">

            <div class="col">
                <div class="card mb-4">
                    <div class="card-header">
                        Datos del Representante de la Empresa
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="empresa" class="col-sm-4 col-form-label">Empresa</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="empresa" name="empresa">
                                <option value=""><?=$empresa_nombre?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="DNI" class="col-sm-4 col-form-label">DNI</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="dni" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="correo" class="col-sm-4 col-form-label">Correo</label>
                            <div class="col-sm-8">
                                <input type="mail" class="form-control" name="correo" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="correo" class="col-sm-4 col-form-label">Numero</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="numero" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Distrito" class="col-sm-4 col-form-label">Genero</label>
                            <div class="col-sm-8">
                                <select name="Genero" class="form-control" required>
                                    <option value="Femenino">Femenino</option>
                                    <option value="Masculino">Masculino</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Name" class="col-sm-4 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nombre" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Aparterno" class="col-sm-4 col-form-label">Apellido Parterno</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="apellido_p" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Amarterno" class="col-sm-4 col-form-label">Apellido Marterno</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-user" name="apellido_m" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Distrito" class="col-sm-4 col-form-label">Grado de Instruccíon</label>
                            <div class="col-sm-8">
                                <select name="GradoInstruccion" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>Educación básica alternativa</option>
                                    <option>Educación básica especial</option>
                                    <option>Grado superior, técnicos profesionales</option>
                                    <option>Grado medio</option>
                                    <option>Grado elemental</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Direc" class="col-sm-4 col-form-label">Cargo</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="cargo" value="" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>

<script>
    var b_FichaDatos = document.getElementById('formFichaDatos');

    if (b_FichaDatos) {
        b_FichaDatos.addEventListener('submit', function(e) {
            e.preventDefault();
            var datos = new FormData(e.target);
            datos.append("id_proceso", <?= $id_ ?>);
            datos.append("etapa", <?= $actual ?>);
            datos.append("estado", <?= $estado ?>);
            datos.append("id_empresa",<?= $id_empresa ?>)
            datos.append("id_empresaAlumno",<?= $id_empresaAlumno?>)
            console.log(datos);
            fetch('http://practicas.test/efectivas/proceso', {
                    method: 'POST',
                    body: datos
                }).then(res => res.json())
                .then(data => {
                    if (data.resultado === true) {
                        location.reload();
                    } else {
                        console.log(data);
                    }
                })
        });
    }
</script>