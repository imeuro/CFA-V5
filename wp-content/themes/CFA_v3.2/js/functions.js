/* custom CFA Functions
================================================== */

var browserWidth = jQuery('html').width();
var themepath = '/cfa/wp-content/themes/CFA_v3.2/'

//sballa larghezza per creare un po' di casino.
function randomFromInterval(from,to) {
    return Math.floor(Math.random()*(to-from+1)+from);
}
function okresize() {
	if (browserWidth > 767) {

	  jQuery('.newitem img').each(function() {
	    var blockwidth = jQuery(this).width();
	    var blockheight = jQuery(this).height();
	    //console.log('pppp'+blockwidth);
	    var percent;
	    if (blockwidth === 0 ) {blockwidth = 640; }
	    if (blockwidth>=480) {
	      if (blockwidth>blockheight) {
	        percent = randomFromInterval(0,5);
	      } else {
	        percent = randomFromInterval(0,30);
	      }
	    }
	    var resizedwidth = blockwidth-((percent*blockwidth)/100);
	    //console.log('resizedwidth: '+resizedwidth);
	    jQuery(this).css('width',resizedwidth+'px');

	    jQuery(this).parent().parent().removeClass('newitem');
	  });

	}
}

function getURLParameter(name) {
  if (name!=='') {
    return decodeURI(
        (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||['empty'])[1]
    );
  }
}

//menu centrato innanzitutto
function CenterMenu() {
  var menuH= 40+( jQuery('#menu-themenu-1').height() );
  var MenuSideMargin = (browserWidth-jQuery("#menu-themenu-1").width())/2;
  jQuery("#menu-themenu-1").css('margin-left',MenuSideMargin+"px");
  jQuery("#menu-themenu-1").animate({top: menuH}, 300, function() {});
  //console.log('MenuSideMargin='+MenuSideMargin);
}
function JustifyMenu() {
  jQuery("#menu-themenu-1").css('margin-left','0');
}


////////////////////////////////////
// custom layout mode: spineAlign //
////////////////////////////////////
if (browserWidth>767) {
	jQuery.Isotope.prototype._spineAlignReset = function() {
	  this.spineAlign = {
	    colA: 0,
	    colB: 0
	  };
	};

	jQuery.Isotope.prototype._spineAlignLayout = function( $elems ) {
	  var instance = this,
	      props = this.spineAlign,
	      gutterWidth = Math.round( this.options.spineAlign && this.options.spineAlign.gutterWidth ) || 0,
	      centerX = Math.round(this.element.width() / 2);


	  $elems.each(function(){
	    var $this = jQuery(this),
	        isColA = props.colA <= props.colB,
	        x = isColA ?
	          centerX - ( $this.outerWidth(true) + gutterWidth / 2 ) : // left side
	          centerX + gutterWidth / 2, // right side
	        y = isColA ? props.colA : props.colB;
	    instance._pushPosition( $this, x, y );
	    props[( isColA ? 'colA' : 'colB' )] += $this.outerHeight(true);
	    //if(isColA) {
	      //$this.children('.pinbin-image, .pinbin-text').addClass('postright');
	    //}
	  });
	};


	jQuery.Isotope.prototype._spineAlignGetContainerSize = function() {
	  var size = {};
	  size.height = this.spineAlign[( this.spineAlign.colB > this.spineAlign.colA ? 'colB' : 'colA' )];
	  return size;
	};

	jQuery.Isotope.prototype._spineAlignResizeChanged = function() {

	  return true;
	};
}


jQuery(window).resize(function() {
  browserWidth = jQuery('html').width();
  //console.log(browserWidth);


  if (browserWidth>767) {
        jQuery('#post-area').isotope({
        layoutMode: 'spineAlign',
        //disable resizing
        resizable: false,
        spineAlign: {
          gutterWidth: 10
        }
      });

      CenterMenu();

      setTimeout(function(){
        jQuery('#post-area.isotope').isotope('reLayout');
      },1000)
  }
  else if(browserWidth<=767 && browserWidth>640){
    CenterMenu();
    jQuery('#post-area.isotope').isotope('destroy');
  }
  else if(browserWidth<=640){
    JustifyMenu();
    jQuery('#post-area.isotope').isotope('destroy');
  }
});


jQuery(window).load(function(){
  console.log('done with page load.');
  var $container = jQuery('#post-area');
  jQuery('article.post .pinbin-image').addClass('newitem');
  okresize();

  if (jQuery('body').hasClass('single') && jQuery('.CFAslider').length!==0) {
    // centrare pallini slider
    var palliniW = jQuery('.selectorsBlock .indicators').width();
    var availableW = jQuery('.selectorsBlock').width();
    jQuery('.selectorsBlock .indicators').css('left',(availableW-palliniW)/2+'px');


  // centrare freccette slider
    var sliderOffset = jQuery('.CFAslider').offset().top;
    jQuery('.prevContainer,.nextContainer').css("top",sliderOffset+"px");
  }

	// effetto hover su immagini in hp (idem a #234)
  if(browserWidth>1024){
		CenterMenu();
		jQuery('article.post .pinbin-image').each( function() {
	        jQuery(this).hoverdir({speed : 1000});
	  });

	}
  else { JustifyMenu(); }


  jQuery('.archive-month-container').isotope({
    columnWidth: 160
    //layoutMode: 'fitRows'
  });


$container.imagesLoaded()
  // .always( function( instance ) {
  //   console.log('all images loaded');
  // })
  .done( function( instance ) {
    console.log('all images successfully loaded');
    jQuery('#whitecurtain').fadeOut(2000);

    if (browserWidth>767) {

      $container.isotope({
        layoutMode: 'spineAlign',
        //disable resizing
        resizable: false,
        spineAlign: {
          gutterWidth: 10
        }
      });
      $container.isotope('reLayout');


    }
  })
  .fail( function() {
    console.log('all images loaded, at least one is broken');
  })

  var pageNum = 0;
  $container.infinitescroll({
    loading: {
      finished: undefined,
      finishedMsg: "<em>No other items to load.</em>",
      img: themepath+"images/tiny_red.gif",
      msg: null,
      msgText: "",
      selector: null,
      speed: 'fast',
      start: undefined
    },
    state: {
      isDuringAjax: false,
      isInvalidPage: false,
      isDestroyed: false,
      isDone: false, // For when it goes all the way through the archive.
      isPaused: false,
      currPage: 1
    },
    navSelector  : '#nav-below',    // selector for the paged navigation
    nextSelector : '#nav-below .view-previous a',  // selector for the NEXT link (to page 2)
    itemSelector : '.post',     // selector for all items you'll retrieve
    animate      : false,
    extraScrollPx: 250,
    bufferPx     : 50,
    errorCallback: function(){$container.isotope('reLayout');
    }
    },
    // call Isotope as a callback
    function( newElements ) {
      pageNum++;

			if(browserWidth>1024){
	      jQuery('article.post .pinbin-image').each( function() {
	        jQuery(this).hoverdir({speed : 1000});
	      });
			}

      jQuery('article.post .pinbin-image a, article.post .pinbin-text a, footer a.openinlightbox').colorbox({
          iframe:true,
          width:"100%",
          height:"100%",
          fixed:true
      });


      okresize();

      scan_urls();

      if (jQuery("#post-area").hasClass('isotope')) {
        $container.children('.newitem').hide();

        $container.children('.newitem').fadeIn(500);
        $container.isotope( 'appended', jQuery( newElements ) );
        setTimeout(function(){$container.isotope('reLayout');}, 1500);
      }

      ga('send', 'pageview', '/scroll/'+pageNum);
      //console.log('scroll/'+pageNum);
    });






    // that fantastic lightbox!
    // edit:it is said that is no more fantastic...
    // edit#2:turns out that it is fantastic, indeed!
    if (jQuery('body').hasClass('single')) {
      jQuery('.posttags a').attr('target','_parent');
    }
    else {
      jQuery('footer a').not(':first').addClass('openinlightbox');
      jQuery('article.post .pinbin-image > a').colorbox({
          iframe:true,
          width:"100%",
          height:"100%",
          fixed:true,
        });
    }

    // that fantastic slider in a former-lightbox!
      jQuery('.CFAslider').iosSlider({
          snapToChildren: true,
          desktopClickDrag: true,
          keyboardControls: true,
          navNextSelector: jQuery('.next'),
          navPrevSelector: jQuery('.prev'),
          navSlideSelector: jQuery('.indicators .item'),
          onSlideChange: slideChange
      });
      function slideChange(args) {
        var currentSlideNumber = args.currentSlideNumber;
        try {
          //console.log('changed: ' + (args.currentSlideNumber - 1));
          dataLayer.push({'event':'slidechange','currentSlideNumber':(args.currentSlideNumber - 1)});
        } catch(err) {
        }
        // arrows
        if(args.currentSlideNumber === args.data.numberOfSlides) {
            jQuery('.next').addClass('hidden');
            jQuery('.prev').removeClass('hidden');
        } else if(args.currentSlideNumber === 1) {
            jQuery('.next').removeClass('hidden');
            jQuery('.prev').addClass('hidden');
        } else {
            jQuery('.next, .prev').removeClass('hidden');
        }

        // indicators
        jQuery('.indicators .item, .gallery-item').removeClass('selected');
        jQuery('.indicators .item:eq(' + (args.currentSlideNumber - 1) + '), .gallery-item:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');
        var currH=jQuery('.gallery-item:eq(' + (args.currentSlideNumber - 1) + ')').height();
        jQuery('.CFAslider').css('height',currH+'px');
      }

    // initialize:
    jQuery('.indicators .item:first, .gallery-item:first').addClass('selected');
    var initialH=jQuery('.gallery-item:first').height();
    jQuery('.CFAslider').css('height',initialH+'px');

    // LAZYLOAD (actually is unveil.js)
    jQuery("img.unveil").unveil();


  // add print button - borrowed by Shareaholic
  setTimeout(function(){
  jQuery('ul.crafty-social-buttons-list').append('<li style="margin-left: 40px !important;"><a class="crafty-social-button csb-print" href="?print=enabled" target="_blank" title="Print this Page" rel="nofollow"><img class="crafty-social-button-image" alt="Print this Page" width="48" height="48" src="'+themepath+'images/print.png"></a></li>');
  }, 3000);

});

jQuery(document).bind('cbox_open', function() {
    jQuery('body').css({ overflow: 'hidden' });
});
jQuery(document).bind('cbox_cleanup', function() {
    jQuery('body').css({ overflow: '' });
});

var linkpost = [];

//////////////////////////////////////
//
//  CFA_v3.0 additions starting here
//
//////////////////////////////////////

function CFA_toggle_menu(what) {
	var topoffset = jQuery('#wrap').offset().top;
  jQuery('.home #'+what).fadeOut(300);
  setTimeout(function(){
    jQuery('.home #main-nav-wrapper').toggleClass('menumode');
  },300);
  jQuery('#blackcurtain').toggleClass('show').toggleClass(what);
  jQuery('#wrap').toggleClass('fixd');
  jQuery('.sections_menu').parent().click();
  jQuery('#'+what+'-coldx, #'+what+'-colsx').toggleClass('hidden');
  jQuery('.home #'+what).delay(300).fadeIn(300);
	//tienimi sotto la posizione in cui mi trovo
	jQuery('#wrap').css('top',(topoffset+95)+'px');
}

// update the url if you click on a post
function scan_urls() {
  var link = jQuery('div.pinbin-image a');
  link.each(function() {
    jQuery(this).click(function() {
      update_url( jQuery(this).attr('href') );
    });
  });
}


function update_url(getUrl)
{
  var stateObj = window.location.href;
  history.pushState(stateObj, '', getUrl);
}

window.addEventListener('popstate', function(event) {
  console.log('popstate..');
  //window.location.reload();
});

jQuery(document).ready(function($){
  var menu = '';
  if (browserWidth>767) {

    // detect if colorbox is open
    jQuery(document).bind('cbox_open', function(){
        console.log('open');
        jQuery('#colorbox').addClass('cbox_open');
    }).bind('cbox_closed', function(){
        console.log('close');
        jQuery('#colorbox').removeClass('cbox_open');
    });

    var menu = location.hash;

    if (menu=='#menu' && jQuery('body').hasClass('home')) {
      CFA_toggle_menu('menu');
      jQuery('#patrons-btn,#residency-btn').addClass('hidden');
    }

    // then decide what to do at click on the logo:

    // case HOMEPAGE: click su logo apre menu
    // case SINGLE: se articolo in colorbox, chiudila e aggiorna url manualmente
    // else :se pagina o articolo aperto non in colorbox, simula back button per tornare alla home
    jQuery('#logo #menu-btn').click(function(){
    if (jQuery('body').hasClass('home') && !parent.jQuery('#colorbox').hasClass('cbox_open')) {
        CFA_toggle_menu('menu');
        setTimeout(function(){
          jQuery('#logo #patrons-btn, #logo #residency-btn').toggleClass('hidden');
          jQuery('#logo #menu-btn').toggleClass('open');
        },300);
      }
    });

    jQuery('.single #logo').click(function(){
      if (parent.jQuery('#colorbox').hasClass('cbox_open')) {
        console.log('chiudo colorbox');
        parent.update_url("/cfa/");
        parent.jQuery.colorbox.close();
      }
      else {
        console.log('torno a home');
        if (menu=='#menu') {
          window.location.href="/cfa/#menu";
        } else {
          window.location.href="/cfa/";
        }
      }
    });

    jQuery('#logo #patrons-btn').click(function(){
      CFA_toggle_menu('patrons');
      setTimeout(function(){
        jQuery('#logo #menu-btn, #logo #residency-btn').toggleClass('hidden');
        jQuery('#logo #patrons-btn').toggleClass('open');
      },300);
    });
    jQuery('#logo #residency-btn').click(function(){
      CFA_toggle_menu('residency');
      setTimeout(function(){
        jQuery('#logo #menu-btn, #logo #patrons-btn').toggleClass('hidden');
        jQuery('#logo #residency-btn').toggleClass('open');
      },300);
    });


  } else {
    // menu on mobile devices
    jQuery('footer .menuhandle').click(function(){
      jQuery('#blackcurtain,#main-nav-wrapper').toggleClass('show').toggleClass('menu');
			jQuery('#wrap').toggleClass('fixd');
      jQuery('#menu-colsx,#menu-coldx,.patronshandle,.residencyhandle').toggleClass('hidden');
      var txt = $("#main-nav-wrapper").hasClass('show') ? 'CLOSE' : 'MENU';
      jQuery("footer .menuhandle").text(txt);
    });
		jQuery('footer .patronshandle').click(function(){
      jQuery('#blackcurtain,#main-nav-wrapper').toggleClass('show').toggleClass('patrons');
			jQuery('#wrap').toggleClass('fixd');
      jQuery('#patrons-colsx,#patrons-coldx,.menuhandle,.residencyhandle').toggleClass('hidden');
      var txt = $("#main-nav-wrapper").hasClass('show') ? 'CLOSE' : 'PATRONS';
      jQuery("footer .patronshandle").text(txt);
    });
		jQuery('footer .residencyhandle').click(function(){
      jQuery('#blackcurtain,#main-nav-wrapper').toggleClass('show').toggleClass('residency');
			jQuery('#wrap').toggleClass('fixd');
      jQuery('#residency-coldx,.menuhandle,.patronshandle').toggleClass('hidden');
      var txt = $("#main-nav-wrapper").hasClass('show') ? 'CLOSE' : 'RESIDENCY';
      jQuery("footer .residencyhandle").text(txt);
    });
    jQuery('#logo').click(function(){
      window.location.href="/cfa/";
    });
    jQuery('#patrons-coldx').click(function(){
      parent.update_url("/cfa/patrons/");
      window.location.href="/cfa/patrons/";
    });


  }

  scan_urls();

  var searchfieldVal = jQuery('#s').val();
  if (searchfieldVal == 'search') {
    jQuery('#s').val('');
  }

  jQuery('#menu-colsx .clickable').click(function(){
    jQuery('#menu-colsx div.submenu').slideUp().delay(500);
    jQuery(this).next().slideToggle();
  });

});
