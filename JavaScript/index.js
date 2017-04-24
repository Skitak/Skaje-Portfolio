var timer;
var timerValue = 10000;
var index = 0;
var articles;
function SwapLeft () {
  articles[index].removeClass("show");
  articles[index].addClass("hide");

  --index;
  if (index < 0)
    index = articles.length - 1;

  articles[index].removeClass("hide");
  articles[index].addClass("show");
  clearInterval (timer);
  timer = setInterval (SwapRight, timerValue);
}

function SwapRight () {
  articles[index].removeClass("show");
  articles[index].addClass("hide");

  ++index;
  if (index == articles.length)
    index = 0;

  articles[index].removeClass("hide");
  articles[index].addClass("show");
  clearInterval (timer);
  timer = setInterval (SwapRight, timerValue);
  alert("hi");
}

$(function(){
  articles = $(".l-body-carousel article");
  $(".Right").on("click", SwapRight);
    $(".Left").on("click", SwapLeft);
    timer = setInterval (SwapRight, timerValue);
});
