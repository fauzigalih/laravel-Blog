const btns = document.querySelectorAll('nav ul li a.nav-link');
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener('click', function() {
        const active = document.querySelector('nav ul li a.active');
        active.classList.remove('active');
        this.classList.add('active');
    });
}

if(document.querySelector('main.main') || document.querySelector('main.static')) document.body.style.backgroundColor = 'white';

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


