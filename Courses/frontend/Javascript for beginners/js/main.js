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

function getPhraseLength(params){
    var l = params.phrase.length;
    if(typeof params.phrase2 !== "undefined")
        l+=params.phrase2.length;
    function printBoth(){
        console.log(params.phrase+" " + params.phrase2);
        return l;
    }
    return printBoth();
}

var p = "This is a phrase";
saySomething(p);
var p2 = "This is another phrase";
var len = getPhraseLength({phrase: p, phrase2: p2});
console.log(len);