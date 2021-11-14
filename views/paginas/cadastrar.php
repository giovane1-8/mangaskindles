<div class='modal fade' id='err' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='TituloModalCentralizado'>ERRO DE CADASTRO</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                <font color='red'>Preencha todos os dados corretamente</font>;
            </div>
            <div class='modal-footer'>
                <a href='" . VENDOR_PATH . "login/recuperarsenha'> <button class='btn btn-primary'>RECUPERAR SENHA</button><a>
                        <a href='<?php echo VENDOR_PATH ?>login'> <button class='btn btn-primary'>Fazer Login</button><a>
            </div>
        </div>
    </div>
</div>

<div class='modal fade' id='nicknameerr' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='TituloModalCentralizado'>NICKNAME EM USO</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                Use outro apelido ou recupere a senha
            </div>
            <div class='modal-footer'>
                <a href='<?php echo VENDOR_PATH ?>login/recuperarsenha'> <button class='btn btn-primary'>RECUPERAR SENHA</button><a>
                        <a href='<?php echo VENDOR_PATH ?>login'> <button class='btn btn-primary'>Fazer Login</button><a>
            </div>
        </div>
    </div>
</div>




<div class='modal fade' id='ExemploModalCentralizado' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='TituloModalCentralizado'>EMAIL EM USO</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                Use outro email ou recupere a senha
            </div>
            <div class='modal-footer'>
                <a href='<?php echo VENDOR_PATH ?>login/recuperarsenha'> <button class='btn btn-primary'>RECUPERAR SENHA</button><a>
                        <a href='<?php echo VENDOR_PATH ?>login'> <button class='btn btn-primary'>Fazer Login</button><a>
            </div>
        </div>
    </div>
</div>

<div class="d-flex">
    <form class="col" method="post" action="#">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="nome">Nome e sobrenome</label>
                <input type="text" class="form-control" maxlength="45" name="nome" id="nome" aria-describedby="emailHelp" placeholder="Seu nome" value="<?php if (isset($_SESSION["nm_usuario"])) {
                                                                                                                                                echo $_SESSION["nm_usuario"];
                                                                                                                                            } ?>" required>
            </div>
            <div class="form-group col-sm-6">

                <label for="nickname">Nickname</label>
                <input type="text" maxlength="20" class="form-control" name="nickname" id="nickname" aria-describedby="emailHelp" placeholder="Ex: Starkiller889" value="<?php if (isset($_SESSION["nm_nickname"])) {
                                                                                                                                                                echo $_SESSION["nm_nickname"];
                                                                                                                                                            } ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" maxlength="45" name="email" id="email" aria-describedby="emailHelp" placeholder="Seu email" value="<?php if (isset($_SESSION["nm_email"])) {
                                                                                                                                                echo $_SESSION["nm_email"];
                                                                                                                                            } ?>" required>
            <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
        </div>

        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" maxlength='45' name="senha" class="form-control" id="senha" placeholder="Senha" value="<?php if (isset($_SESSION["nm_senha"])) {
                                                                                                                echo $_SESSION["nm_senha"];
                                                                                                            } ?>" required>
        </div>
        <div class="form-group">
            <label for="cor">Cor favorita</label>
            <input type="color" name="cor" maxlength="7" class="form-control" id="cor" placeholder="Senha" value="<?php if (isset($_SESSION["nm_cor_favorita"])) {
                                                                                                        echo $_SESSION["nm_cor_favorita"];
                                                                                                    } else {
                                                                                                        echo "#fff";
                                                                                                    } ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href=" <?php echo VENDOR_PATH ?>login" class="darkmode-ignore btn btn-dark">Click aqui se ja tiver um login</a>

    </form>
</div>