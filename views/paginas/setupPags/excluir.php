<h1>Excluir Mangá</h1>

<form method="POST" id="formGenero">
    <div class="input-group mb-3">
        <div class="input-group-prepend mr-2">
            <span class="input-group-text" id="basic-addon1">Mangá:</span>
        </div>
        <div class="dropdown">

            <input require type="text" placeholder="Procure o mangá" style="cursor: pointer;" class="input-group-text dropdown-toggle" name="genero" id="pesquisar_manga_ajax" data-toggle="dropdown">

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                <?php foreach ($AllGeneros as $key => $value) : ?>
                    <label style="cursor: pointer; color: black" class="dropdown-item">
                        <?php echo $AllGeneros[$key]['nm_genero'] ?>
                        <input style="color: black" type="radio" name="manga">
                    </label>

                <?php endforeach; ?>

            </div>
 
        </div>
        <input type="submit" class="form-control ml-2 btn-danger" style="max-width: 10rem; border-radius:5px;" name="botao_submit" id="btnGenero" value="Excluir manga">

    </div>
    <script>
        window.addEventListener("load", function() {
            $(document).on('click', '.dropdown-item', function(event) {
                event.stopPropagation();
            });
            

        })
    </script>
</form>