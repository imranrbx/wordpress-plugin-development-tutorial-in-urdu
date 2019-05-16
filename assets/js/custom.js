jQuery(function($){
	$('#ajax_form').on('submit', function(el){
		el.preventDefault();
		$.post(ajaxurl,{action: 'my_ajax_action', option1: el.target.pwspk_option_1.value},function(val){
				alert(val);
			})
	})
	var data = {
		action: 'my_front_ajax_action',
		value: ajax_object.num1,
	}
	$.post(ajax_object.ajaxurl, data, function(val){
		alert(val);
	})
})