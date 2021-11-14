<div style='color: black' class='modal fade' id='err' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='TituloModalCentralizado'>Email ou Senha <font color='red'>INCORRETOS</font>
                </h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                Se não tiver um conta crie uma;
            </div>
            <div class='modal-footer'>
                <a href='<?php echo VENDOR_PATH ?>cadastrar'> <button class='btn btn-primary'>CRIAR UMA CONTA</button><a>
            </div>
        </div>
    </div>
</div>

<div class=" d-flex">
    <form class="col" method="post" action="#">
        <div class="form-group">
            <label for="exampleInputEmail1">Endereço de email ou Nickname</label>
            <input type="text" class="form-control" name="usuario" aria-describedby="emailHelp" placeholder="Seu email ou nickname" value="<?php if (isset($_SESSION["usuario"])) {
                                                                                                                                                                        echo $_SESSION["usuario"];
                                                                                                                                                                    } ?>">
            <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input type="password" name="senha" class="form-control" placeholder="Senha">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

</div>
<div class="d-flex">
    <div>
        <div class="form-group form-check mt-3">
            <p><a href="#" class="btn btn-warning">esqueceu a senha</a></p>
        </div>
        <div class="container mt-2">
            <p>
                <a href="<?php echo VENDOR_PATH ?>cadastrar" class="darkmode-ignore btn btn-dark">Click aqui para fazer cadastro</a>
            </p>
        </div>
    </div>
</div>