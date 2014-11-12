function delete_img(item_id){
	
	$('#post_images_list').css('opacity',0.5);
	$.post('../modules/blockblog/ajax.php', {
		action:'deleteimg',
		item_id : item_id
	}, 
	function (data) {
		if (data.status == 'success') {
		$('#post_images_list').css('opacity',1);
		$('#post_images_list').html('');
			
		} else {
			$('#post_images_list').css('opacity',1);
			alert(data.message);
		}
		
	}, 'json');

}

function tabs_custom(id){
	
	for(i=0;i<100;i++){
		$('#tab-menu-'+i).removeClass('selected');
	}
	$('#tab-menu-'+id).addClass('selected');
	for(i=0;i<100;i++){
		$('#tabs-'+i).hide();
	}
	$('#tabs-'+id).show();
}

function init_tabs(id){
	$('document').ready( function() {
		for(i=0;i<100;i++){
			$('#tabs-'+i).hide();
		}
		$('#tabs-'+id).show();
		tabs_custom(id);
	});
}

init_tabs(1);