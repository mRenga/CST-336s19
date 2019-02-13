var randNum = Math.floor(Math.random() * 99) + 1;
var guesses = document.querySelector('#guesses');
var lastResult = document.querySelector('#lastResult');
var lowOrHi = document.querySelector('#lowOrHi');
var gamesWon = document.querySelector('#gamesWon');
var gamesLost = document.querySelector('#gamesLost');
var guessSubmit = document.querySelector('.guessSubmit');
var guessField = document.querySelector('.guessField');

var guessCount = 1;
var numWon = 0;
var numLost = 0;
guessField.focus();
var resetButton = document.querySelector('#reset');
resetButton.style.display = 'none';




function checkGuess() {
    var userGuess = Number(guessField.value);
    if (guessCount === 1) {
        guesses.innerHTML = "Previous guesses: ";
    }
    guesses.innerHTML += userGuess + ' ';
    if (Number.isInteger(userGuess)) {
        if (userGuess > 99 || userGuess < 1) {
            lastResult.innerHTML = "Error: Please enter a number between 0-99"
            return;
        }
    }
    else {
        lastResult.innerHTML = "Error: Please enter a number between 0-99";
        return;
    }
    if (userGuess === randNum) {
        lastResult.innerHTML = "Congratulations! You got it right!";
        lastResult.style.backgroundColor = 'blue';
        numWon++;
        gamesWon.innerHTML = "Games won: " + numWon;
        gamesLost.innerHTML = "Games lost: " + numLost;
        lowOrHi.innerHTML = '';
        setGameOver();
    }
    else if (guessCount === 7) {
        lastResult.innerHTML = 'Sorry, you lost!';
        numLost++;
        gamesWon.innerHTML = "Games won: " + numWon;
        gamesLost.innerHTML = "Games lost: " + numLost;
        setGameOver();
    }
    else {
        lastResult.innerHTML = "Wrong!";
        lastResult.style.backgroundColor = 'red';
        if (userGuess > randNum) {
            lowOrHi.innerHTML = "Last guess was too high!";
        }
        else if (userGuess < randNum) {
            lowOrHi.innerHTML = "Last guess was too low!";
        }
    }

    guessCount++;
    guessField.value = '';
    guessField.focus();
}

guessSubmit.addEventListener('click', checkGuess);

function setGameOver() {
    guessField.disabled = true;
    guessSubmit.disabled = true;
    resetButton.style.display = 'inline';
    resetButton.addEventListener('click', resetGame);
}

function resetGame() {
    guessCount = 1;
    var resetParas = document.querySelectorAll('.resultParas p');
    for (var i = 0; i < resetParas.length; i++) {
        resetParas[i].textContent = '';
    }

    resetButton.style.display = 'none';

    guessField.disabled = false;
    guessSubmit.disabled = false;
    guessField.value = '';
    guessField.focus();

    lastResult.style.backgroundColor = 'white';

    randNum = Math.floor(Math.random() * 99) + 1;
}
