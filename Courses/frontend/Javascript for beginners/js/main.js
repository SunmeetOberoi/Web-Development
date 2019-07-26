var btn = document.getElementById('go-button');

function buttonClicked(){
    console.log("Button Clicked");
    btn.removeEventListener('click', buttonClicked);
    document.getElementById('text').innerHTML = "Don't Click";
}

btn.addEventListener('click', buttonClicked);