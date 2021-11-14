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
                    _("modal-footer").innerHTML = "<input onclick='submitForm();' type='button' class='btn btn-primary mx-auto darkmode-ignore ' value='Recortar '>"
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
    /* cria classe com js */
function createCSSSelector(selector, style) {
    if (!document.styleSheets) return;
    if (document.getElementsByTagName('head').length == 0) return;

    var styleSheet, mediaType;

    if (document.styleSheets.length > 0) {
        for (var i = 0, l = document.styleSheets.length; i < l; i++) {
            if (document.styleSheets[i].disabled)
                continue;
            var media = document.styleSheets[i].media;
            mediaType = typeof media;

            if (mediaType === 'string') {
                if (media === '' || (media.indexOf('screen') !== -1)) {
                    styleSheet = document.styleSheets[i];
                }
            } else if (mediaType == 'object') {
                if (media.mediaText === '' || (media.mediaText.indexOf('screen') !== -1)) {
                    styleSheet = document.styleSheets[i];
                }
            }

            if (typeof styleSheet !== 'undefined')
                break;
        }
    }

    if (typeof styleSheet === 'undefined') {
        var styleSheetElement = document.createElement('style');
        styleSheetElement.type = 'text/css';
        document.getElementsByTagName('head')[0].appendChild(styleSheetElement);

        for (i = 0; i < document.styleSheets.length; i++) {
            if (document.styleSheets[i].disabled) {
                continue;
            }
            styleSheet = document.styleSheets[i];
        }

        mediaType = typeof styleSheet.media;
    }

    if (mediaType === 'string') {
        for (var i = 0, l = styleSheet.rules.length; i < l; i++) {
            if (styleSheet.rules[i].selectorText && styleSheet.rules[i].selectorText.toLowerCase() == selector.toLowerCase()) {
                styleSheet.rules[i].style.cssText = style;
                return;
            }
        }
        styleSheet.addRule(selector, style);
    } else if (mediaType === 'object') {
        var styleSheetLength = (styleSheet.cssRules) ? styleSheet.cssRules.length : 0;
        for (var i = 0; i < styleSheetLength; i++) {
            if (styleSheet.cssRules[i].selectorText && styleSheet.cssRules[i].selectorText.toLowerCase() == selector.toLowerCase()) {
                styleSheet.cssRules[i].style.cssText = style;
                return;
            }
        }
        styleSheet.insertRule(selector + '{' + style + '}', styleSheetLength);
    }
}
if (darkmode.isActivated()) {
    _("myonoffswitch").checked = true;
    createCSSSelector("body::-webkit-scrollbar", "background-color: #000 !important;")
}

function hexToComplimentary(hex) {

    // Convert hex to rgb
    // Credit to Denis http://stackoverflow.com/a/36253499/4939630
    var rgb = 'rgb(' + (hex = hex.replace('#', '')).match(new RegExp('(.{' + hex.length / 3 + '})', 'g')).map(function(l) { return parseInt(hex.length % 2 ? l + l : l, 16); }).join(',') + ')';

    // Get array of RGB values
    rgb = rgb.replace(/[^\d,]/g, '').split(',');

    var r = rgb[0],
        g = rgb[1],
        b = rgb[2];

    // Convert RGB to HSL
    // Adapted from answer by 0x000f http://stackoverflow.com/a/34946092/4939630
    r /= 255.0;
    g /= 255.0;
    b /= 255.0;
    var max = Math.max(r, g, b);
    var min = Math.min(r, g, b);
    var h, s, l = (max + min) / 2.0;

    if (max == min) {
        h = s = 0; //achromatic
    } else {
        var d = max - min;
        s = (l > 0.5 ? d / (2.0 - max - min) : d / (max + min));

        if (max == r && g >= b) {
            h = 1.0472 * (g - b) / d;
        } else if (max == r && g < b) {
            h = 1.0472 * (g - b) / d + 6.2832;
        } else if (max == g) {
            h = 1.0472 * (b - r) / d + 2.0944;
        } else if (max == b) {
            h = 1.0472 * (r - g) / d + 4.1888;
        }
    }

    h = h / 6.2832 * 360.0 + 0;

    // Shift hue to opposite side of wheel and convert to [0-1] value
    h += 180;
    if (h > 360) { h -= 360; }
    h /= 360;

    // Convert h s and l values into r g and b values
    // Adapted from answer by Mohsen http://stackoverflow.com/a/9493060/4939630
    if (s === 0) {
        r = g = b = l; // achromatic
    } else {
        var hue2rgb = function hue2rgb(p, q, t) {
            if (t < 0) t += 1;
            if (t > 1) t -= 1;
            if (t < 1 / 6) return p + (q - p) * 6 * t;
            if (t < 1 / 2) return q;
            if (t < 2 / 3) return p + (q - p) * (2 / 3 - t) * 6;
            return p;
        };

        var q = l < 0.5 ? l * (1 + s) : l + s - l * s;
        var p = 2 * l - q;

        r = hue2rgb(p, q, h + 1 / 3);
        g = hue2rgb(p, q, h);
        b = hue2rgb(p, q, h - 1 / 3);
    }

    r = Math.round(r * 255);
    g = Math.round(g * 255);
    b = Math.round(b * 255);

    // Convert r b and g values to hex
    rgb = b | (g << 8) | (r << 16);
    return "#" + (0x1000000 | rgb).toString(16).substring(1);
}

function mostrarSenha(input, button) {
    if (input.type == "text") {
        input.type = "password"
        button.innerHTML = "Mostrar"
    } else if (input.type == "password") {
        input.type = "text"
        button.innerHTML = "Esconde"
    }
}