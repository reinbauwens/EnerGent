$(document).ready(function() {
  // you can remove this if you want, it will stop the carousel transtioning automatically. 
  $('#myCarousel').carousel({
    interval: 10000
  });
});

$("#scrollmiddle").click(function() {
    $('html, body').animate({
        scrollTop: $("#middle").offset().top
    }, 2000);
});