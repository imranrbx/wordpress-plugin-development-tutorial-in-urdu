(function(blocks, element){
	var el = element.createElement;
	var admin_style = {
		backgroundColor: 'red',
		padding: "20px",
		color: 'white'
	}
	var style = {
		backgroundColor: 'yellow',
		padding: "20px",
		color: 'white'
	}
	blocks.registerBlockType('pwspk-plugin-dev/pwspk-block01', {
		title: 'PWSPK Block',
		icon: 'admin-home',
		category: 'layout',
		edit: function(){
			return el('p', {style: admin_style}, "Hello I'm in Editor")
		},
		save: function(){
			return el('p', {style: style}, "Hello I'm in Frontend")
		}
	});

}(window.wp.blocks, window.wp.element));