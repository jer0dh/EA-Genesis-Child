wp.domReady( () => {


	wp.blocks.unregisterBlockStyle(
		'core/heading',
		[ 'default' ]
	);

	wp.blocks.registerBlockStyle(
		'core/heading',
		[ 
			{
				name: 'default',
				label: 'Default',
				isDefault: true 
			},
			{ 
				name: 'h1',
				label: 'H1 Style',
			},
						{ 
				name: 'h1-medium',
				label: 'H1 Medium Style',
			},
			{ 
				name: 'h2',
				label: 'H2 Style',
			},
			{ 
				name: 'h2-medium',
				label: 'H2 Medium Style',
			},
			{ 
				name: 'h3',
				label: 'H3 Style',
			},

			{ 
				name: 'h3-small',
				label: 'H3 Small Style',
			}
		]
	);
	wp.blocks.unregisterBlockStyle(
		'core/button',
		[  'squared', 'fill', 'outline' ]
	);

	wp.blocks.registerBlockStyle(
		'core/button',
		[
			{
				name: 'default',
				label: 'Default',
				isDefault: true,
			},
			{
				name: 'full',
				label: 'Full Width',
			},
			{
				name: 'outline',
				label: 'Outline',
			},
			{
				name: 'button-small',
				label: 'Small',
			},
			{
				name: 'outline-small',
				label: 'Outline (Small Button)',
			}
		]
	); 

	wp.blocks.registerBlockStyle(
		'core/separator',
		{ 
			name: 'page-title',
			label: 'Page Title Separator'
		}
	);

		wp.blocks.registerBlockStyle(
		'core/paragraph',
		[ 	{ 
				name: 'full-width',
				label: 'Full Width'
			},
			{
				name: 'default',
				label: 'Default',
				isDefault: true 
			}
		]
	);

	wp.blocks.unregisterBlockStyle(
		'core/quote',
		[ 'default', 'large' ]
	);

} );
