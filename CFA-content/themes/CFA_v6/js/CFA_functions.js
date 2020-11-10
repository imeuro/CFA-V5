/* custom CFA Functions - SITEWIDE
================================================== */
var sw = document.body.clientWidth;
var bodyClasses = document.body.classList; // usage: bodyClasses.contains('my-class-name')
var ENV = window.location.host;
let devENV = null;
var basepath = '/cfa/';
if (ENV == 'localhost' || ENV == 'nas.imeuro.io' || ENV == 'meuro.dev') {
	basepath = '/conceptualfinearts/cfa/';
	devENV = true;
}
var themepath = basepath+'CFA-content/themes/CFA_v6/';
var whitecurtain = document.getElementById('whitecurtain');
var modal = document.getElementById('modal');
var AltLang = document.getElementById('lang-switcher');
var header_v6 = document.getElementById('site-navigation');
var logo_v6 = document.getElementById('logo');
var menu_v6 = document.getElementById('header-menu');


////////////////////////////////////
// Sitewide Functions
////////////////////////////////////




// menu
const menubtn = document.getElementById('hambmenu');
let topscroll = 0;
menubtn.addEventListener('click', () => {
	if (bodyClasses.contains('fixd','single') === false) { 
		topscroll = document.scrollingElement.scrollTop;
	}
	menubtn.parentElement.classList.toggle('menu-open');
	setTimeout(() => {
		if (bodyClasses.contains('single') === false) {
			document.body.classList.toggle('fixd');
			if (bodyClasses.contains('fixd') === false) { 
				document.scrollingElement.scrollTo(0,topscroll)
			}
		}
	},100)
})

// move lang-switcher in menu
const moveLangSwitcher = () => {
	const LS = document.getElementById('lang-switcher');
	const HM = document.getElementById('header-menu');
	HM.appendChild(LS.firstElementChild);
	HM.lastElementChild.id = 'lang-switcher';
	LS.remove();
}


// protect images - attempt
if (ENV == 'www.conceptualfinearts.com') {
	document.addEventListener('contextmenu', event => event.preventDefault());
}

// NEWSLETTER popup
let showPopNL = (timer) => {
	if (document.getElementById('popNL') !== null) {
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
}

let appendENV = (env) => {
	if (typeof devENV !== 'undefined' && devENV !== null) {
		let divEnv = document.createElement('div');
		let cssENV = document.createElement('style');
		cssENV.innerHTML = `
			.env-revealer {
				position: fixed;
				top: 50%;
				z-index: 1400;
				right: -60px;
				transform: rotate(-90deg);
				color: #444;
				font-size: 14px;
				line-height: 16px;
				background: #fff;
				padding: 10px 10px;
				font-weight: 700;
				width: auto;
				text-align: center;
				text-transform: uppercase;
				border-radius: 2px 0 0 2px;
			}
		`;
		divEnv.setAttribute('class', 'env-revealer');
		divEnv.innerHTML = "🛠️ "+env+" 🛠️";
		document.head.appendChild(cssENV);
		document.body.appendChild(divEnv)
		
	}
}



document.addEventListener("DOMContentLoaded", function() {
	console.debug('typeof jQuery:'+typeof jQuery);
	// Website Credits
	console.log("%c\n CONCEPTUAL FINE ARTS \n Powered by: Mauro Fioravanzi \n since oct 2013 \n",'background:#fff;color:#F7A420;font-weight:700');


	document.getElementById('logo').addEventListener('click', function(){
			window.location.href = basepath;
	});

	moveLangSwitcher();
	appendENV(ENV);

});

window.addEventListener("load", function() {
	console.log('done with page load.');
	//cazzatadiExplore();
	//if (sw>=768) { cazzatadiExplore(); }
	document.getElementById('whitecurtain').classList.add('hidden');
});
