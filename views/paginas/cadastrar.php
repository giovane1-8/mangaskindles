<div class="d-flex">
    <form class="col" method="post" action="#">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="nome">Nome e sobrenome</label>
                <input type="text" class="form-control" name="nome" id="nome" aria-describedby="emailHelp" placeholder="Seu nome" value="<?php if(isset($_SESSION["nm_nome"])){echo $_SESSION["nm_nome"];}?>">
            </div>
            <div class="form-group col-sm-6">

                <label for="nickname">Nickname</label>
                <input type="text" class="form-control" name="nickname" id="nickname" aria-describedby="emailHelp" placeholder="Ex: Starkiller889" value="<?php if(isset($_SESSION["nm_nickname"])){echo $_SESSION["nm_nickname"];}?>">
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Seu email" value="<?php if(isset($_SESSION["nm_email"])){echo $_SESSION["nm_email"];} ?>">
            <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
        </div>

        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha" value="<?php if(isset($_SESSION["nm_senha"])){echo $_SESSION["nm_senha"];} ?>">
        </div>
        <div class="form-group">
            <label for="cor">Cor favorita</label>
            <input type="color" name="cor" class="form-control" id="cor" placeholder="Senha" value="<?php if(isset($_SESSION["nm_cor_favorita"])){echo $_SESSION["nm_cor_favorita"];}else{echo "#fff";} ?>">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href=" <?php echo VENDOR_PATH ?>login" class="darkmode-ignore btn btn-dark">Click aqui se ja tiver um login</a>

    </form>
</div>
