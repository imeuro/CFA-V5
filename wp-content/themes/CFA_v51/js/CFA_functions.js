/* custom CFA Functions - SITEWIDE
================================================== */
var sw = document.body.clientWidth;
var bodyClasses = document.body.classList; // usage: bodyClasses.contains('my-class-name')
var ENV = window.location.host;
var basepath = '/cfa/';
if (ENV == 'localhost' || ENV == 'nas.imeuro.io' || ENV == 'www.meuro.dev') { basepath = '/conceptualfinearts/cfa/'; }
var themepath = basepath+'wp-content/themes/CFA_v51/';
var whitecurtain = document.getElementById('whitecurtain');
var modal = document.getElementById('modal');
var AltLang = document.getElementById('lang-switcher');
var header_v5 = document.getElementById('site-navigation');
var logo_v5 = document.getElementById('logo');
var menu_v5 = document.getElementById('header-menu');


////////////////////////////////////
// Sitewide Functions
////////////////////////////////////



// HEADER resizabble allo scroll
var resizzabolHeader = function() {
	var me = this;

	me.init = function() {
		menu_v5.innerHTML = menu_v5.innerHTML+'<span class="shade"></span>';
		window.addEventListener('scroll', function() { me.scrolling(); });
	};
	me.shrink = function() {
		header_v5.classList.add('shrink');
		document.querySelector('#header-menu .shade').style.display = 'none';
	};
	me.expand = function() {
		header_v5.classList.remove('shrink')
		document.querySelector('#header-menu .shade').style.display = 'block';
	};
	me.scrolling = function() {
		if ( modal.classList.contains('empty') === true || bodyClasses.contains('single') === false ) {
			// console.log(header_v5.offsetTop);
			// console.log(logo_v5.offsetHeight);
			if( document.documentElement.scrollTop > logo_v5.offsetHeight ) {
				me.shrink();
			} else {
				me.expand();
			}
		} else { me.shrink(); }
	};
};
var eyesonHeader = new resizzabolHeader();
eyesonHeader.init();


// protect images - attempt
if (ENV == 'www.conceptualfinearts.com') {
	document.addEventListener('contextmenu', event => event.preventDefault());
}

// NEWSLETTER popup
let showPopNL = (timer) => {
	let popDiv = document.getElementById('popNL');
	let popClose = popDiv.querySelector('.popclose');
	let popSure = popDiv.querySelector('.popsure');

	setTimeout(function(){
		popDiv.classList.remove('hidden');
	}, timer);

	popSure.addEventListener("click", () => {
		location.href=basepath+'/newsletter/';
	});
	popClose.addEventListener("click", () => {
		popDiv.classList.add('hidden');
	});
}



document.addEventListener("DOMContentLoaded", function() {
	console.debug('typeof jQuery:'+typeof jQuery);
	// Website Credits
	console.log("%c\n CONCEPTUAL FINE ARTS \n Powered by: Mauro Fioravanzi \n since oct 2013 \n",'background:#fff;color:#F7A420;font-weight:700');


	document.getElementById('logo').addEventListener('click', function(){
			window.location.href = basepath;
	});

});

window.addEventListener("load", function() {
	console.log('done with page load.');
	document.getElementById('whitecurtain').classList.add('hidden');
	showPopNL(5000);
});
