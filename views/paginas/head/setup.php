<!DOCTYPE html>
<html lang='pt-br'>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title><?php echo $this->titlePage; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel='stylesheet' type='text/css' media='screen' href='<?php echo VENDOR_PATH ?>recursos/css/bootstrap.min.css'>
  <link rel="stylesheet" href="https://unpkg.com/jcrop/dist/jcrop.css">
  <link rel='stylesheet' type='text/css' media='screen' href='<?php echo VENDOR_PATH ?>recursos/css/index.css'>
  <style>
  
  </style>
</head>

<body class='bodydarktheme'>
  <div class="container pb-5">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" id="navbar" style="transition: 0.5s;">
      <a class="navbar-brand" href="<?php echo VENDOR_PATH ?>">MangasKindles</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
        <ul class="navbar-nav mr-auto nav-pills nav-fill">
          <li class="col nav-item">
            <a class="nav-link" href="#">vip</a>
          </li>
          <li class="col nav-item">
            <a class="nav-link" href="#">contato</a>
          </li>
          <?php if ($_SESSION['isLogado']) : ?>
            <li class="col nav-item">
              <a class="nav-link" style="color: <?php echo $_SESSION['nm_cor_favorita'] ?>" href="<?php echo VENDOR_PATH ?>painel"><?php echo $_SESSION['nm_nickname'] ?></a>
            </li>
            <li class="col nav-item">
              <a class="nav-link" style="color: red" href="<?php echo VENDOR_PATH ?>login/sair">Sair</a>
            </li>

          <?php else : ?>
            <li class="col nav-item">
              <a class="nav-link" href="<?php echo VENDOR_PATH ?>login">Login</a>
            </li>
            <li class="col nav-item">
              <a class="nav-link" href="<?php echo VENDOR_PATH ?>cadastrar">Cadastrar</a>
            </li>
          <?php endif; ?>

          <?php if (@$_SESSION['nm_vip'] == "gm") : ?>
            <li class="col nav-item">
              <a class="nav-link" style="color: '#fff' " href="<?php echo VENDOR_PATH ?>setup">configurações do servidor</a>
            </li>
          <?php endif; ?>

        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
      </div>
    </nav>
