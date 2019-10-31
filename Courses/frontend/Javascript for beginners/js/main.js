var btn = document.getElementById('go-button');

function buttonClicked(){
    console.log("Button Clicked");
    btn.removeEventListener('click', buttonClicked);
    document.getElementById('text').innerHTML = "Don't Click";
}

var hobbies = ['Pizza', 'Dancing', 'Programming', 'Gaming', 'Music'];

console.log(hobbies);
console.log('I no longer enjoy', hobbies.pop());
console.log(hobbies);
hobbies.push('Archery');
console.log(hobbies);
console.log(hobbies.shift());
hobbies.unshift("Laughing");
console.log(hobbies);

hobbies.forEach(function(item, index){
    console.log("I like", item, index);
});

if(hobbies.indexOf("Gaming")>-1){
    console.log("I like Gaming");
    console.log(hobbies.splice(hobbies.indexOf("Gaming"), 2));
    console.log(hobbies);
}
if(hobbies.indexOf("Sports")===-1){
    console.log("Sports not found in array")
}

btn.addEventListener('click', buttonClicked);