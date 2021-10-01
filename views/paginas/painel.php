<link rel="stylesheet" type="text/css" href="<?php echo VENDOR_PATH ?>recursos/css/jquery.Jcrop.css" />
<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Título do modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body col">
                <center>
                    <output id="result"></output>
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" id="sendButton" value="Recortar">Recortar</button>
            </div>
        </div>
    </div>
</div>
<div class="row card-deck mt-3">


    <center>
        <figure class="figure">

            <label for="arquivo" style="cursor: pointer;">
                <img id="cropbox" src="<?php echo VENDOR_PATH . $_SESSION['nm_caminho_foto']; ?>" class="figure-img img-fluid rounded">
            </label>
            <input class="d-none" type="file" accept=".png,.jpeg" id="arquivo">
            <input type="hidden" id="x" name="x" />
            <input type="hidden" id="y" name="y" />
            <input type="hidden" id="w" name="w" />
            <input type="hidden" id="h" name="h" />
        </figure>
        <input type="submit" onclick="submitForm();" id="sendButton" value="Enviar">
        
    </center>
    <div class="container form-group col-lg-6">
        <div class="form-group">
            <label for="nome">Nome e sobrenome</label>

            <div class="input-group mb-3">
                <input type="text" class="form-control disable" name="nome" id="nome" aria-describedby="emailHelp" placeholder="Seu nome" value="<?php if (isset($_SESSION["nm_usuario"])) {
                                                                                                                                                        echo $_SESSION["nm_usuario"];
                                                                                                                                                    } ?>">

                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Atualizar</button>

                </div>
            </div>

            <label for="nickname">Nickname</label>
            <div class="input-group mb-3">

                <input type="text" class="form-control" name="nickname" id="nickname" aria-describedby="emailHelp" placeholder="Ex: Starkiller889" value="<?php if (isset($_SESSION["nm_nickname"])) {
                                                                                                                                                                echo $_SESSION["nm_nickname"];
                                                                                                                                                            } ?>">

                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Atualizar</button>

                </div>
            </div>
            <label for="email">Email</label>

            <div class="input-group mb-3">

                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Seu email" value="<?php if (isset($_SESSION["nm_email"])) {
                                                                                                                                                    echo $_SESSION["nm_email"];
                                                                                                                                                } ?>">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Atualizar</button>
                </div>
            </div>


            <label for="senha">Senha</label>
            <div class="input-group mb-3">

                <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha" value="<?php if (isset($_SESSION["nm_senha"])) {
                                                                                                                    echo $_SESSION["nm_senha"];
                                                                                                                } ?>">

                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Atualizar</button>
                </div>
            </div>

            <label for="cor">Cor favorita</label>
            <div class="input-group mb-3">
                <input type="color" name="cor" class="form-control" id="cor" placeholder="Senha" value="<?php if (isset($_SESSION["nm_cor_favorita"])) {
                                                                                                            echo $_SESSION["nm_cor_favorita"];
                                                                                                        } else {
                                                                                                            echo "#fff";
                                                                                                        } ?>">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Atualizar</button>
                </div>
            </div>
        </div>
    </div>
</div>