var darkmode;
$(window).ready(function() {

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
        document.getElementById("myonoffswitch").checked = true;
    }



    var isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
    if (!isIOS) {
        /* When the user scrolls down, hide the navbar & footbar. When the user scrolls up, show the navbar & footbar */
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navbar").style.top = "0";
                document.getElementById("footbar").style.bottom = "0";
            } else {
                document.getElementById("navbar").style.top = "-100px";
                document.getElementById("footbar").style.bottom = "-68px";
            }
            prevScrollpos = currentScrollPos;
        }
    }

})