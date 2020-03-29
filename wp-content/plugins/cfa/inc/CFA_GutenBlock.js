wp.domReady( () => {
	wp.blocks.unregisterBlockStyle('core/image', 'default');
	wp.blocks.unregisterBlockStyle('core/image', 'circle-mask');
	//wp.blocks.unregisterBlockStyle('core/gallery', 'default');

	wp.blocks.registerBlockStyle('core/image', {
	    name: 'CFA-image',
	    label: 'CFA Image',
    	isDefault: true,
    	attributes: {
		    alt: {
		      type: "string",
		      source: "attribute",
		      selector: "img",
		      attribute: "alt",
		      "default": ""
		    },
		}
	});
});