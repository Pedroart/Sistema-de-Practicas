<form id="idEtapa" name="formFichaDatos">

    <div class="justify-content-md-center">
        <?php foreach ($formulario as $card => $valores) : ?>
            <div>
                <div class="card mb-4">
                    <div class="card-header">
                        <?= $card ?>
                    </div>
                    <div class="card-body">
                        <?php foreach ($valores as $input) : ?>
                            
                            <div class="form-group row">

                                <label for="<?= $input[0] ?>" class="col-sm-4 col-form-label-sm"><?= $input[1] ?></label>

                                <div class="col-sm-8">

                                    <?php if ($input[2] == "select") : ?>
                                        
                                        <select name="<?= $input[0] ?>" id="<?php echo (isset($input[5])) ? $input[5] : "1"; ?>" class="form-control" <?php echo ($estado >= 2) ? "disabled" : $input[4]; ?>>
                                            <?php foreach ($input[3] as $val => $text) : ?>
                                                <option value="<?= $val ?>"><?= $text ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    <?php elseif ($input[2] == "file" && $estado >= 2) : ?>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo (isset($input[5])) ? $input[5] : "1"; ?>">
                                            Ver Documento
                                        </button>

                                        <div class="modal fade" id="<?php echo (isset($input[5])) ? $input[5] : "1"; ?>" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document" style="max-width: 1000px;">
                                                <div class="modal-content">
                                                    <div class="card-header">
                                                        <h5 class="modal-title" id="popupModalLabel">Documento</h5>
    
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    
                                                    <embed src="<?= _URL_ ?><?= substr($input[3]["uri"], 7) ?>" height="800px" width="1000px">

                                                    <div class="card-footer">
                                                        <input class="form-control" id="record" type="text" placeholder="<?= $input[3]["comentario"] ?>" disabled>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        
                                        <input  type="<?= $input[2] ?>" name="<?= $input[0] ?>" id="<?php echo (isset($input[5])) ? $input[5] : "1"; ?>" class="form-control<?php echo ($input[2] == "file") ? "-plaintext" : ""; ?>" <?php echo ($input[2] == "file") ? "accept='application/pdf'" : ""; ?> value="<?= $input[3] ?>" <?php echo ($estado >= 2) ? "disabled" : $input[4]; ?>>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            
        <?php endforeach; ?>
        
    </div>
    <?php if ($estado <2) : ?>
                <button id="enviar" type="submit" class="btn btn-primary mb-5">Enviar</button>
    <?php elseif ($estado ==2 or $estado ==4):?>
        <button id="enviar" type="submit" class="btn btn-primary mb-5">Eliminar
        </button>
                <?php endif; ?> 
</form>