$(window).load(function(){

  // Hide iframe
  $('#map').hide();

  // Call imageResizer function
  $('#atelier').fullScreenImageResizer();

});


$(document).ready( function () {
  
  // fullScreenImageResizer on window resize
  $(window).resize( function () {
    $('#atelier').fullScreenImageResizer();
  });

  // show map on hover
  var visible = false;
  $('#left').children('ul').children('li').children('.adresse').hover(function(){
    if (visible == false){
      $('#map').show();
      visible = true;
    } else {
      $('#map').hide();
      visible = false;
    }
  })
  
  // show image on hover
  //var active = false;
  //$('#posts').children('.post').children('.files').children('p').children('.img').hover(function(){

  //  imagehref = $(this).attr('href');
  //  console.log(imagehref);
  //  $('#atelier').attr('src', imagehref);
  //})

});

