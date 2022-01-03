<h1>Excluir Mangá</h1>

<form method="POST" action="<?php echo VENDOR_PATH; ?>setup/excluir/manga" autocomplete="off">
    <div class="input-group mb-3">
        <div class="input-group-prepend mr-2">
            <span class="input-group-text" id="basic-addon1">Mangá:</span>
        </div>
        <div class="dropdown">

            <input type="text" placeholder="Procure o mangá" style="cursor: pointer;" class="input-group-text dropdown-toggle" id="pesquisar_manga_ajax" data-toggle="dropdown">

            <div class="dropdown-menu" id='dropExclui' aria-labelledby="dropdownMenuButton">

            </div>

        </div>
        <input type="submit" class="form-control ml-2 btn-danger" style="max-width: 10rem; border-radius:5px;" name="botao_submit" value="Excluir manga">

    </div>
    <div id="ajax_resultado"></div>
    <script>
        window.addEventListener("load", function() {
            $(document).on('click', '.dropdown-item', function(event) {
                    event.stopPropagation();
                });
            $("#pesquisar_manga_ajax").keyup(function(){

                document.querySelector('#dropExclui').classList.add("show");

                dropdownMenu = document.querySelector("#dropExclui");
                $.ajax({
                    dataType: "json",
                    url: DEFAULT_PATH + "home/procurarManga",
                    data: {
                        manga: _("pesquisar_manga_ajax").value.trim()
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
</form>
<h1>Excluir Genero</h1>
<form method="POST" action="<?php echo VENDOR_PATH; ?>setup/excluir/genero" autocomplete="off">
    <div class="input-group mb-3">
        <div class="input-group-prepend mr-2">
            <span class="input-group-text" id="basic-addon1">Generos</span>
        </div>
        <div class="dropdown">

            <input require type="text" style="cursor: pointer;" class="input-group-text dropdown-toggle" id="pesquisa-dropdown-genero" data-toggle="dropdown">

            <div class="dropdown-menu" style="max-height: 300px;  overflow: auto;" aria-labelledby="dropdownMenuButton">

                <?php foreach ($AllGeneros as $key => $value) : ?>
                    <label class="dropdown-item" style="cursor: pointer; color: black;">
                    <?php echo $AllGeneros[$key]['nm_genero'] ?> <input type="radio" name="genero" value="<?php echo $AllGeneros[$key]['id_genero'] ?>"> 
                    </label>
                <?php endforeach; ?>

            </div>

        </div>
        <input type="submit" class="form-control ml-2 btn-danger" style="max-width: 10rem; border-radius:5px;" name="botao_submit" value="Excluir Genero">

    </div>
    

</form>
<script>
    window.addEventListener("load", function() {
        $("#pesquisa-dropdown-genero").keyup(function() {
            var options = $("label[class='dropdown-item']")
            options.each(function(index, element) {
                elementoText = element.innerText.normalize('NFD').replace(/[\u0300-\u036f]/g, "").toLowerCase().trim()
                pesquisa = $("#pesquisa-dropdown-genero").val().normalize('NFD').replace(/[\u0300-\u036f]/g, "").toLowerCase().trim()
                if (elementoText.match(pesquisa)) {
                    element.style.display = "block";
                } else {
                    element.style.display = "none";
                }
               
            });
        })
    })
</script>