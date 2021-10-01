    </div>
    <div class="container fixed-bottom" id="footbar">
        <div class="container" id='footerconfig'>

            <div class="float-right d-flex">
                <div>
                    <div class="onoffswitch" style="bottom: -4px">
                        <input type="checkbox" onclick="darkmode.toggle();" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch">
                        <label class="onoffswitch-label dark-toggle" for="myonoffswitch">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                </div>
                <div class="ml-2">
                    <label style="cursor: pointer; color: white;" for="myonoffswitch">
                        Dark Mode
                    </label>
                </div>

            </div>
        </div>
    </div>
        <script src="<?php echo VENDOR_PATH ?>recursos/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="<?php echo VENDOR_PATH ?>recursos/js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="<?php echo VENDOR_PATH ?>recursos/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="<?php echo VENDOR_PATH ?>recursos/js/darkmode-js.min.js"></script>
        <?php if(explode("/", $_GET['url'])[0] == 'painel'){
           echo "<script src='".VENDOR_PATH ."recursos/js/jquery.Jcrop.js'></script>";
        }?>
        <script src="<?php echo VENDOR_PATH ?>recursos/js/index.js"></script>
        
    </body>

</html>