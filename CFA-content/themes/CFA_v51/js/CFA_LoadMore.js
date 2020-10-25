// foglia: load the posts in homepage as the user approaches the end of page
document.body.classList.add('moreposts');

let LoadHPCont = () => {
	fetch(basepath) // fetch homepage URL
    .then(function(response) {
        return response.text()
    })
    .then(function(html) {

    	// get the article list
		let parser = new DOMParser();
		let doc = parser.parseFromString(html, "text/html");
		let HPDOM = doc.querySelector('#post-area').innerHTML;
		// create container div
		const postareaTarget = document.getElementById('wrap')
		let postareaDiv = document.createElement('div');
		postareaDiv.id = 'post-area';
		postareaDiv.classList.add('append-posts');
		postareaTarget.append(postareaDiv);



		// listen scroll pos and fill the div
		const scrolltrigger = document.documentElement.scrollHeight - document.documentElement.clientHeight - 1500; // 500px before bottom
		let fillnonce = null;
		document.addEventListener('scroll', function() {
			if (!fillnonce) {
				setTimeout(function() { 
					if (document.documentElement.scrollTop >= scrolltrigger && !fillnonce){

						// libs for isotope with require.js
						requirejs(['jquery-1.12.4.min'], function(jquery) {
							requirejs(['jquery.isotope.min', 'jquery.hoverdir', 'CFA_functions_home'], function(isotope, hoverdir) {
								requirejs(['CFA_functions_home'], function(functions_home) {

									// fill the div
									postareaDiv.innerHTML = HPDOM;


									// start hoverdir
									jQuery('article.post .pinbin-image, article.cfa_translations .pinbin-image').each( function() {
										jQuery(this).hoverdir({speed : 1000});
									});


									if (sw>767) {
										setTimeout(function() { 
											// isotope layout
											jQuery('#post-area').isotope({
												layoutMode: 'spineAlign',
												resizable: false,
												spineAlign: {
												  gutterWidth: 10
												}
											});
										},1000);
									}

								});
							});
						});



						// make it look good

						fillnonce = true;
					}
				},500);
			}
		});
    })
    .catch(function(err) {  
        console.log('Failed to fetch page: ', err);
    });
}


window.addEventListener("load", function() {
 // ...
 LoadHPCont();
});