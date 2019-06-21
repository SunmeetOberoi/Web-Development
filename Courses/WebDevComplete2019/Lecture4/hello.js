$(document).ready(function(){
  $("button").click(function(){
    // fast add a delay of 200ms
    $("span").toggle('fast', function(){
        if ($("span").is(":visible")){
          $("button").html("Hide the word");
        }else{
          $("button").html("Show me a word");
        }
    });
  });
});