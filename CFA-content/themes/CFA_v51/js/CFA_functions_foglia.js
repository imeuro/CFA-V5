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
				if (Sdida && Sdida.length > 0) {
					Sdida.classList.add('gallery-caption');
				}
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

			var ToC = document.createElement('div');
			ToC.classList.add('indice');
			
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
var bottomLinks = function(context) {
	if (bodyClasses.contains('single') || bodyClasses.contains('page') || bodyClasses.contains('modal-open')) {
		var Uplink = document.createElement('button');
		Uplink.setAttribute('id','uplink');
		Uplink.classList.add('hidden');
		document.getElementsByTagName('body')[0].appendChild(Uplink);
		Uplink.addEventListener("click",function() { 
			scrollTo(document.getElementsByTagName('body')[0],context);
		});

		let Showmehome = document.createElement('a');
		let Hometext = document.createTextNode('HOME');
		Showmehome.appendChild(Hometext);
		Showmehome.setAttribute('id','showmehome');
		Showmehome.classList.add('hidden');
		document.body.appendChild(Showmehome);
		Showmehome.addEventListener("click",function() { 
			context.location.href="/"
		});

		context.addEventListener('scroll', function() {
			if (document.documentElement.scrollTop > 500) {
				Uplink.classList.remove('hidden');
				Showmehome.classList.remove('hidden');
			} else {
				Uplink.classList.add('hidden');
				Showmehome.classList.add('hidden');
			}
		});
	}
}
// Foglia: button to return home
let ShowMeHome = () => {
	if( document.documentElement.scrollTop > logo_v5.offsetHeight ) {
		showmehome.classList.remove('hidden');
	} else {
		showmehome.classList.add('hidden');
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


let checkGallery = () => {
	const iframeInPage = document.querySelector('iframe');
	if (iframeInPage && iframeInPage.src.includes('art.kunstmatrix.com')) {
		iframeInPage.classList.add('alignfull');
	}
}

let micrioInstance = null;
let injectMicrio = () => {
	const MicrioTag = document.querySelectorAll('a.micrio-code');
	if (MicrioTag.length >= 1) {
		console.debug('Micr.io tag present: injecting library...');
		
		let Mscript = document.createElement('script');
		Mscript.src = 'https://b.micr.io/micrio-2.8.min.js';
		Mscript.type = 'text/javascript';
		Mscript.async = 'async';
		Mscript.id = 'micrio-2.8-lib';
		document.body.append(Mscript);

		let Mcss = document.createElement('style');
		Mcss.type = 'text/css';
		Mcss.innerHTML = `
			.micrio-code { cursor: pointer; }
			@font-face {
			  font-family: "celtic";
			  src: url(`+themepath+`/js/celt.ttf) format("truetype");
			}  
			.marker-popup.class-test {
				font-family: "celtic" !important;
			    color: aqua !important;
			}`;
		document.head.append(Mcss);

		let Mdiv = document.createElement('div');
		Mdiv.id = 'Micriocontent';
		document.body.append(Mdiv);

		Array.from(MicrioTag).forEach(function(el) {
			const MicrioID = el.getAttribute('data-micrio-id');
			el.addEventListener('click', function(){ 
				initMicrioFS(MicrioID,Mdiv);
			 });
		});
		return true
	} else {
		return false
	}
}

let initMicrioFS = (MicrioID,Mdiv) => {
	if (micrioInstance) { // reset
		clearMicriocontent();
	}
	if (MicrioID) {
		console.debug('generating Micrio DOM Elements...');
		micrioInstance = new Micrio({
			// Image ID, required
			id: MicrioID,
			// HTML element to put the image in, defaults to <body>
			container: Mdiv,
			// Listen to touch and mouse events, defaults to true
			hookEvents: true,
			// Initializes and draws image on instance creation, defaults to true
			autoInit: true,
			// How to render the initial view, like CSS background-size
			// 'cover' or 'contain'. Defaults to 'contain'.
			initType: 'cover',
			logo: false,
		});

		micrioInstance.addEventListener('preset', () => {
			console.debug('Micrio preset');
			micrioInstance.camera.fullScreenToggle();
		});
		micrioInstance.addEventListener('load', () => {
			console.debug('Micrio load');
			// micrioInstance.camera.fullScreenToggle();
		});
		micrioInstance.addEventListener('show', () => {
			console.debug('Micrio show');
			document.addEventListener('fullscreenchange', clearMicriocontent);
			document.addEventListener('webkitfullscreenchange', clearMicriocontent);
			document.addEventListener('mozfullscreenchange', clearMicriocontent);
			document.addEventListener('MSFullscreenChange', clearMicriocontent);
		});
	}

}

let clearMicriocontent = () => {
	if (!document.fullscreenElement && !document.webkitIsFullScreen && !document.mozFullScreen && !document.msFullscreenElement) {
		micrioInstance.destroy();
		micrioInstance.container.removeAttribute('class');
		micrioInstance.container.removeAttribute('style');
		micrioInstance.container.firstElementChild.remove();
		micrioInstance = null;
	}
}


// load more (homepage) posts at the end
if (bodyClasses.contains('single','single-post')) {
	let requireJS = document.createElement('script');
	requireJS.src = 'https://requirejs.org/docs/release/2.3.6/minified/require.js';
	requireJS.setAttribute('data-main',themepath+'js/CFA_LoadMore.js');
	document.body.append(requireJS);
}


document.addEventListener("DOMContentLoaded", function() {
  bottomLinks(window);
  get_summary(window);
  ShowMeHome();
  injectMicrio();
  checkGallery();
});


window.addEventListener("load", function() {
 // ...
});

