
const app = {

    init: function() {

        const body = document.querySelector("body");
        const pencil = document.querySelector(".pencil");
        const html = document.querySelector('.html');
        const css = document.querySelector('.css');
        const js = document.querySelector('.js');
        const php = document.querySelector('.php');
        const bootstrap = document.querySelector('.bootstrap');
        const symfony = document.querySelector('.symfony');
        const sql = document.querySelector('.sql');
        const mvc = document.querySelector('.mvc');

        // Ecouteur d'évenement de déplacement de la souris
        body.addEventListener("mousemove", app.handleMouseMove);
        // Ecouteur d'évenement au click sur le crayon
        pencil.addEventListener('click', app.handleClickPencil);
        //Ecouteur d'évenement au click sur html
        html.addEventListener('click', app.handleClickHtml);
        //Ecouteur d'évenement au click sur css
        css.addEventListener('click', app.handleClickCss);
        //Ecouteur d'évenement au click sur js
        js.addEventListener('click', app.handleClickJs);
        //Ecouteur d'évenement au click sur php
        php.addEventListener('click', app.handleClickPhp);
        //Ecouteur d'évenement au click sur bootstrap
        bootstrap.addEventListener('click', app.handleClickBootstrap);
        //Ecouteur d'évenement au click sur symfony
        symfony.addEventListener('click', app.handleClickSymfony);
        //Ecouteur d'évenement au click sur sql
        sql.addEventListener('click', app.handleClickSql);
        //Ecouteur d'évenement au click sur mvc
        mvc.addEventListener('click', app.handleClickMvc);
    },

    handleMouseMove: function (event){
        const picture = document.querySelector(".picture_profil");

        let xAxis = (window.innerWidth / 2 - event.pageX) / 30;
        let yAxis = (window.innerHeight / 2 - event.pageY) / 30;
        picture.style.transform = `rotateY(`+ xAxis + `deg) rotateX(`+ yAxis + `deg)`;

    },

    handleClickPencil: function (){
        document.body.style.cursor  = " url(assets/img/pencil.svg), pointer";
    },

    handleClickHtml: function (){
        document.body.style.background = "linear-gradient(180deg, var(--lightgrey) 50%, var(--htmlbg) 50%)";
        const page = document.querySelector('div.page');
        page.style.backgroundColor = "var(--bgpage)";
        const h1 = document.querySelector('h1');
        h1.style.color = "var(--htmltitle)";
        const h2 = document.querySelector('h2');
        h2.style.color = "var(--htmltitle)";
        const h3 = document.querySelectorAll('h3');
        for (const titleh3 of h3) {
            titleh3.style.color = "var(--htmltitle)";
        }
    },

    handleClickCss: function (){
        document.body.style.background = "linear-gradient(180deg, var(--lightgrey) 50%, var(--cssbg) 50%)";
        const page = document.querySelector('div.page');
        page.style.backgroundColor = "var(--bgpage)";
        const h1 = document.querySelector('h1');
        h1.style.color = "var(--csstitle)";
        const h2 = document.querySelector('h2');
        h2.style.color = "var(--csstitle)";
        const h3 = document.querySelectorAll('h3');
        for (const titleh3 of h3) {
            titleh3.style.color = "var(--csstitle)";
        }
    },

    handleClickJs: function (){
        document.body.style.background = "linear-gradient(180deg, var(--lightgrey) 50%, var(--jsbg) 50%)";
        const page = document.querySelector('div.page');
        page.style.backgroundColor = "var(--bgpage)";
        const h1 = document.querySelector('h1');
        h1.style.color = "var(--jstitle)";
        const h2 = document.querySelector('h2');
        h2.style.color = "var(--jstitle)";
        const h3 = document.querySelectorAll('h3');
        for (const titleh3 of h3) {
            titleh3.style.color = "var(--jstitle)";
        }
    },

    handleClickPhp: function (){
        document.body.style.background = "linear-gradient(180deg, var(--lightgrey) 50%, var(--phpbg) 50%)";
        const page = document.querySelector('div.page');
        page.style.backgroundColor = "var(--bgpage)";
        const h1 = document.querySelector('h1');
        h1.style.color = "var(--phptitle)";
        const h2 = document.querySelector('h2');
        h2.style.color = "var(--phptitle)";
        const h3 = document.querySelectorAll('h3');
        for (const titleh3 of h3) {
            titleh3.style.color = "var(--phptitle)";
        }
    },

    handleClickBootstrap: function (){
        document.body.style.background = "linear-gradient(180deg, var(--lightgrey) 50%, var(--bootstrapbg) 50%)";
        const page = document.querySelector('div.page');
        page.style.backgroundColor = "var(--bgpage)";
        const h1 = document.querySelector('h1');
        h1.style.color = "var(--bootstraptitle)";
        const h2 = document.querySelector('h2');
        h2.style.color = "var(--bootstraptitle)";
        const h3 = document.querySelectorAll('h3');
        for (const titleh3 of h3) {
            titleh3.style.color = "var(--bootstraptitle)";
        }
    },

    handleClickSymfony: function (){
        document.body.style.background = "linear-gradient(180deg, var(--lightgrey) 50%, var(--symfonybg) 50%)";
        const page = document.querySelector('div.page');
        page.style.backgroundColor = "var(--bgpage)";
        const h1 = document.querySelector('h1');
        h1.style.color = "var(--symfonytitle)";
        const h2 = document.querySelector('h2');
        h2.style.color = "var(--symfonytitle)";
        const h3 = document.querySelectorAll('h3');
        for (const titleh3 of h3) {
            titleh3.style.color = "var(--symfonytitle)";
        }
    },

    handleClickSql: function (){
        document.body.style.background = "linear-gradient(180deg, var(--lightgrey) 50%, var(--sqlbg) 50%)";
        const page = document.querySelector('div.page');
        page.style.backgroundColor = "var(--bgpage)";
        const h1 = document.querySelector('h1');
        h1.style.color = "var(--sqltitle)";
        const h2 = document.querySelector('h2');
        h2.style.color = "var(--sqltitle)";
        const h3 = document.querySelectorAll('h3');
        for (const titleh3 of h3) {
            titleh3.style.color = "var(--sqltitle)";
        }
    },

    handleClickMvc: function (){
        document.body.style.background = "linear-gradient(180deg, var(--lightgrey) 50%, var(--lightgreen) 50%)";
        const page = document.querySelector('div.page');
        page.style.backgroundColor = "#d8e2de";
        const h1 = document.querySelector('h1');
        h1.style.color = "var(--green";
        const h2 = document.querySelector('h2');
        h2.style.color = "var(--green)";
        const h3 = document.querySelectorAll('h3');
        for (const titleh3 of h3) {
            titleh3.style.color = "var(--green)";
        }
    },
}

document.addEventListener('DOMContentLoaded', app.init);