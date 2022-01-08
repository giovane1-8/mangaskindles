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
        </div>
    </div>
</div>
<div class="container mb-2 mt-2 border border-dark">

    <h1>Adicionar manga</h1>
    <form id="form" autocomplete="off" enctype="multipart/form-data" method="POST">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Nome</span>
            </div>
            <input type="text" placeholder="Jujutsu Kaisen" class="form-control" name="nome_manga" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Editora</span>
            </div>
            <input type="text" placeholder="Panini" class="form-control" name="editora" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Sinopse</span>
            </div>
            <input type="text" placeholder="Apesar do estudante colegial Yuuji Itadori ter grande força física, ele se inscreve no Clube de Ocultismo. Certo dia, eles encontram um “objeto amaldiçoado” e retiram o selo, atraindo criaturas chamadas de “maldições”. Itadori corre em socorro de seus colegas, mas será que ele será capaz de abater essas criaturas usando apenas a força física?!" class="form-control" name="sinopse" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Capa</span>
            </div>
            <input type="file" placeholder="784 X 436" id="imagem_manga" accept=".png, .jpeg" class="form-control" name="imagem_manga" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend mr-2">
                <span class="input-group-text" id="basic-addon1">Generos</span>
            </div>
            <div class="dropdown">
                <input type="text" style="cursor: pointer;" class="input-group-text dropdown-toggle" id="pesquisa-dropdown" data-toggle="dropdown">
                <div class="dropdown-menu" style="max-height: 300px;overflow: auto;" aria-labelledby="dropdownMenuButton">

                    <?php foreach ($AllGeneros as $key => $value) : ?>
                        <label style="cursor: pointer; color: black;" class="dropdown-item">
                            <?php echo $AllGeneros[$key]['nm_genero'] ?>
                            <input type="checkbox" id="<?php echo $AllGeneros[$key]['nm_genero'] ?>" value="<?php echo $AllGeneros[$key]['id_genero'] ?>" name='generos[]'>
                        </label>
                    <?php endforeach; ?>

                </div>
            </div>
            <img id="imgN" class="d-none">
            <script>
                window.addEventListener("load", function() {
                    // verifica se checkbox e imagem estou corretos
                    var x, y = false

                    function verificar() {
                        return [].filter.call(inputs, function(input) {
                            return input.checked;
                        }).length;
                    }
                    $("input[name='generos[]']").on('click', function(event) {
                        event.stopPropagation();

                        var valido = verificar();
                        if (!valido) {
                            $('#err').modal('show');
                            _('result').innerHTML = '<center>Falta escolher o generos</center>'

                            y = false
                            validarBotao()

                        } else {
                            y = true
                            validarBotao()
                        }
                    });

                    function validarBotao() {
                        if (x && y) {

                            _("btnSubmit").style.display = "block";
                            _("form").action = "<?php echo VENDOR_PATH; ?>setup/addmanga";
                        } else {

                            _("btnSubmit").style.display = "none";
                            _("form").action = "";
                        }
                    }

                    _("imagem_manga").addEventListener("change", function() {
                        if (this.files && this.files[0]) {
                            var file = new FileReader();
                            file.onload = function(e) {
                                img = _("imgN");
                                img.src = e.target.result;
                                setTimeout(() => {
                                    if (img.naturalHeight != 436 || img.naturalWidth != 784) {
                                        $('#err').modal('show');
                                        _('result').innerHTML = '<center> A imagem deve ter 436 X 784 pixels</center>';

                                        x = false
                                        validarBotao()

                                    } else {
                                        x = true
                                        validarBotao()
                                    }
                                }, 500);
                            };
                            file.readAsDataURL(this.files[0]);
                        }
                    }, false);


                    var inputs = document.querySelectorAll("input[name='generos[]']");


                    //nÃO DEIXA DROPDOWN SUMIR QUANDO SELECIONA UM CHECKBOX
                    $(document).on('click', '.dropdown-item', function(event) {
                        event.stopPropagation();
                    });

                    // PESQUISA PARA DROPDOWN
                    $("#pesquisa-dropdown").keyup(function() {
                        var options = $("label[class='dropdown-item']")
                        options.each(function(index, element) {
                            elementoText = element.innerText.normalize('NFD').replace(/[\u0300-\u036f]/g, "").toLowerCase().trim()
                            pesquisa = $("#pesquisa-dropdown").val().normalize('NFD').replace(/[\u0300-\u036f]/g, "").toLowerCase().trim()
                            if (elementoText.match(pesquisa)) {
                                element.style.display = "block";
                            } else {
                                element.style.display = "none";
                            }
                        });
                    })
                    $("#pesquisa-dropdown-genero").keyup(function() {
                        var options = $("p[class='dropdown-item']")
                        options.each(function(index, element) {
                            elementoText = element.innerText.normalize('NFD').replace(/[\u0300-\u036f]/g, "").toLowerCase().trim()
                            pesquisa = $("#pesquisa-dropdown-genero").val().normalize('NFD').replace(/[\u0300-\u036f]/g, "").toLowerCase().trim()
                            if (elementoText.match(pesquisa)) {
                                element.style.display = "block";
                            } else {
                                element.style.display = "none";
                            }
                            if (pesquisa != "") {
                                _("btnGenero").style.display = "block";
                                _("formGenero").action = "<?php echo VENDOR_PATH; ?>setup/addgenero"
                            } else {
                                _("btnGenero").style.display = "none";
                                _("formGenero").action = ""
                            }
                        });
                    })
                })
            </script>
        </div>
        <div class="input-group">
            <input type="submit" class="form-control" name="botao_submit" id="btnSubmit" value="Adicionar manga" style="display: none;">
        </div>


    </form>
</div>
<div class="container mb-2 border border-dark">

    <h1>Adicionar volume de manga</h1>

    <form id="formVolume" autocomplete="off" enctype="multipart/form-data" method="POST">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Nome</span>
            </div>
            <input type="text" placeholder="Trevas Cegantes" class="form-control" name="nome_volume" required>
        </div>


        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Data de lançamento</span>
            </div>
            <input type="date" id="data_lancamento" class="form-control" name="data_lancamento" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Capa</span>
            </div>
            <input type="file" placeholder="784 X 436" id="imagem_volume" accept=".png, .jpeg" class="form-control" name="imagem_volume" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend mr-2">
                <span class="input-group-text" id="basic-addon1">Mangá</span>
            </div>
            <div class="dropdown">

                <input type="text" placeholder="Procure o mangá" style="cursor: pointer;" class="input-group-text dropdown-toggle" id="pesquisar_manga_id_ajax" data-toggle="dropdown">

                <div class="dropdown-menu" id='dropExclui' aria-labelledby="dropdownMenuButton">

                </div>

            </div>

        </div>
        <script>
            window.addEventListener("load", function() {
                var a, b = false

                function validarBotaoVolume() {
                    if (a) {

                        _("btnVolume").style.display = "block";
                        _("formVolume").action = "<?php echo VENDOR_PATH; ?>setup/addVolume";
                    } else {

                        _("btnVolume").style.display = "none";
                        _("formVolume").action = "";
                    }
                }

                _("imagem_volume").addEventListener("change", function() {
                    if (this.files && this.files[0]) {
                        var file = new FileReader();
                        file.onload = function(e) {
                            img = _("imgN");
                            img.src = e.target.result;
                            setTimeout(() => {
                                if (img.naturalHeight != 436 || img.naturalWidth != 784) {
                                    $('#err').modal('show');
                                    _('result').innerHTML = '<center> A imagem deve ter 436 X 784 pixels</center>';

                                    a = false
                                    validarBotaoVolume()

                                } else {
                                    a = true
                                    validarBotaoVolume()
                                }
                            }, 500);
                        };
                        file.readAsDataURL(this.files[0]);
                    }
                }, false);


                $(document).on('click', '.dropdown-item', function(event) {
                    event.stopPropagation();
                });
                $("#pesquisar_manga_id_ajax").keyup(function() {

                    document.querySelector('#dropExclui').classList.add("show");

                    dropdownMenu = document.querySelector("#dropExclui");
                    $.ajax({
                        dataType: "json",
                        url: DEFAULT_PATH + "home/procurarManga",
                        data: {
                            manga: _("pesquisar_manga_id_ajax").value.trim()
                        },
                        method: "POST",
                        success: function(dados, string, obg) {
                            dropdownMenu.innerHTML = ""
                            dados.forEach(manga => {
                                dropdownMenu.innerHTML += "<label style='cursor: pointer; color: black' class='dropdown-item'> " + manga['nm_manga'] + "<input style='color: black' type='radio' value='" + manga['id_manga'] + "' name='manga' required>";
                                dropdownMenu.innerHTML += "</label>";
                            });
                            $(document).on('click', '.dropdown-item', function(event) {
                                event.stopPropagation();
                            });
                        },
                        error: function(obg, erro, op) {
                            console.log(erro)
                        },
                        complete: function(obg, msn) {

                        }
                    })
                })
            })
        </script>

        <div class="input-group">
            <input type="submit" class="form-control" name="botao_submit" id="btnVolume" value="Adicionar Volume" style="display: none;">
        </div>
    </form>



</div>
<div class="container mb-2 border border-dark">
    <h1>Adicionar Genero</h1>
    <form method="POST" id="formGenero" action="" autocomplete="off">
        <div class="input-group mb-3">
            <div class="input-group-prepend mr-2">
                <span class="input-group-text" id="basic-addon1">Generos</span>
            </div>
            <div class="dropdown">

                <input require type="text" style="cursor: pointer;" class="input-group-text dropdown-toggle" name="genero" id="pesquisa-dropdown-genero" data-toggle="dropdown" require>

                <div class="dropdown-menu" style="max-height: 300px;  overflow: auto;" aria-labelledby="dropdownMenuButton">

                    <?php foreach ($AllGeneros as $key => $value) : ?>
                        <p class="dropdown-item"><?php echo $AllGeneros[$key]['nm_genero'] ?></p>

                    <?php endforeach; ?>

                </div>

            </div>

        </div>

        <div class="input-group">
            <input type="submit" class="form-control" name="botao_submit" id="btnGenero" value="Adicionar Genero" style="display: none;">
        </div>
    </form>
</div>