(function(blocks, element){
	var el = element.createElement;
	blocks.registerBlockType('pwspk-plugin-dev/pwspk-block01', {
		title: 'PWSPK Block',
		icon: 'admin-home',
		category: 'layout',
		edit: function(prop){

			return el('p', {className: prop.className}, "Hello I'm in Editor")
		},
		save: function(prop){
			return el('p', {className: prop.className}, "Hello I'm in Frontend")
		}
	});

}(window.wp.blocks, window.wp.element));