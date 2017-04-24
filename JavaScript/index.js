var timer;
var timerValue = 100000;
var index = 0;
var articles;
function SwapLeft () {
  articles[index].className = "hide-left";

  --index;
  if (index < 0)
    index = articles.length - 1;

  articles[index].className = "show-left";

  clearInterval (timer);
  timer = setInterval (SwapRight, timerValue);
}

function SwapRight () {
  articles[index].className = "hide-right";

  index++;
  if (index == articles.length)
    index = 0;

  articles[index].className = "show-right";
  clearInterval (timer);
  timer = setInterval (SwapRight, timerValue);
}

$(function(){
  articles = $(".l-body-carousel article");
  $(".Right").on("click", SwapRight);
    $(".Left").on("click", SwapLeft);
    timer = setInterval (SwapRight, timerValue);
});
