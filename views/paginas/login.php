<div class="d-flex">
    <form class="col" method="post" action="#">
        <div class="form-group">
            <label for="exampleInputEmail1">Endereço de email ou Nickname</label>
            <input type="text" class="form-control" name="usuario" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu email ou nickname" value="<?php if(isset($_SESSION["nm_email"])){echo $_SESSION["nm_email"];}?>">
            <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Senha" value="<?php if(isset($_SESSION["nm_senha"])){echo $_SESSION["nm_senha"];} ?>">
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
                <a href="<?php echo VENDOR_PATH ?>cadastrar"  class="darkmode-ignore btn btn-dark">Click aqui para fazer cadastro</a>
            </p>
        </div>
    </div>
</div>