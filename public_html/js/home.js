$(document).ready(function() {
  // you can remove this if you want, it will stop the carousel transtioning automatically. 
  $('#myCarousel').carousel({
    interval: 10000
  });
  
  setEqualHeight();
});

$("#scrollmiddle").click(function() {
    $('html, body').animate({
        scrollTop: $("#middle").offset().top
    }, 2000);
});

function setEqualHeight(e) {
  if ($('#thumbnailimage').width() == 0) {
    $('.bluebox').width(($('#thumbnailimage2').width()));
    $('.bluebox').height($('#thumbnailimage2').height());
    $(".bluebox").css("margin-top",-($('#thumbnailimage2').height()))
  }
  else{
    $('.bluebox').width($('#thumbnailimage').width());
    $('.bluebox').height($('#thumbnailimage').height());
    $(".bluebox").css("margin-top",-($('#thumbnailimage').height()))
  }
}

window.onresize = setEqualHeight;