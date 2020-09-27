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

let cazzatadiExplore = () => {
	let EXPitem = document.getElementById('menu-item-94491');
	let EXPlink = EXPitem.firstChild.getAttribute('href');
	let EXPcont = EXPitem.innerHTML;

	EXPitem.innerHTML = '<div class="focus explore-menu-btn"><div class="focus--mask"><div class="focus--mask-inner">'+EXPcont+'</div></div></div>';

	EXPitem.addEventListener("click", function() {
		location.href = EXPlink;
	});

}

let appendENV = (env) => {
	if (typeof devENV !== 'undefined') {
		let divEnv = document.createElement('div');
		let cssENV = document.createElement('style');
		cssENV.innerHTML = `
			.env-revealer {
			    position: absolute;
			    top: -30px;
			    left: 50%;
			    transform: translateX(-50%);
			    color: #444;
			    font-size: 16px;
			    line-height: 16px;
			    background: #fff;
			    padding: 10px 10px;
			    font-weight: 700;
			    width: auto;
			    text-align: center;
			    text-transform: uppercase;
			    border-radius: 50%;
			}
		`;
		divEnv.setAttribute('class', 'env-revealer');
		divEnv.innerHTML = "🛠️ on "+env+" 🛠️";
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

	appendENV(ENV);

});

window.addEventListener("load", function() {
	console.log('done with page load.');
	cazzatadiExplore();
	//if (sw>=768) { cazzatadiExplore(); }
	document.getElementById('whitecurtain').classList.add('hidden');
});
