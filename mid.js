// Sarat Sasank's Animation

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
    //console.log("scrolling: ", scrollTop);
    if (scrollTop > 370) {
        title.style.right = '40%';
        menu.style.opacity = 1;
    } else {
        title.style.right = scrollTop * 1.5 + 'px';
        menu.style.opacity = scrollTop / 400;
    }
});


// Side Bar Animation

const sidebar = document.querySelector('.sidebar');
const playSpace = document.querySelector('.playSpace');
const arrow = document.querySelector('.arrow');


function menuAppear(event) {
    console.log("inside menuAppear");
    sidebar.style.width = (sidebar.style.width === "35%") ? "0%" : "35%";
    playSpace.style.width = (playSpace.style.width === "65%") ? "100%" : "65%";
    arrow.style.transform = (arrow.style.transform === "rotate(-270deg)") ? "rotate(-90deg)" : "rotate(-270deg)";
}

// Profile Animation

const bio = document.querySelector('.bio');

function profileOpen(event) {
    console.log("inside profile open");
    bio.style.width = (bio.style.width === "auto") ? "0%" : "auto";
}


// Play Sceen navigations

function videourl(videos) {
    document.getElementById("slider").src = videos;
}

function texting(text) {
    document.getElementById("txt").innerHTML = text;
}

// Selecting and deselecting cards

document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.cards');

    cards.forEach(card => {
        card.addEventListener('click', function () {
            cards.forEach(c => c.classList.remove('selected'));
            card.classList.add('selected');
        });
    });
});

// New Card Creation

function createCard() {
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


// Ask Me functionality

function submitQuery(event) {
    console.log("Inside submit query");
    const submit = document.querySelector('.submit');
    var feedback = document.querySelector('.feedback');
    feedback.textContent = "Your Query is submitted !!!";
}

// Data Retrieval (ABOUT section)

async function cardFunction(title_name, event) {
    console.log("Clicked for description change");

    const place = document.querySelector('.place');
    event.preventDefault();
    console.log("Fetching content for: " + title_name);
    console.log("inside get_text");

    try {
        const req = await fetch(`http://localhost:8888/final/final.php?title_name=${encodeURIComponent(title_name)}`);
        const res = await req.json();
        let placeData = res[0];
        console.log("Parsed res: ", res);
        console.log("description: ", placeData.description);

        let description = document.querySelector('.description');
        description.textContent = placeData.description;

        let ac1 = document.querySelector('.ac1');
        let ac2 = document.querySelector('.ac2');
        let ac3 = document.querySelector('.ac3');

        ac1.style.background = `url(${placeData.image1}) center center / cover no-repeat`;
        ac2.style.background = `url(${placeData.image2}) center center / cover no-repeat`;
        ac3.style.background = `url(${placeData.image3}) center center / cover no-repeat`;

        console.log("Sneal Peak: ", placeData.sneakpeak);
        let parallax = document.querySelector('.parallax-1');
        parallax.style.background = `url(${placeData.sneakpeak}) center center / cover no-repeat`;
        parallax.style.backgroundAttachment = 'fixed';


    } catch (error) {
        console.error('Error fetching data:', error);
    }
}


// Dynamic sidebar data from the DB


async function fetchData() {
    try {
        const response = await fetch(`http://localhost:8888/final/sidebar.php?title_name=${encodeURIComponent(username)}`);
        const data = await response.json();
        console.log("Data is: ", data);
        return data;
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}

// Function to dynamically create and append <li> elements

async function createCards() {
    console.log("inside create cards");
    const sidebar = document.querySelector('.sidebar');
    const data = await fetchData();

    data.forEach(place => {
        const li = document.createElement('li');
        li.classList.add('cards');
        li.addEventListener('click', () => cardFunction(place.place_name, event));

        const content = document.createElement('div');
        content.classList.add('content');

        const placeName = document.createElement('p');
        placeName.classList.add('place');
        placeName.textContent = place.place_name;

        const desc = document.createElement('p');
        desc.classList.add('desc');


        content.appendChild(placeName);
        content.appendChild(desc);

        const image = document.createElement('div');
        image.classList.add('image');
        image.style.background = `url('${place.place_image}') center center/ cover no-repeat`; // Assuming place.image contains the image URL

        li.appendChild(content);
        li.appendChild(image);

        sidebar.appendChild(li);
    });

    // Create the "ADD MORE" button <li> element

    const addMoreLi = document.createElement('li');
    const addButton = document.createElement('button');
    addButton.classList.add('addmore');
    addButton.textContent = 'ADD PLACES';
    addButton.onclick = newCard;
    addMoreLi.appendChild(addButton);


    sidebar.appendChild(addMoreLi);
}


createCards();


function newCard() {
    console.log("inside addmore functionality");
    const newcard = document.querySelector('.newcard');
    newcard.style.visibility = (newcard.style.visibility === "visible") ? "hidden" : "visible";
}


async function fetchStatsData() {
    try {
        console.log("Fetching data...");
        console.log("sending username inside stats :")
        const response2 = await fetch(`http://localhost:8888/final/stats.php?title_name=${encodeURIComponent('sarat')}`);
        console.log("Response received:", response2);
        const stats = await response2.json();
        console.log("Stats is: ", stats);
        //console.log("user is: ",user);
        return stats;
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}

createBarChart()

let myBarChart;
async function createBarChart() {
    console.log("Inside Create Bar Chart");
    const user = await fetchStatsData();
    // Extract labels and days from the fetched data
    const labels = Object.keys(user[0][0]).filter(key => key !== 's_no');
    const days = user[0].map(item => item['place_name']); // Assuming 'dates' is a unique identifier for each day

    console.log("Labels are: ", labels);
    //console.log("Days are: ", days);

    const dataFromDatabase = user[0].map(item => parseFloat(item['expenditure']));
    console.log("dataFromDatabase is: ", dataFromDatabase);

    // Extract values from the object
    const values = Object.values(dataFromDatabase);

    // Calculate the maximum and minimum values
    const maxValue = Math.max(...values);
    const minValue = Math.min(...values);

    console.log("BarChart - max: ",maxValue);
    console.log("BarChart - min: ",minValue);

    // Display dataFromDatabase in the console

    const barChart = document.getElementById('barChart');
    const barInfo = document.getElementById('barInfo');

    barInfo.textContent = `Max: $${maxValue} | Min: $${minValue}`;


    if (myBarChart) {
        myBarChart.destroy();
    }


    myBarChart = new Chart(barChart, {
        type: 'bar',
        data: {
            labels: days,
            datasets: [{
                data: Object.values(dataFromDatabase),
                backgroundColor: ['#673AB7', '#3F51B5', '#9C27B0', '#2196F3', '#FF9800', '#607D8B'],
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    ticks: {
                        color: 'white' // Set x-axis text color to white
                    }
                },
                y: {
                    ticks: {
                        color: 'white' // Set y-axis text color to white
                    }
                }
            },
            plugins: {
                legend: {
                    display: false,
                    labels: {
                        color: 'white' // Set legend text color to white
                    }
                }
            }
        }
    });


}


