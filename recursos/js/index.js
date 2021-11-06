var darkmode;
const DEFAULT_PATH = "/Site de Livros Kindle  0.0.2/"

function _(element) {
    if (document.getElementById(element))
        return document.getElementById(element);
    else
        return false;
}
const options = {
    bottom: '64px', // default: '32px'
    right: '1px', // default: '32px'
    left: '32px', // default: 'unset'
    time: '0.5s', // default: '0.3s'
    mixColor: '#fff', // default: '#fff'
    backgroundColor: '#fff', // default: '#fff'
    buttonColorDark: '#000', // default: '#100f2c'
    buttonColorLight: '#fff', // default: '#fff'
    saveInCookies: true, // default: true,
    label: '', // default: ''
    autoMatchOsTheme: false // default: true

}
darkmode = new Darkmode(options);
if (darkmode.isActivated()) {
    _("myonoffswitch").checked = true;
}



var isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
if (!isIOS) {
    /* When the user scrolls down, hide the navbar & footbar. When the user scrolls up, show the navbar & footbar */
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            _("navbar").style.top = "0";
            _("footbar").style.bottom = "0";
        } else {
            _("navbar").style.top = "-100px";
            _("footbar").style.bottom = "-68px";
        }
        prevScrollpos = currentScrollPos;
    }
}

function getCoords() {
    var api;
    $('#toCrop').Jcrop({
        minSize: [160, 160],
        aspectRatio: 1,
        bgOpacity: 0.4,
        addClass: 'jcrop-light',
        onSelect: updateCoords,
        onChange: updateCoords,
        setSelect: [0, 0, 160, 160]
    });
}

function updateCoords(c) {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
};


function submitForm() {
    if (_('arquivo').files[0]) { //Se houver um arquivo, faremos alguns testes no mesmo
        var arquivo = _('arquivo').files[0];
        if (arquivo.type != 'image/png' && arquivo.type != 'image/jpeg') {
            $('.modal_alert_painel').modal('show');
            _('result').innerHTML = 'Por favor, selecione uma imagem do tipo JPEG ou PNG';

        } else if (arquivo.size > 1024 * 2048) {
            $('.modal_alert_painel').modal('show');
            _('result').innerHTML = 'Por favor selecione uma image mo máximo 2MB de tamanho.';
        } //2MB
        else {
            var x = _('x').value;
            var y = _('y').value;
            var w = _('w').value;
            var h = _('h').value;
            var formData = new FormData();
            formData.append('arquivo', arquivo);
            formData.append('x', x);
            formData.append('y', y);
            formData.append('w', w);
            formData.append('h', h);
            if (_('imgType')) {
                var imgType = _('imgType').value;
                formData.append('imgType', imgType);
            }
            if (_('imgName')) {
                var imgName = _('imgName').value;
                formData.append('imgName', imgName);
            }


            var request = new XMLHttpRequest(true, true);
            if (_('toCrop')) {
                var includeFile = 'painel/crop';
            } else {
                var includeFile = 'painel/recebe';
            }
            request.open('POST', DEFAULT_PATH + includeFile, true);

            request.onreadystatechange = function() {
                if (request.status == 200) {
                    console.log(request)
                    _('result').innerHTML = request.responseText;
                    $('.modal_alert_painel').modal('show');
                    _("modal-footer").innerHTML = "<input onclick=' submitForm();' type='button ' class='btn btn-primary mx-auto darkmode-ignore ' value='Recortar '>"
                }
                if (_('toCrop')) {
                    _('sendButton').value = 'Recortar';
                }
            }
            $('.modal_alert_painel').modal('show');

            request.send(formData);

            _('result').innerHTML = '<img src="' + DEFAULT_PATH + 'recursos/gif/loading.gif" />';
        }
    } else {
        $('.modal_alert_painel').modal('show');
        _('result').innerHTML = 'Por favor, selecione uma imagem para ser enviada!';
    }
}
$(".modal_alert_painel").on('hidden.bs.modal', function(e) {
    _("result").innerHTML = " "
    _("modal-footer").innerHTML = " "
})