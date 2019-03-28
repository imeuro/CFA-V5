/* custom CFA Functions
================================================== */

var sw = document.body.clientWidth;
var istpl = document.body.classList; // istpl.contains('my-class-name')
var ENV = window.location.host;
var basepath = '/cfa/';
if (ENV == 'localhost' || ENV == 'nas.imeuro.io') { basepath = '/conceptualfinearts/cfa/'; }
var themepath = basepath+'wp-content/themes/CFA_v5/';
var $container = jQuery('#post-area');
var modal = jQuery('#modal');
var header_v5 = jQuery('#site-navigation');
var logo_v5 = jQuery('#logo');
var menu_v5 = jQuery('#header-menu');
var modalSwiper = '';
var fogliaSwiper = '';



////////////////////////////////////
// HEADER resizabble allo scroll
////////////////////////////////////
var resizzabolHeader = function() {
	var me = this;

	me.init = function() {
		menu_v5.append('<span class="shade"></span>');
		window.addEventListener('scroll', function() { me.scrolling(); });
	};
	me.shrink = function() {
		header_v5.addClass('shrink').find('.shade').css('display','none');
	};
	me.expand = function() {
		header_v5.removeClass('shrink').find('.shade').css('display','block');
	};
	me.scrolling = function() {
		if ( modal.hasClass('empty') === true || $('body').hasClass('single') === false ) {
			if( header_v5.offset().top > logo_v5.height() ) {
				me.shrink();
			} else {
				me.expand();
			}
		} else { me.shrink(); }
	};
};
var eyesonHeader = new resizzabolHeader();
eyesonHeader.init();

// Home: sballa larghezza delle immagini per creare un po' di casino.
var randomFromInterval = function(from,to) {
    return Math.floor(Math.random()*(to-from+1)+from);
};


// ridimensiona layout dopo window load/resize
var okresize = function() {
	if (sw > 767) {

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
};



////////////////////////////////////
// Sitewide Functions
////////////////////////////////////


jQuery(document).ready(function($){

	jQuery('#logo').click(function(){
	  if (modal.children().length !== 0) {
      parent.update_url(basepath);
			modal.addClass('hidden empty').delay(1000).html('');
	  } else {
			window.location.href = basepath;
		}
	});

});

jQuery(window).load(function(){
	console.log('done with page load.');

	// rimuovi whitecurtain at window loaded
	$container.imagesLoaded().done( function( instance ) {
		console.log('all images successfully loaded');
		jQuery('#whitecurtain').addClass('transparent');

		setTimeout(function(){
			jQuery('#whitecurtain').addClass('hidden').removeClass('transparent');
		},2000);

	}).fail( function() {
    console.log('all images loaded, at least one is broken');
		jQuery('#whitecurtain').fadeOut(2000); //anyway..
  });


});

// update the url if you click on a post
function scan_urls() {
  var link = jQuery('div.pinbin-image a');
  link.each(function() {
    jQuery(this).click(function() {
      update_url( jQuery(this).attr('href') );
    });
  });
}

function update_url(getUrl) {
  var stateObj = window.location.href;
  history.pushState(stateObj, '', getUrl);
}

window.addEventListener('popstate', function(event) {
  //window.location.reload();
});



////////////////////////////////////
// Foglia / Foglia in Modal Functions
////////////////////////////////////

var CFAslidersettings = {
	init: false,
  direction: 'horizontal',
	autoHeight: true,
  loop: true,
	keyboard: true,
	preloadImages: false,
  lazy: {
    loadPrevNext: true,
  },
	fadeEffect: {
    crossFade: true
  },

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
		clickable: true
  },

  // Navigation arrows
  navigation: {
    nextEl: '.nextContainer',
    prevEl: '.prevContainer',
  }
};


var RepositionArrows = function(isModal) {
	var container;
	if (isModal === true) {
		container = "#modal";
	} else{
		container = "body";
	}
	var sliderTop = jQuery(container+' #CFAslider').offset().top - jQuery(container+' article').offset().top;
	var sliderPicH = jQuery(container+' #CFAslider .swiper-slide-active img').height();
	var arrowH = jQuery(container+' .prevContainer').outerHeight();
	var arrowW = jQuery(container+' .prevContainer').outerWidth();
	var ArrHorOffset;
	if (sw > 767) {
		ArrHorOffset = jQuery(container+' article .pinbin-copy').offset().left + (arrowW/2);
	} else {
		ArrHorOffset = 0;
	}
	var arrowsPosTop = ( sliderTop + (sliderPicH/2) ) - (arrowH/2);

	jQuery(container+' .prevContainer,.nextContainer').css('top',arrowsPosTop);
	jQuery(container+' .prevContainer').css('left',ArrHorOffset);
	jQuery(container+' .nextContainer').css('right',ArrHorOffset);
};


// Foglia: actions at window load
//===============================

jQuery(window).load(function(){
  console.log('done with page load.');
  jQuery('article.post .pinbin-image').addClass('newitem');
  okresize();

  jQuery('.archive-month-container').isotope({
    columnWidth: 160
  });

	// Foglia: init that fantastic lightbox!
	//===============================
	ThatFabulousLightbox();


  // Foglia: LAZYLOAD (actually is unveil.js)
	//===============================
  jQuery("img.unveil").unveil();


	// Foglia: add print button - borrowed by Shareaholic
	//===============================
	if (jQuery('.csb-print').length === 0) {
		setTimeout(function(){
		jQuery('ul.crafty-social-buttons-list').append('<li><a class="crafty-social-button csb-print" href="?print=enabled" target="_blank" title="Print this Page" rel="nofollow"><img class="crafty-social-button-image" alt="Print this Page" width="48" height="48" src="'+themepath+'images/print.png"></a></li>');
		}, 3000);
	}

});


// Foglia: Swiper init (see also @ line #308: modalSwiper )
//===============================
if (jQuery('body').hasClass('single') && jQuery('#CFAslider').length !== 0) {
	//console.debug('swiper init for single page');
	fogliaSwiper = new Swiper ('.CFAslider', CFAslidersettings );


	fogliaSwiper.init();
	setTimeout(function(){
		//console.debug('fogliaSwiper slideTo1');
		fogliaSwiper.update();
		RepositionArrows();
	},1000);
	fogliaSwiper.on('slideChangeTransitionEnd', function(){
		RepositionArrows();
	});
	fogliaSwiper.on('lazyImageReady', function () {
		fogliaSwiper.update();
	});

}


// prepare for that fantastic lightbox!
//===============================

function ThatFabulousLightbox() {
	if (jQuery('body').hasClass('single')) {
		jQuery('.posttags a').attr('target','_parent'); // ???
	}
	else {
		jQuery('article.post:not(.type-post-patrons)').click(function(e) {

			e.preventDefault();

			var theUrl = jQuery(this).find('div > a').attr('href');
			console.log('loading contents from: '+theUrl);
			if (theUrl) {

				var theID = jQuery(this).attr('id');
				//var header = "<div id=\"closecard\" class=\"GTMtrack\"><svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" viewBox=\"0 0 100 125\" version=\"1.1\" xml:space=\"preserve\" x=\"0px\" y=\"0px\" fill-rule=\"evenodd\" clip-rule=\"evenodd\" stroke-linejoin=\"round\" stroke-miterlimit=\"1.41421\"><g transform=\"matrix(-1,0,0,1,146.036,2)\"><path d=\"M110.879,46.5L98.439,34.061C97.854,33.475 97.854,32.525 98.439,31.939C99.025,31.354 99.975,31.354 100.561,31.939C100.561,31.939 111.975,43.354 115.555,46.934C116.141,47.519 116.141,48.469 115.555,49.055C112.135,52.475 101.091,63.519 100.561,64.049C99.975,64.635 99.025,64.635 98.439,64.049C97.854,63.463 97.854,62.514 98.439,61.928L110.867,49.5L77.5,49.5C77.102,49.5 76.721,49.342 76.439,49.061C76.158,48.779 76,48.398 76,48C76,47.602 76.158,47.221 76.439,46.939C76.721,46.658 77.102,46.5 77.5,46.5L110.879,46.5Z\" fill=\"#f7a414\"/></g></svg></div>";
				var header = ""; // "si fotta la freccia"

				eyesonHeader.shrink();
				modal.removeClass('hidden');

				modal.load( theUrl+" #"+theID, function( response, status, xhr ) {
					// console.debug(status);

					if ( status == "success" ) {

						modal.prepend(header);
						parent.update_url(theUrl);
						modal.removeClass('empty');
						jQuery('body').addClass('modal-open');

						// chiudi tutto
						jQuery('#modal #logo, #modal #closecard').click(function(){
							console.debug('click logo');
							parent.update_url(basepath);
							modal.addClass('hidden empty');
							jQuery('body').removeClass('modal-open');
							setTimeout(function(){
								console.log('rimosso content');
								modal.html('');
								eyesonHeader.scrolling();
							},2000);


						});

						// modal: Swiper init (see also @ line #348: fogliaSwiper )
						if (jQuery('#CFAslider').length !== 0) {
							modalSwiper = new Swiper ('.CFAslider', CFAslidersettings );
							modalSwiper.init();
							setTimeout(function(){
								//console.debug('fogliaSwiper slideTo1');
								modalSwiper.update();
								RepositionArrows(true);
							},1000);
							modalSwiper.on('slideChangeTransitionEnd', function(){
								RepositionArrows(true);
							});
							modalSwiper.on('lazyImageReady', function () {
								modalSwiper.update();
							});
						}

						var PinitScript=document.createElement('script');
						PinitScript.type='text/javascript';
						PinitScript.src='//assets.pinterest.com/js/pinit_main.js';

						// modal: add print button - borrowed by Shareaholicn

						setTimeout(function(){
						jQuery("body").append(PinitScript);
						jQuery('ul.crafty-social-buttons-list').append('<li><a class="crafty-social-button csb-print" href="?print=enabled" target="_blank" title="Print this Page" rel="nofollow"><img class="crafty-social-button-image" alt="Print this Page" width="48" height="48" src="'+themepath+'images/print.png"></a></li>');
						}, 3000);

					}

					if ( status == "error" ) {
						var msg = "<div class=\"post type-post type-404\"><h2>"+ xhr.status + ' ' + xhr.statusText +"</h2><p>Apologies, the article at "+theUrl+" is not available</p>\n<p>You'll be redirected to the home page in 5 seconds.</p></div>";
						jQuery( modal ).html( header + msg  );
						setTimeout(function(){
							modal.addClass('hidden empty');
						},5000);
						setTimeout(function(){
							modal.empty();
						},500);

					}
				});
			}

		});

	}
}






////////////////////////////////////
// Homepage/Archives Functions
////////////////////////////////////


// Home: sballa larghezza delle immagini per creare un po' di casino.
function randomFromInterval(from,to) {
    return Math.floor(Math.random()*(to-from+1)+from);
}

if (istpl.contains('home') === true || istpl.contains('archive') === true) { // check classe in body

	// Home: custom layout mode: spineAlign
	//===============================

	if (sw>767) {
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

	// Home: actions at window resize
	//===============================

	jQuery(window).resize(function() {
	  sw = document.body.clientWidth;
	  //console.log(sw);

	  if (sw>767) {
	        jQuery('#post-area').isotope({
	        layoutMode: 'spineAlign',
	        //disable resizing
	        resizable: false,
	        spineAlign: {
	          gutterWidth: 10
	        }
	      });

	      setTimeout(function(){
	        jQuery('#post-area.isotope').isotope('reLayout');
	      },1000);
	  } else if (sw<=767 && sw>640) {
	    jQuery('#post-area.isotope').isotope('destroy');
	  } else if (sw<=640) {
	    jQuery('#post-area.isotope').isotope('destroy');
	  }
	});

	// Home: actions at window load
	//===============================

	jQuery(window).load(function(){

		// effetto hover su immagini in hp (idem a #234)
		if(sw>1024){
			jQuery('article.post .pinbin-image').each( function() {
						jQuery(this).hoverdir({speed : 1000});
			});

		}
		okresize();

		$container.imagesLoaded().done( function( instance ) {

	    if (sw>767) {

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
	  });

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
	    errorCallback: function(){$container.isotope('reLayout');}
	  },
	  // call Isotope as a callback
	  function( newElements ) {
	    pageNum++;

			if(sw>1024){
	      jQuery('article.post .pinbin-image').each( function() {
	        jQuery(this).hoverdir({speed : 1000});
	      });
			}

	    okresize();

	    scan_urls();

			ThatFabulousLightbox();

	    if (jQuery("#post-area").hasClass('isotope')) {
	      $container.children('.newitem').hide();
				jQuery('.post-patrons').each(function(i){
					if (i >= 1) {
						jQuery(this).parent().remove();
					}
				});
	      $container.children('.newitem').fadeIn(500);
	      $container.isotope( 'appended', jQuery( newElements ) );
	      setTimeout(function(){$container.isotope('reLayout');}, 1000);
	    }
			var trackerName = ga.getAll()[0].get('name');
			ga(trackerName + '.send', 'pageview', '/scroll/'+pageNum);
	    //ga('send', 'pageview', '/scroll/'+pageNum);
	    console.log('scroll/'+pageNum);
	  });



	});
}
