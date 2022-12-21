function resizeTextarea(id, id2) {
    var evtobj = window.event ? event : e
    var a = document.getElementById(id);
    var a2 = document.getElementById(id2);
    if (evtobj.keyCode == 13 && evtobj.shiftKey && a.style.height != '500px') {
        a.style.height = 'auto';
        a.style.height = a.scrollHeight + 'px';
        a2.style.height = 'auto';
        a2.style.height = a.scrollHeight + 'px';
    } else if (evtobj.keyCode == 8) {
        a.style.height = 'auto';
        a.style.height = a.scrollHeight + 'px';
        a2.style.height = 'auto';
        a2.style.height = a.scrollHeight + 'px';
    }

    if (a.scrollHeight == "64" && evtobj.keyCode == 8) {
        a.style.height = "auto";
        a.style.height = "32px";
        a2.style.height = 'auto';
        a2.style.height = '50px';
    }
}

function init() {
    var a = document.getElementsByTagName('textarea');
    for (var i = 0, inb = a.length; i < inb; i++) {
        if (a[i].getAttribute('data-resizable') == 'true')
            resizeTextarea(a[i].id);
    }
}

addEventListener('DOMContentLoaded', init);

function before_send() {
    var evtobj = window.event ? event : e
    if (evtobj.keyCode == 13 && !evtobj.shiftKey) {
        send();
    }
}

function send() {
    document.getElementById('perfClick').click();
}

function update() {   
    var options = { 
		method: "post"
	}
    new Ajax.Updater("chat_textarea", "pages/recup.php",options);
}