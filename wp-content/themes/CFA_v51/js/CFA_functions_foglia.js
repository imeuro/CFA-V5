/* custom CFA Functions - FOGLIA
================================================== */
var modalSwiper = [];
var fogliaSwiper = '';
var BlockSwiper = [];
var curModalSwiper = [];



////////////////////////////////////
// Foglia / Foglia in Modal Functions
////////////////////////////////////

// Foglia: Swiper init (see also @ line #308: modalSwiper )
//===============================
var CFAslidersettings = {
	init: false,
	direction: 'horizontal',
	autoHeight: true,
	loop: true,
	keyboard: true,
	preloadImages: false,
	lazy: {
    	loadPrevNext: false,
    	// loadPrevNextAmount: 1,
    	loadOnTransitionStart: true
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

function updateSwipeArea(SWname,delay) {
	setTimeout(function(){
		SWname.update();	
	},delay);
}

if ((bodyClasses.contains('single') || bodyClasses.contains('page') ) && document.querySelector('.CFAslider, .wp-block-gallery') !== null) {

	fogliaSwiper = document.querySelectorAll('.CFAslider, .wp-block-gallery');

	Array.from(fogliaSwiper).forEach(function (element, index) {


		if (element.classList.contains('wp-block-gallery') === true) {

			var da_element = element;
			if (element.nodeName == 'FIGURE') { // shit happens :(

				da_element = element.firstChild;
				da_element.classList.remove('blocks-gallery-grid');

			}

			// 'element' will be wrapped with a div.swiper-container.CFAslider
			var Swrapper = document.createElement('div');
			da_element.parentNode.insertBefore(Swrapper, da_element);
			Swrapper.appendChild(da_element);

			// div.swiper-container.CFAslider will be wrapped with a div.container
			var Swrapper2 = document.createElement('div');
			Swrapper.parentNode.insertBefore(Swrapper2, Swrapper);
			Swrapper2.appendChild(Swrapper);

			//reset and add some classes to make it work...
			Swrapper.className = '';
			da_element.className = '';
			Swrapper.classList.add('swiper-container','CFAslider');
			Swrapper2.classList.add('container');

			da_element.classList.add('swiper-wrapper','gutenberg-swiper-block');

			var Sslides = da_element.childNodes;
			Array.from(Sslides).forEach(function (e, i) {
				e.className = '';
				e.classList.add('swiper-slide', 'gallery-item');
				var Simg= e.querySelector('img');
				var Simgsrc = Simg.getAttribute('src');
				Simg.removeAttribute('src');
				Simg.setAttribute('data-src', Simgsrc);
				Simg.classList.add('swiper-lazy');
				var Sfig= e.querySelector('figure'); // to be removed
				Ssaveme=Sfig.innerHTML;
				e.innerHTML = Ssaveme;
				var Sdida= e.querySelector('figcaption');
				Sdida.classList.add('gallery-caption');
				var Sloader = document.createElement('div');
				e.appendChild(Sloader);
				Sloader.classList.add('swiper-lazy-preloader');
			});


			// add the navigation bullets + arrows...
			var Snavigation = document.createElement('div');
			var SLarr = document.createElement('div');
			var SRarr = document.createElement('div');

			Swrapper.appendChild(Snavigation);
			Swrapper.appendChild(SLarr);
			Swrapper.appendChild(SRarr);

			Snavigation.classList.add('swiper-pagination');
			SLarr.classList.add('prevContainer');
			SRarr.classList.add('nextContainer');

			// aaaaand finally init dat shit
			BlockSwiper[index] = new Swiper (Swrapper, CFAslidersettings );
			BlockSwiper[index].on('init', function() { 
				updateSwipeArea(BlockSwiper[index],300); 
			});
			BlockSwiper[index].on('lazyImageReady', function () {
				console.log('lazyImageReady........');
			updateSwipeArea(BlockSwiper[index],100);
			});
			BlockSwiper[index].init();
			console.log(index+'init!');

		} else { // Legacy carousels with shortcodes
			var curSwiper = new Swiper (element, CFAslidersettings );
			curSwiper.on('init', function() { 
				updateSwipeArea(curSwiper,300); 
			});
			curSwiper.on('lazyImageReady', function () {
				updateSwipeArea(curSwiper,100);
			});	
			curSwiper.init();
		}
		
	});

}

// Foglia: handle printing event
//===============================
if (window.location.search.substr(1) == "print=enabled") {
	
	var destroyFogliaswiper = function() {
    if (typeof fogliaSwiper == 'object'){ 
			fogliaSwiper.destroy();
			console.log('fogliaswiper destroyed.');
		} 
	};

	if (window.matchMedia) {
		var checkprinting = window.matchMedia('print');
		checkprinting.addListener(destroyFogliaswiper);
	}

	window.onbeforeprint = destroyFogliaswiper;

	setTimeout(function(){
		console.log('printing...');
		window.self.print();
	},500);

} else { //redirect to printable version

	var suggest_printable = function() {
		window.location.replace("?print=enabled")
	};

	if (window.matchMedia) {
		var checkprinting = window.matchMedia('print');
		checkprinting.addListener(suggest_printable);
	}

	window.onbeforeprint = suggest_printable;

}

// Foglia: handle auto-summary generation
var get_summary = function(context) {

	var ToCTarget = document.querySelector('.summary-container');

	if (ToCTarget && ToCTarget !== null) {

		// there is a flag in backend, adding specific DOM to the page, which enables auto summary (Table Of Contents) functionality

		var Sumheaders=document.querySelectorAll('.pinbin-copy h2,.pinbin-copy h3,.pinbin-copy h4');
		if (Sumheaders.length > 1) {

			var ToC = document.createElement('nav');
			ToC.classList.add('table-of-content');
			ToC.setAttribute('role', 'navigation');
			
			var Sumitem='';
			var Hindex=1;
			Sumheaders.forEach(function(item,index){
				item.setAttribute('id', 'content-'+index);
			 	Sumitem = Sumitem+"\n<li><a class='ToC-scroll' data-href='#content-"+index+"'>"+Hindex+". "+item.textContent+"</a></li>";
				Hindex++;
			});

			ToC.innerHTML="\n<h3 class='ToC-heading'>Summary:</h3>\n<ul id='ToC-list'>"+Sumitem+"\n</ul>";

				ToCTarget.appendChild(ToC, ToCTarget);

			var ToClinks = document.querySelectorAll(".ToC-scroll");
			ToClinks.forEach(function(item,index){
				item.addEventListener("click",function(e){
					e.preventDefault;
				  scrollTo(document.getElementById('content-'+index),context);
				});
			});
		}
	}
}

// Foglia: button to return to the top of the article
var goTopLink = function(context) {
	if (bodyClasses.contains('single') || bodyClasses.contains('page') || bodyClasses.contains('modal-open')) {
		var Uplink = document.createElement('button');
		Uplink.setAttribute('id','uplink');
		Uplink.classList.add('hidden');
		document.getElementsByTagName('body')[0].appendChild(Uplink);
		Uplink.addEventListener("click",function() { 
			scrollTo(document.getElementsByTagName('body')[0],context);
		});
		context.addEventListener('scroll', function() {
			if (document.documentElement.scrollTop > 500) {
				Uplink.classList.remove('hidden');
			} else {
				Uplink.classList.add('hidden');
			}
		});
	}
}
function scrollTo(element,context) {
	if (sw>640 && context==window) {
		Stop = element.offsetTop - 180;
	} else {
		Stop = element.offsetTop;
	}
	context.scroll({
		behavior: 'smooth',
		left: 0,
		top: Stop
	});
}


let makefullwidth = (element) => {  // per kunstmatrix, principalmente
	const selEl = document.querySelectorAll(element);
	Array.from(selEl).forEach(function(el) {
		const nextOne = el.nextSibling;
		console.debug(nextOne);
		const wrapper = document.createElement('div');
		wrapper.setAttribute('class', 'full-width-container');
		wrapper.style.cssText="position: absolute; height: 600px; left: 0; width: 100%; height: "+el.getAttribute('height');
		nextOne.style.marginTop = el.getAttribute('height')+'px';
		el.parentNode.insertBefore(wrapper, el);
		wrapper.appendChild(el);
	});
}


document.addEventListener("DOMContentLoaded", function() {
  goTopLink(window);
  get_summary(window);
  makefullwidth('iframe[src^="https://art.kunstmatrix.com/apps/"]')
});


window.addEventListener("load", function() {
 // ...
});

