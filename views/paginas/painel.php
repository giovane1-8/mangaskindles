<div class="row card-deck mt-3">
    <center>
        <figure class="figure col">

        <label for="image" style="cursor: pointer;">
        <img src="<?php if (!empty($_SESSION['nm_caminho_foto'])) {
                            echo $_SESSION['nm_caminho_foto'];
                        } else {
                            echo VENDOR_PATH . "recursos/img/foto_usuario/default.png";
                        }
                        ?>" class="figure-img img-fluid rounded" alt="Imagem de um quadrado genérico com bordas arredondadas, em uma figure.">
        </label>
        <input class="d-none" type="file" id="image">
            
        </figure>

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