let menuBtn = document.getElementById("menu-btn");
let menuBox = document.getElementById("menu-box");
let dropMenu = menuBox.querySelectorAll(".drop");

menuBtn.addEventListener("click", toggleMenu);
dropMenu.forEach((el) => el.addEventListener("click", toggleSubMenu));

function toggleMenu() {
    if (menuBox.classList.contains("toggle")) {
        menuBox.style.maxHeight = 0 + "px";
        dropMenu.forEach((el) => {
            el.querySelector("ul").style.maxHeight = 0 + "px";
            el.querySelector("ul").className = "";
        });
    } else {
        menuBox.style.maxHeight = menuBox.scrollHeight + "px";
    }
    menuBox.classList.toggle("toggle");
}

function toggleSubMenu() {
    let subMenu = this.querySelector("ul");
    if (subMenu.classList.contains("toggle")) {
        subMenu.style.maxHeight = 0 + "px";
    } else {
        subMenu.style.maxHeight = subMenu.scrollHeight + "px";
    }
    subMenu.classList.toggle("toggle");
}

let CyrLat = new CyrLatConverter('body').init({
    // onClickDefault: '#default',
    cookieDuration: 0,
    usePermalinkHash: true,
    ignoreClasses: ['ignore'],
    benchmark: true
    // benchmarkEval: "document.getElementById('exctime').innerHTML = '%s%';"
});

(() => {
    let textCharacter = "cyr";
    let cirilicaBtn = document.getElementById("cirilica");
    let latinicaBtn = document.getElementById("latinica");

    if (localStorage.hasOwnProperty("text")) {
        textCharacter = localStorage.getItem("text");
    } else {
        localStorage.setItem("text", "cyr");
    }

    console.log(cirilicaBtn.classList.contains("active"));

    if (textCharacter === "cyr") {
        // CyrLat.L2C();
        cirilicaBtn.classList.contains("active") || cirilicaBtn.classList.add("active");
    } else if (textCharacter === "lat") {
        latinicaBtn.classList.contains("active") || latinicaBtn.classList.add("active");
        CyrLat.C2L();
    }


    cirilicaBtn.onclick = () => {
        localStorage.setItem("text", "cyr");
        CyrLat.L2C();
        cirilicaBtn.classList.add("active");
        latinicaBtn.classList.remove("active");
    };
    latinicaBtn.onclick = () => {
        localStorage.setItem("text", "lat");
        CyrLat.C2L();
        cirilicaBtn.classList.remove("active");
        latinicaBtn.classList.add("active");
    };


})();

