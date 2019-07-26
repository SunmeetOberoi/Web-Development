var btn = document.getElementById('go-button');

function buttonClicked(){
    console.log("Button Clicked");
    btn.removeEventListener('click', buttonClicked);
}

btn.addEventListener('click', buttonClicked);