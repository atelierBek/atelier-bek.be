

$(window).load(function(){

  $('iframe').hide();


  // Call imageResizer function
  $('.atelier').fullScreenImageResizer();


})


$(document).ready( function () {
  $(window).resize( function () {
    $('.atelier').fullScreenImageResizer();
  });

  var visible = false;

  $('ul').children('li').children('.adresse').hover(function(){
    if (visible == false){
      $('iframe').show();
      visible = true;
    } else {
      $('iframe').hide();
      visible = false;
    }
  })
});
