<h1>Excluir Mangá</h1>

<form method="POST" action="excluirManga" autocomplete="off" id="formGenero">
    <div class="input-group mb-3">
        <div class="input-group-prepend mr-2">
            <span class="input-group-text" id="basic-addon1">Mangá:</span>
        </div>
        <div class="dropdown">

            <input type="text" placeholder="Procure o mangá" style="cursor: pointer;" class="input-group-text dropdown-toggle" id="pesquisar_manga_ajax" data-toggle="dropdown">

            <div class="dropdown-menu" id='dropExclui' aria-labelledby="dropdownMenuButton">

            </div>

        </div>
        <input type="submit"  class="form-control ml-2 btn-danger" style="max-width: 10rem; border-radius:5px;" name="botao_submit" id="btnGenero" value="Excluir manga">

    </div>
    <div id="ajax_resultado"></div>
    <script>
        window.addEventListener("load", function() {
            $("#pesquisar_manga_ajax").keyup(function() {
                document.querySelector('#dropExclui').classList.add("show")
                
                console.log("foi");
                dropdownMenu = document.querySelector("#dropExclui");
                $.ajax({
                    dataType: "json",
                    url: DEFAULT_PATH + "home/procurarManga",
                    data: {
                        manga: _("pesquisar_manga_ajax").value.trim()
                    },
                    method: "POST",
                    success: function(dados, string, obg) {
                        console.log(dados)
                        dropdownMenu.innerHTML = ""
                        dados.forEach(manga => {
                            console.log(manga)
                            dropdownMenu.innerHTML += "<label style='cursor: pointer; color: black' class='dropdown-item'> "+manga['nm_manga'] + "<input style='color: black' type='radio' value='" + manga['id_manga'] + "' name='manga' required>";
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