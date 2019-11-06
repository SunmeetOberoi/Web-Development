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

function saySomething(phrase){
    console.log("You said: " + phrase);
}

function getPhraseLength(phrase, phrase2){
    var l = phrase.length;
    if(typeof phrase2 !== "undefined")
        l+=phrase2.length;
    return l;
}

var p = "This is a phrase";
saySomething(p);
var p2 = "This is another phrase";
var len = getPhraseLength(p);
console.log(len);