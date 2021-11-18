<style>
    @media only screen and (max-device-width: 614px) {
        .carousel-control-next {
            width: 30%;
        }
    }
    
    @media only screen and (max-device-width: 614px) {
        .carousel-control-prev {
            width: 38% !important;
        }
    }
    
    @media only screen and (max-device-width: 426px) {
        .carousel-control-prev {
            width: 50% !important;
        }
    }
</style>
<div class='modal fade' id='sucessoModal' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='TituloModalCentralizado'>Logado com
                    <font color='green'>SUCESSO</font>
                </h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>Bem vindo
                <font color='<?php echo @$_SESSION[' nm_cor_favorita ']; ?>'>
                    <?php echo @$_SESSION['nm_nickname']; ?> </font>
            </div>
        </div>
    </div>
</div>


<div class='modal fade' id='sucessoModal' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='TituloModalCentralizado'>Cadastrado com
                    <font color='green'>SUCESSO</font>
                </h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                faça login para acessar sua conta;
            </div>
        </div>
    </div>
</div>
<!----------------------------  PRIMEIRA COLUNA DE CARDS  ----------------------------------
  -->

<div class="container">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators darkmode--activated" style="bottom: -12px; margin-bottom: 0; right: 75px">
            <li data-target="#carouselExampleIndicators" class="darkmode--activated" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" class="darkmode--activated" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" class="darkmode--activated" data-slide-to="2"></li>
        </ol>
        <div class="carrousel-inner">

            <div class="carousel-item  active col-11">
                <div class="row">
                    <div class="col-lg-4 d-flex " style="padding: 0;">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo VENDOR_PATH ?>recursos\img\capas_mangas/attackontitanAntesdaqueda.png" alt="Imagem de capa do card">
                            <div class="card-body">
                                <h5 class="card-title">Título do card</h5>
                                <p class="card-text">Este é um card maior com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional. Este conteúdo é um pouco maior, para demonstração.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Atualizados 3 minutos atrás</small>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 d-flex" style="padding: 0;">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo VENDOR_PATH ?>recursos\img\capas_mangas/jujutsu.png" alt="Imagem de capa do card">
                            <div class="card-body">
                                <h5 class="card-title">Título do card</h5>
                                <p class="card-text">Este é um card com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Atualizados 3 minutos atrás</small>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 d-flex" style="padding: 0;">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo VENDOR_PATH ?>recursos\img\capas_mangas/rezero.png" alt="Imagem de capa do card">
                            <div class="card-body">
                                <h5 class="card-title">Título do card</h5>
                                <p class="card-text">Este é um card maior com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional. Este card tem o conteúdo ainda maior que o primeiro, para mostrar a altura igual, em ação.
                                </p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Atualizados 3 minutos atrás</small>
                            </div>

                        </div>
                    </div>
                </div>
            </div>




            <div class="carousel-item col-11">
                <div class="row">
                    <div class="col-lg-4 d-flex " style="padding: 0;">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo VENDOR_PATH ?>recursos\img\capas_mangas/attackontitanAntesdaqueda.png" alt="Imagem de capa do card">
                            <div class="card-body">
                                <h5 class="card-title">Título do card</h5>
                                <p class="card-text">Este é um card maior com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional. Este conteúdo é um pouco maior, para demonstração.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Atualizados 3 minutos atrás</small>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 d-flex" style="padding: 0;">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo VENDOR_PATH ?>recursos\img\capas_mangas/jujutsu.png" alt="Imagem de capa do card">
                            <div class="card-body">
                                <h5 class="card-title">Título do card</h5>
                                <p class="card-text">Este é um card com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Atualizados 3 minutos atrás</small>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 d-flex" style="padding: 0;">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo VENDOR_PATH ?>recursos\img\capas_mangas/rezero.png" alt="Imagem de capa do card">
                            <div class="card-body">
                                <h5 class="card-title">Título do card</h5>
                                <p class="card-text">Este é um card maior com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional. Este card tem o conteúdo ainda maior que o primeiro, para mostrar a altura igual, em ação.
                                </p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Atualizados 3 minutos atrás</small>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="carousel-item col-11">
                <div class="row">

                    <div class="col-lg-4 d-flex " style="padding: 0;">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo VENDOR_PATH ?>recursos\img\capas_mangas/attackontitanAntesdaqueda.png" alt="Imagem de capa do card">
                            <div class="card-body">
                                <h5 class="card-title">Título do card</h5>
                                <p class="card-text">Este é um card maior com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional. Este conteúdo é um pouco maior, para demonstração.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Atualizados 3 minutos atrás</small>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 d-flex" style="padding: 0;">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo VENDOR_PATH ?>recursos\img\capas_mangas/jujutsu.png" alt="Imagem de capa do card">
                            <div class="card-body">
                                <h5 class="card-title">Título do card</h5>
                                <p class="card-text">Este é um card com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Atualizados 3 minutos atrás</small>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 d-flex" style="padding: 0;">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo VENDOR_PATH ?>recursos\img\capas_mangas/rezero.png" alt="Imagem de capa do card">
                            <div class="card-body">
                                <h5 class="card-title">Título do card</h5>
                                <p class="card-text">Este é um card maior com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional. Este card tem o conteúdo ainda maior que o primeiro, para mostrar a altura igual, em ação.
                                </p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Atualizados 3 minutos atrás</small>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



        </div>
        <a class="carousel-control-prev" style="margin-left: -92px; width: 15%;" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
        </a>
    </div>

</div>
<Script>
    window.addEventListener("load", function() {
        console.log("carregou")
        $('.carousel').carousel({
            interval: false
        });
    })
</Script>



<!----------------------------  SEGUNDA COLUNA DE CARDS  ------------------------------------>

<div class="card-deck mt-4">

    <div class="col-lg-4 d-flex " style="padding: 0;">
        <div class="card">
            <img class="card-img-top" src="<?php echo VENDOR_PATH ?>recursos\img\capas_mangas/attackontitanAntesdaqueda.png" alt="Imagem de capa do card">
            <div class="card-body">
                <h5 class="card-title">Título do card</h5>
                <p class="card-text">Este é um card maior com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional. Este conteúdo é um pouco maior, para demonstração.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Atualizados 3 minutos atrás</small>
            </div>
        </div>

    </div>
    <div class="col-lg-4 d-flex" style="padding: 0;">
        <div class="card">
            <img class="card-img-top" src="<?php echo VENDOR_PATH ?>recursos\img\capas_mangas/jujutsu.png" alt="Imagem de capa do card">
            <div class="card-body">
                <h5 class="card-title">Título do card</h5>
                <p class="card-text">Este é um card com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Atualizados 3 minutos atrás</small>
            </div>
        </div>

    </div>
    <div class="col-lg-4 d-flex" style="padding: 0;">
        <div class="card">
            <img class="card-img-top" src="<?php echo VENDOR_PATH ?>recursos\img\capas_mangas/rezero.png" alt="Imagem de capa do card">
            <div class="card-body">
                <h5 class="card-title">Título do card</h5>
                <p class="card-text">Este é um card maior com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional. Este card tem o conteúdo ainda maior que o primeiro, para mostrar a altura igual, em ação.
                </p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Atualizados 3 minutos atrás</small>
            </div>

        </div>
    </div>
</div>