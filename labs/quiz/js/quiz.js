var answer1 = 2;
var answer2 = 4;
var answer3 = 1;
var answer4 = 3;
var answer5 = 2;
var answer6 = 3;
var check = document.querySelector(".check");
var a1 = document.querySelector("#a1");

var points = 0;
$('document').ready(function() {
    check.addEventListener('click', checkGuess);
    console.log("Checking guess");

    function checkGuess() {

        var g1 = $('input[name=\'q1\']:checked').val();
        var g2 = $('input[name=\'q2\']:checked').val();
        var g3 = $('input[name=\'q3\']:checked').val();
        var g4 = $('input[name=\'q4\']:checked').val();
        var g5 = $('input[name=\'q5\']:checked').val();
        var g6 = $('input[name=\'q6\']:checked').val();

        if (g1 == answer1) {
            $("#a1").html("Correct!");
            points++;
        }
        else {
            $("#a1").html("Correct answer: B");
        }

        if (g2 == answer2) {
            $("#a2").html("Correct!");
            points++;

        }
        else {
            $("#a2").html("Correct answer: D");
        }

        if (g3 == answer3) {
            $("#a3").html("Correct!");
            points++;

        }
        else {
            $("#a3").html("Correct answer: A");
        }

        if (g4 == answer4) {
            $("#a4").html("Correct!");
            points++;

        }
        else {
            $("#a4").html("Correct answer: C");
        }

        if (g5 == answer5) {
            $("#a5").html("Correct!");
            points++;

        }
        else {
            $("#a5").html("Correct answer: B");
        }

        if (g6 == answer6) {
            $("#a6").html("Correct!");
            points++;

        }
        else {
            $("#a6").html("Correct answer: C");
        }
        $("#points").html("Total Score: " + points);
        if (points > 90) {
            $("#yay").html("Woohoo! You're so smart!");

        }
    }
});
