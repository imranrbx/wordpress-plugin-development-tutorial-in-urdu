(function(blocks, element, editor){
	var el = element.createElement;
	var RichTextEditor = editor.RichText;

	blocks.registerBlockType('pwspk-plugin-dev/pwspk-block01', {
		title: 'PWSPK Block',
		icon: 'admin-home',
		category: 'layout',
		attributes:{
			content:{
				type: 'array',
				source: 'children',
				selector: 'div'
			}
		},
		edit: function(prop){
			var content = prop.attributes.content;
			function editText(newText){
				prop.setAttributes({content: newText});
			}
			return el(RichTextEditor,{
				tagName: 'div',
				onChange: editText,
				className: prop.className,
				value: prop.attributes.content
			});
		},
		save: function(prop){
			return el(RichTextEditor.Content, {
				tagName: 'div',
				value: prop.attributes.content,
			});
		}
	});

}(window.wp.blocks, window.wp.element, window.wp.editor));