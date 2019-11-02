var btn = document.getElementById('go-button');

function buttonClicked(){
    console.log("Button Clicked");
    btn.removeEventListener('click', buttonClicked);
    var customText = document.getElementsByClassName("my_input");
    var results = document.getElementById("text");
    var textArea = document.getElementsByClassName("my_textarea");
    results.innerHTML = "Hello, " + customText[0].value + '<br/>';
    results.innerHTML += textArea[0].value;
}

btn.addEventListener('click', buttonClicked);