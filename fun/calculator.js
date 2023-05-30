let evaluation = "";
let screen = document.getElementById("screen")
let answer = ""

function btnClick(num) {
    evaluation += num
    screen.innerHTML = evaluation
}

function calculate() {
    answer = eval(evaluation);
    screen.innerHTML = answer
    evaluation = ""
}

function clearScreen() {
    evaluation = ""
    screen.innerHTML = evaluation
}

function deleteCharacter() {
    evaluation.slice(0,-1)
    screen.innerHTML = evaluation
}

function root() {
    answer = Math.sqrt(Number(evaluation))
    screen.innerHTML = answer
    evaluation = ""
}