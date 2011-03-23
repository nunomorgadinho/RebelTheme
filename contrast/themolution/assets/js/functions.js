
/**************************************************
	TABS
**************************************************/

function tabs() {
	
	jQuery('#tabs').tabs({
		cookie: {expires: 30},
		fx: {opacity: 'toggle'}
	});
}

/**************************************************
	COLOR PICKER
**************************************************/

function picker() {
	
	jQuery('div.picker').each(function() {
		var classes = jQuery(this).attr('class').split(' ');
		var name = classes[1];
		
		jQuery('div.picker.' + name).farbtastic('input:text[name=' + name + ']');
		
		jQuery('.pick.' + name).click(function(){
			jQuery('.picker.' + name).fadeIn();
			return false;
		});
	});

	jQuery(document).mousedown(function() {
		jQuery('div.picker').each(function() {
			var visible = jQuery(this).css('display');
			
			if (visible == 'block') {
				jQuery(this).fadeOut();
			}
		});
	});
}

/**************************************************
	IMAGE UPLOAD
**************************************************/

function upload() {
	
	jQuery('input.upload').click(function() {
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;
	});
}

/**************************************************
	RELATED ITEMS
**************************************************/

function related() {
	
	jQuery('tr.related').each(function() {
		var classes = jQuery(this).attr('class').split(' ');
		var name = classes[1];
		var options = classes[2];
		
		jQuery('input:radio[name=' + name + ']:checked').each(function() {
			var value = 'options_' + jQuery(this).val();
			var visible = jQuery(this).parents('tr').is(':visible');
			
			if (value == options && visible == true) {
				jQuery('tr.' + name + '.' + value).fadeIn();
			} else {
				jQuery('tr.' + name).not('.' + value).hide();
				
				if (visible == false) {
					jQuery('tr.' + name).hide();
				}
			}
		});
	});
}

/**************************************************
	DOCUMENT READY
**************************************************/

jQuery(document).ready(function() {
	
	related();
	jQuery('input:radio').click(function() {
		related();
	});
	
	tabs();
	picker();
	upload();
});
