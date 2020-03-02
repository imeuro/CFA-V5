/* custom CFA Functions - HOME PAGE
================================================== */
var $container = jQuery('#post-area');
var Jmodal = jQuery('#modal');
var JAltLang = jQuery('#lang-switcher');


// Home: sballa larghezza delle immagini per creare un po' di casino.
var randomFromInterval = function(from,to) {
    return Math.floor(Math.random()*(to-from+1)+from);
};


// ridimensiona layout dopo window load/resize
if (typeof jQuery == "function") {
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
}

// make home ITA as close as possible to home ENG
if (bodyClasses.contains('page-template-index_ita') === true) {
	bodyClasses.remove('page');
	bodyClasses.add('home');
	bodyClasses.add('home-ITA');
}


// Home: sballa larghezza delle immagini per creare un po' di casino.
function randomFromInterval(from,to) {
    return Math.floor(Math.random()*(to-from+1)+from);
}

if (bodyClasses.contains('home') === true || bodyClasses.contains('archive') === true) { // check classe in body

	if (typeof jQuery == "function") {

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
				jQuery('article.post .pinbin-image, article.cfa_translations .pinbin-image').each( function() {
							jQuery(this).hoverdir({speed : 1000});
				});

			}
			okresize();


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
		  	newElements.forEach(function(item, index) {
			 if (newElements[index].classList.contains('no-results')) {
			 		item.classList.add('hidden');
			 		newElements[0].innerHTML='<p>Sorry, no other post available.</p>'
			 		newElements[0].classList.remove('hidden');
			  		$container.infinitescroll('destroy');
			  }
		  	})
		  	
		    pageNum++;

			if(sw>1024){
		      jQuery('article.post .pinbin-image').each( function() {
		        jQuery(this).hoverdir({speed : 1000});
		      });
			}

		    okresize();

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
}



document.addEventListener("DOMContentLoaded", function() {
  // ...
});


window.addEventListener("load", function() {
 // ...
});

