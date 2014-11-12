$(document).ready(function () {

	$.fn.tabs = function() {
		var selector = this;
		
		this.each(function() {
			var obj = $(this); 
			
			$(obj.attr('href')).hide();
			
			$(obj).click(function() {
				$(selector).removeClass('selected');
				
				$(selector).each(function(i, element) {
					$($(element).attr('href')).hide();
				});
				
				$(this).addClass('selected');
				
				$($(this).attr('href')).fadeIn();
				
				return false;
			});
		});

		$(this).show();
		
		$(this).first().click();
	};

	$('#tabs a').tabs();
	$('#tabs_design a').tabs();
	
	$(".select-color-settings li a").click(function () {
		
		var styl = $(this).attr("rel");
		var element_index = $('.select-color-settings li a').index(this);
		$(".select-color-settings li a").removeClass("active");
		$(".select-color-settings li a").eq(element_index).addClass("active");
		$("#cleve_color").val(styl);
		
	});
	
	$(".status").click(function () {
		
		var styl = $(this).attr("rel");
		var co = $(this).attr("title");
		
		if(co == 1) {
		
			$(this).removeClass('status-on');
			$(this).addClass('status-off');
			$(this).attr("title", "0");

			$("#"+styl+"").val(0);
		
		}
		
		if(co == 0) {
		
			$(this).addClass('status-on');
			$(this).removeClass('status-off');
			$(this).attr("title", "1");

			$("#"+styl+"").val(1);
		
		}
		
	});


});
