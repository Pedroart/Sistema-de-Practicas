<div class="container-fluid text-center">
    <?php
    include _view_ . "/efectivas/submenu.php";
    ?>

    <h2 class="h2 mb-2 text-gray-800">Carta de aceptación</h2>
    <p class="mb-4">
        Es un documento debidamente firmado y sellado, otorgado por la empresa donde menciona que
        ha sido aceptado para realizar sus prácticas pre profesionales, donde indica la fecha de inicio y
        culminación tus prácticas. Debe escanear y subir este documento al sistema en formato PDF.
    </p>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Respuesta del Sistema</h4>
        <p>Etapa Finalizada</p>
    </div>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Respuesta del Sistema</h4>
        <p>Datos cargados exitosamente</p>
    </div>

    <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Docente: Loren Ipsu</h4>
        <p>Datos Erroneos empresa no encontrada</p>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 ">
            <div class="card mb-4">
                <div class="card-header">
                    Aceptación de Practicas
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <label for="empresa" class="col-sm-4 col-form-label">Empresa</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="empresa" name="empresa">
                                    <option value="empresa_a">Empresa A</option>
                                    <option value="empresa_b">Empresa B</option>
                                    <option value="empresa_c">Empresa C</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_inicio" class="col-sm-4 col-form-label">Fecha de inicio de las prácticas</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_fin" class="col-sm-4 col-form-label">Fecha de fin de las prácticas</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="carta_presentacion" class="col-sm-4 col-form-label">Carta de presentación</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control-file" id="carta_presentacion" name="carta_presentacion">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>