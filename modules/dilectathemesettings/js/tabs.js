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
		$("#dilecta_color").val(styl);
		
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
	
	$('#headlines_text, #body_text, #links, #links_hover, #price, #product_name, #custom_footer_bg, #custom_footer_border, #custom_footer_headlines, #custom_footer_body, #custom_footer_links, #shopping_cart_icon, #icon_wishlist, #categories_background, #categories_border_top, #categories_links, #categories_links_hover, #input_background, #input_border, #input_border_hover, #background_page_title, #border_page_title, #background_banners, #border_banners, #border_5px_color, #background_slider, #st_button_background, #st_button_background_hover, #st_button_font, #nd_button_background, #nd_button_background_hover, #nd_button_font').ColorPicker({
		onSubmit: function(hsb, hex, rgb, el) {
			$(el).val(hex);
			$(el).ColorPickerHide();
		},
		onBeforeShow: function () {
			$(this).ColorPickerSetColor(this.value);
		}
	})
	.bind('keyup', function(){
		$(this).ColorPickerSetColor(this.value);
	});

});
