bgcolor_static();
copy_url();
article_buttons();

function bgcolor_static() {
    if(document.querySelector('main.main') || document.querySelector('main.static')) document.body.style.backgroundColor = 'white';
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

function article_buttons() {
    const article = document.getElementById('article');
    const titleparagraf = document.querySelector('div.btn-group.article .titleparagraf');
    const subtitleparagraf = document.querySelector('div.btn-group.article .subtitleparagraf');
    const paragraf = document.querySelector('div.btn-group.article .paragraf');
    const image = document.querySelector('div.btn-group.article .image');
    const list = document.querySelector('div.btn-group.article .list');
    const deleteall = document.querySelector('div.btn-group.article .delete');

    titleparagraf.addEventListener('click', function() {
        if (article.value == '') article.innerHTML = article.value + '<h1>Title</h1>\n<p class="first">Lorem ipsum</p>';
        else article.innerHTML = article.value + '\n<h1>Title</h1>\n<p class="first">Lorem ipsum</p>';
    });

    subtitleparagraf.addEventListener('click', function() {
        if (article.value == '' || article.value == null) article.innerHTML = article.value + '<h2>Sub Title</h2>\n<p class="first">Lorem ipsum</p>';
        else article.innerHTML = article.value + '\n<h2>Sub Title</h2>\n<p class="first">Lorem ipsum</p>';
    });

    paragraf.addEventListener('click', function() {
        if (article.value == '') article.innerHTML = article.value + '<p>Lorem ipsum</p>';
        else article.innerHTML = article.value + '\n<p>Lorem ipsum</p>';
    });
    
    image.addEventListener('click', function() {
        if (article.value == '') article.innerHTML = article.value + '<figure>\n\t<img src="" alt="">\n\t<a href="#">Title Image</a>\n</figure>';
        else article.innerHTML = article.value + '\n<figure>\n\t<img src="" alt="">\n\t<a href="#">Title Image</a>\n</figure>';
    });

    list.addEventListener('click', function() {
        if (article.value == '') article.innerHTML = article.value + '<ul>\n\t<li>List 1</li>\n\t<li>List 2</li>\n\t<li>List 3</li>\n</ul>';
        else article.innerHTML = article.value + '\n<ul>\n\t<li>List 1</li>\n\t<li>List 2</li>\n\t<li>List 3</li>\n</ul>';
    });
    
    deleteall.addEventListener('click', function() {
        article.innerHTML = '';
    });
}