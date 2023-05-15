// noinspection JSUnresolvedVariable
const jokeUrl = "https://official-joke-api.appspot.com/random_joke";
let jokeData = {};

function getJoke() {
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === XMLHttpRequest.DONE) {
            if (request.status === 200) {
                jokeData = JSON.parse(request.responseText);
                document.getElementById("joke").textContent = jokeData.setup;
            } else {
                console.log("Error fetching joke: " + request.statusText);
            }
        }
    };
    request.open("GET", jokeUrl);
    request.send();
}

getJoke(); // call function when page loads

function fillWithJoke() {
    getJoke();
    document.getElementById("joke-punchline").textContent = "";
}

function fillWithPunchLine() {
    document.getElementById("joke-punchline").textContent = jokeData.punchline;
}



