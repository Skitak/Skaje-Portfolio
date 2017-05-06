var timer;
var timerValue = 5000;
var index = 0;
var articles;

function SwapLeft () {
  if (index == articles.length - 1)
    articles[0].className = "hidden";
  else
    articles [index + 1].className = "hidden";

  articles[index].className = "fading";

  --index;
  if (index < 0)
    index = articles.length - 1;

  articles[index].className = "show-left";

  clearInterval (timer);
  timer = setInterval (SwapRight, timerValue);
}

function SwapRight () {
  if (index == 0)
      articles[articles.length - 1].className = "hidden";
  else
        articles [index - 1].className = "hidden";

  articles[index].className = "fading";

  index++;
  if (index == articles.length)
    index = 0;

  articles[index].className = "show-right";

  clearInterval (timer);
  timer = setInterval (SwapRight, timerValue);
}

$(function(){
  articles = $(".l-body-carousel > a");
  $(".Right").on("click", SwapRight);
    $(".Left").on("click", SwapLeft);
    timer = setInterval (SwapRight, timerValue);
});
