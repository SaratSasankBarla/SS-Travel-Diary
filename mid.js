
const elements = document.querySelectorAll('.highlight');
elements.forEach(element => {
    const width = element.getBoundingClientRect().width;
    element.style.width = `${width + 10}px`;
});

setTimeout(function () {
    const elements = document.querySelectorAll('.highlight');
    elements.forEach(element => {
        const width = element.getBoundingClientRect().width;
        element.style.width = `0px`;
    });
}, 1000);


const title = document.querySelector('.title');
const menu = document.querySelector('.menu');

window.addEventListener('scroll', () => {
    const scrollTop = window.scrollY;
    if (scrollTop > 390) {
        title.style.right = '42%'; 
        menu.style.opacity = 1;
    } else {
        title.style.right = scrollTop * 1.25 + 'px';
        menu.style.opacity = scrollTop / 400;
    }
});

const sidebar = document.querySelector('.sidebar');
const playSpace = document.querySelector('.playSpace');
const arrow = document.querySelector('.arrow');

function menuAppear(event) {
    console.log("inside menuAppear");
    sidebar.style.width = (sidebar.style.width === "35%") ? "0%" : "35%";
    playSpace.style.width = (playSpace.style.width === "65%") ? "100%" : "65%";
    arrow.style.transform = (arrow.style.transform === "rotate(-270deg)") ? "rotate(-90deg)" : "rotate(-270deg)";
}



function videourl(videos) {
    document.getElementById("slider").src = videos;
}

function texting(text) {
    document.getElementById("txt").innerHTML = text;
}

document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.cards');

    cards.forEach(card => {
        card.addEventListener('click', function () {
            cards.forEach(c => c.classList.remove('selected'));
            card.classList.add('selected');
        });
    });
});


function createCard(){
    console.log("Inside createCard");
    var newCard = document.createElement('div');
    newCard.className = 'cards';

    var newContent = document.createElement('div');
    newContent.className = 'content';

    var newPlace = document.createElement('p');
    newPlace.className = 'place';
    newPlaceText = document.createTextNode('New Place');
    newPlace.appendChild(newPlaceText);
    newContent.appendChild(newPlace);

    var newImage = document.createElement('div');
    newImage.className = 'image';
    newImage.src = "#";

    newCard.appendChild(newContent);
    newCard.appendChild(newImage);

    var existingCard = document.querySelector('.sidebar');
    var lastButOneElement = existingCard.children[existingCard.children.length - 1];
    existingCard.insertBefore(newCard, lastButOneElement);

}

function submitQuery(event){
    console.log("Inside submit query");
    const submit = document.querySelector('.submit');
    var feedback = document.querySelector('.feedback');
    feedback.textContent = "Your Query is submitted !!!" ;
}

