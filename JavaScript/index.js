var timer;

var SwapLeft = function(){
  alert("hi left");
};

var Swapright = function(){
  clearInterval(timer);
  timer = setInterval (SwapRight, 10000);

  alert("hi right");
};

$(function(){
  $("pannel Right").click(SwapRight);
    $("pannel Left").click(SwapLeft);
    timer = setInterval (SwapRight, 10000);
});
