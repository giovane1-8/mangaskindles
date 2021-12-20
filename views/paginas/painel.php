<link rel="stylesheet" type="text/css" href="<?php echo VENDOR_PATH ?>recursos/css/jquery.Jcrop.css" />
<div class="modal modal_alert_painel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex col">
                <output id="result"></output>
            </div>
            <div id="modal-footer" class="modal-footer">

            </div>
        </div>
    </div>
</div>
<div class="row card-deck mt-3">


    <figure class="figure mx-auto">
        <label class='label-foto' for="arquivo" style="cursor: pointer;">
            <img id="imagem" src="<?php echo VENDOR_PATH . $_SESSION['nm_caminho_foto']; ?>" class="img-thumbnail rounded" style="width: 448px; height: 448px;">
        </label>
        <div class="d-flex justify-content-around mx-auto">

            <input type="button" onclick="submitForm();" name='Recortar foto' class="btn btn-primary darkmode-ignore" value="Recortar foto">

            <?php
            if (substr($_SESSION["nm_caminho_foto"], -11) != "default.png") {
                echo "<form action='" . VENDOR_PATH . "painel/excluirfoto' method='POST'>
                        <input type='hidden' name='hidden'>
                        <input type='submit' class='btn btn-primary darkmode-ignore' value='Remover Foto';'>
                      </form>";
            }
            ?>
        </div>
        <input class="d-none" type="file" accept=".png, .jpeg" id="arquivo">
        <input type="hidden" id="x" name="x" />
        <input type="hidden" id="y" name="y" />
        <input type="hidden" id="w" name="w" />
        <input type="hidden" id="h" name="h" />
    </figure>


    <div class="container form-group col-lg-6">
        <form action="<?php echo VENDOR_PATH; ?>painel/atualizar/nome" method="POST">

            <div class="form-group">
                <label for="nome">Nome e sobrenome</label>

                <div class="input-group mb-3">
                    <input type="text" maxlength="45" class="form-control disable" name="nome" id="nome" aria-describedby="emailHelp" placeholder="Seu nome" value='<?php echo $_SESSION["nm_usuario"]; ?>'>

                    <div class="input-group-append">

                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Atualizar</button>
                    </div>
                </div>
        </form>

        <form action="<?php echo VENDOR_PATH; ?>painel/atualizar/nickname" method="POST">

            <label for="nickname">Nickname</label>

            <div class="input-group mb-3">

                <input type="text" maxlength="20" class="form-control" name="nickname" id="nickname" aria-describedby="emailHelp" placeholder="Ex: Starkiller889" value="<?php echo $_SESSION["nm_nickname"]; ?>">

                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Atualizar</button>

                </div>
            </div>
        </form>

        <form action="<?php echo VENDOR_PATH; ?>painel/atualizar/email" method="POST">

            <label for="email">Email</label>

            <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Seu email" value="<?php echo $_SESSION["nm_email"]; ?>">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Atualizar</button>
                </div>
            </div>
        </form>

        <form action="<?php echo VENDOR_PATH; ?>painel/atualizar/senha" method="POST">

            <label for="senha">Senha</label>
            <div class="input-group mb-3">

                <input type="password" name="senha" class="form-control" id="senha" value="<?php echo $_SESSION["nm_senha"]; ?>">

                <div class="input-group-append">
                    <button class="btn btn-outline-info" type="button" id="senhaToggle" onclick='mostrarSenha(_("senha"),_("senhaToggle"))'>mostrar</button>
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Atualizar</button>

                </div>
            </div>
        </form>
        <script>
            function mostrarSenha(input, button) {
                if (input.type == "text") {
                    input.type = "password"
                    button.innerHTML = "Mostrar"
                } else if (input.type == "password") {
                    input.type = "text"
                    button.innerHTML = "Esconde"
                }
            }
        </script>

        <form action="<?php echo VENDOR_PATH; ?>painel/atualizar/cor" method="POST">
            <label for="cor">Cor favorita</label>
            <div class="input-group mb-3">
                <input type="color" name="cor" maxlength="7" class="form-control" id="cor" value="<?php echo $_SESSION["nm_cor_favorita"]; ?>">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Atualizar</button>
                </div>
            </div>
        </form>

    </div>
</div>
</div>
<script>
</script>