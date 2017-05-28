$( ".right" ).click(function() {
  var slides = document.getElementsByClassName("nav-pills");
  $controle = 0;
  while($controle !=2){
    for(var i = 0; i < slides.length; i++)
    {
        if(slides.item(i).classList.contains('active')){
            $controle++;
            slides.item(i).classList.remove('active');
        }

        else if($controle == 1){
            slides.item(i).classList.add('active');
            $controle ++;
        }
    }
  }
});

$( ".left" ).click(function() {
  var slides = document.getElementsByClassName("nav-pills");
  $controle = 0;
    while($controle !=2){
    for(var i = slides.length -1 ; i >= 0 ; i--)
    {
        if(slides.item(i).classList.contains('active')){
            $controle++;
            slides.item(i).classList.remove('active');
        }

        else if($controle == 1){
            slides.item(i).classList.add('active');
            $controle ++;
        }
    }
  }
});

