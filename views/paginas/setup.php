<div style='color: black' class='modal fade' id='err' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='TituloModalCentralizado'>
                    <font color='red'>Erro</font>
                </h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                Erro ao enviar os dados, tente novamente
            </div>
        </div>
    </div>
</div>
<h1>Adicionar manga</h1>
<form id="form" enctype="multipart/form-data" method="POST">
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
        <input type="file" accept=".png, .jpeg" class="form-control" name="imagem_manga" required>
    </div>

    <div class="input-group">
        <div class="input-group-prepend mr-2">
            <span class="input-group-text" id="basic-addon1">Generos</span>
        </div>
        <div class="dropdown">
            <input type="text" style="cursor: pointer;" class="input-group-text dropdown-toggle" id="pesquisa-dropdown" data-toggle="dropdown">
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                <?php foreach ($AllGeneros as $key => $value) : ?>
                    <label style="cursor: pointer; color: black;" class="dropdown-item">
                        <?php echo $AllGeneros[$key]['nm_genero'] ?>
                        <input type="checkbox" id="<?php echo $AllGeneros[$key]['nm_genero'] ?>" value="<?php echo $AllGeneros[$key]['id_genero'] ?>" name='generos[]'>
                    </label>
                <?php endforeach; ?>

            </div>
        </div>
        <script>
            window.addEventListener("load", function() {



                var inputs = document.querySelectorAll("input[name='generos[]']");

                function verificar() {
                    return [].filter.call(inputs, function(input) {
                        return input.checked;
                    }).length;
                }
                $("input[name='generos[]']").on('click', function(event) {
                    event.stopPropagation();

                    var valido = verificar();
                    if (!valido) {
                        alert('Falta escolher uma checkbox!');
                        _("btnSubmit").style.display = "none";
                        _("form").action = "";
                    } else {
                        _("btnSubmit").style.display = "block";
                        _("form").action = "<?php echo VENDOR_PATH; ?>setup/addmanga";
                    }
                });

                $(document).on('click', '.dropdown-item', function(event) {
                    event.stopPropagation();
                });
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
            })
        </script>
    </div>
    <div class="input-group mb-3">
        <input type="submit" class="form-control" name="botao_submit" id="btnSubmit" value="Adicionar manga" style="display: none;">
    </div>


</form>

<h1>Adicionar capitulo de manga</h1>