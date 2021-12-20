<?php include_once("setup.php") ?>
    <?php if (explode("/", @$_GET['url'])[0] != "painel") : ?>
      <div class="alert alert-warning mt-3 mb-3 ">
        <h4 style="color: red;" class="alert-heading">ALERTA!</h4>
        <p>Nosso site não possui nenhum tipo de conteudo pirata somos só um agregador de link como o Google.</p>
        <hr>
        <p class="mb-0">Grato a Administração.</p>
      </div>


      <div class="float-right">
        <h3>Genero</h3>
        <ul style="list-style: none">
          <?php foreach ($AllGeneros as $key => $value) : ?>

            <li><a style='color: black' href=" genero/<?php echo $AllGeneros[$key]['nm_genero'] ?> "> <?php echo $AllGeneros[$key]['nm_genero'] ?> </a></li>

          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>