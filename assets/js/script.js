const burgers = document.querySelector(".content-container .content-left .burger-container");
const nbBurgers = document.querySelectorAll(".content-container .content-left .burger-container .burger").length;
const burgersEach = document.querySelectorAll(".content-container .content-left .burger-container .burger");
const imgContainerEL = document.querySelector(".content-container .content-right .img-container");
const imgEls = document.querySelectorAll(".content-container .content-right .img-container .img");
const lineEl = document.querySelector(".content-container .content-left .bar .line");
const pointEl = document.querySelector(".content-container .content-left .bar .line .point");
const nextEl = document.querySelector(".selectors .right");
const prevEl = document.querySelector(".selectors .left");

let transform = 0;
let transformImg = 0;
let transformBar = 0;
let selectedBurger = 0;

nextEl.addEventListener("click", next);
prevEl.addEventListener("click", prev);

function next() {
    // description
    transform += 300;
    burgersEach.forEach((burger) => {
        burger.style.transform = "translateY(-" + transform + "px)";
    });

    if (transform >= 300 * nbBurgers) {
        transform = 0;
        burgersEach.forEach((burger) => {
            burger.style.transform = "translateY(-" + transform + "px)";
        });
    }

    // image
    transformImg += imgContainerEL.offsetWidth;
    imgEls.forEach((img) => {
        img.style.transform = "translateX(-" + transformImg + "px)";
    });
    if (transformImg >= imgContainerEL.offsetWidth * nbBurgers) {
        transformImg = 0;
        imgEls.forEach((img) => {
            img.style.transform = "translateX(-" + transformImg + "px)";
        });
    }

    // line
    if(selectedBurger >= nbBurgers - 1) {
        transformBar = 0;
        selectedBurger = 0;
        pointEl.style.top = 0;
    } else {
        selectedBurger++;
        transformBar += lineEl.offsetHeight / (nbBurgers - 1);
        pointEl.style.top = transformBar + "px";
    }
}

function prev() {
    // description
    if (transform <= 0) {
        transform = 300 * nbBurgers;
        burgersEach.forEach((burger) => {
            burger.style.transform = "translateY(-" + transform + "px)";
        });
    }
    transform -= 300;
    burgersEach.forEach((burger) => {
        burger.style.transform = "translateY(-" + transform + "px)";
    });

    // image
    if (transformImg <= 0) {
        transformImg = imgContainerEL.offsetWidth * nbBurgers;
        imgEls.forEach((img) => {
            img.style.transform = "translateX(-" + transformImg + "px)";
        });
    }
    transformImg -= imgContainerEL.offsetWidth;
    imgEls.forEach((img) => {
        img.style.transform = "translateX(-" + transformImg + "px)";
    });

    // line
    if(transformBar <= 0) {
        selectedBurger = nbBurgers - 1;
        transformBar = lineEl.offsetHeight;
        pointEl.style.top = transformBar + "px";
    } else {
        selectedBurger--;
        transformBar -= lineEl.offsetHeight / (nbBurgers - 1);
        pointEl.style.top = transformBar + "px";
    }
    console.log(transformBar);
}