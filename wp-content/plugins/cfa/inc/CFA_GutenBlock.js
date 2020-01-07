wp.domReady( () => {
	wp.blocks.unregisterBlockStyle('core/image', 'default');
	wp.blocks.unregisterBlockStyle('core/image', 'circle-mask');

	wp.blocks.registerBlockStyle('core/image', {
	    name: 'test-image-class',
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
	});


} );