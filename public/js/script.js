bgcolor_static();
copy_url();
// img_render();

function bgcolor_static() {
    // if(document.querySelector('main.main') || document.querySelector('main.static')) document.body.style.backgroundColor = 'white';
}

function active_link() {
    const btns = document.querySelectorAll('nav ul li a.nav-link');
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener('click', function() {
            const active = document.querySelector('nav ul li a.active');
            active.classList.remove('active');
            this.classList.add('active');
        });
    }
}


function copy_url() {
    const image_url = document.querySelectorAll('input.image_url');
    const copy_url = document.querySelectorAll('button.copy');
    for (let i = 0; i < copy_url.length; i++) {
        copy_url[i].addEventListener('click', function() {
            image_url[i].select();
            image_url[i].setSelectionRange(0, 99999);
            document.execCommand("copy");
            alert("Copied link: " + image_url[i].value);
        });
    }
}

function img_render() {
    const img_render = document.querySelector('input.img');
    img_render.replaceWith(parseHTML("<p>Hello</p>"));



}

const imgs = document.querySelectorAll('div.content-body-generate img');
for (let i = 0; i < imgs.length; i++) {
    let img = imgs[i].replaceWith(imgs[i].src.split('/')[4]);
    $(imgs[i]).replaceWith($.parseHTML('<img src="http://127.0.0.1:8000/img/post/\+img"'))
}

// var html = "<p>Goblok</p>";
// html = $.parseHTML(html);
// $('p.tolol').replaceWith(html);