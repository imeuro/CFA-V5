jQuery(document).ready(function($){

  // mouseover su logo
  jQuery('#main-nav-wrapper #logo').hover(function(){
      $('#manga-style-menu').fadeIn();
    }, function() {
      $('#manga-style-menu').fadeOut();
  });

});