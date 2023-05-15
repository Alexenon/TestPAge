const slider = document.querySelector("#slider");
const slides = slider.querySelectorAll(".slide");
let index = 0;

function showNext() {
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    index++;

    if (index >= slides.length) {
        index = 0;
    }

    slides[index].style.display = "block";
}

showNext();
setInterval(showNext, 3000);