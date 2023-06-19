<div class="container-fluid text-center">
    <?php
    include _view_ . "/desempeno/submenu.php";
    ?>

    <h2 class="h2 mb-2 text-gray-800">Boletas de pago</h2>
    <p class="mb-4">
        Es el medio por el cual se acredita el cumplimiento de la prestación en una relación
        laboral. Es decir, la boleta confirma que ha recibido del empleador una
        remuneración como contraprestación por la labor que ha realizado.
        </br>
        Si emites recibos por honorarios electrónicos deben estar firmados y sel lados por la
        empresa. Debe escanear y subir estos documentos (las tres últimas boletas o
        recibos a la fecha) al sistema en formato PDF.
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
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 ">
            <div class="card mb-4">
                
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
                            <label for="ficha_mensual1" class="col-sm-4 col-form-label">Boleta pago #1</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control-file" id="ficha_mensual1" name="ficha_mensual1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ficha_mensual2" class="col-sm-4 col-form-label">Boleta pago #2</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control-file" id="ficha_mensual2" name="ficha_mensual2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ficha_mensual3" class="col-sm-4 col-form-label">Boleta pago #3</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control-file" id="ficha_mensual3" name="ficha_mensual3">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>