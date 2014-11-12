$(document).ready(function () {

	// Animation for the languages and currency dropdown
	$('.switcher').hover(function() {
	$(this).find('.option').show();
	},function() {
	$(this).find('.option').hide();
	}); 
	
	if($('#page-title').length < 1) { $('.navigation_container').css('-webkit-box-shadow', '0px 1px 1px rgba(0, 0, 0, 0.15)').css('-moz-box-shadow', '0px 1px 1px rgba(0, 0, 0, 0.15)').css('box-shadow', '0px 1px 1px rgba(0, 0, 0, 0.15)'); }
	
	/* Switcher curency, language */
	
	var all_switcher = $('.switcherjs').size();
	
	if(all_switcher == 2) {
	
		$('.switcherjs').wrapAll("<div class='language-currency'>");
	
	
	} else {
	
		$('.switcherjs').wrap("<div class='language-currency'>");
	
	}
	
	/* Categories */

	$(".navigation_container nav > ul > li").hover(function () {
								
			$(this).find("div.sub-menu").eq(0).show();
								
	},function () {
		
			$(this).find("div.sub-menu").eq(0).hide();		
			
	}); 
	
		$(".navigation_container nav > ul > li ul li").hover(function () {
					
		  		$(this).find(".sub-menu").eq(0).show();

		},function () {
					
				$(this).find(".sub-menu").eq(0).hide();

		}); 
		
	$(".navigation_container nav > ul > li > ul").each(function() {
		$(this).wrap("<div class='sub-menu column-"+ column +"'>");
		$(this).before("<div class='arrow-categories'></div>");
	});
	
	$(".navigation_container nav ul li ul li > a").each(function() {
		if ($(this).next().length > 0) {
			$(this).after("<br />");
		}
	});
	
	$(".navigation_container nav ul li ul li ul").each(function() {
		$(this).wrap("<div class='sub-menu'>");
		$(this).before("<div class='arrow-categories'></div>");
	});	
		
	$(".categories-mobile-links > ul > li > a").each(function() {
		if ($(this).next().length > 0) {
			$(this).before("<div class='plus'></div>");
		}
	});
	
 	$("footer .myaccount .block_content a").each(function() {	
		$(this).before("&#8250; ");
	});	
 	$("footer #social_block ul li a").each(function() {	
		$(this).before("&#8250; ");
	});	

 	$("footer #block_various_links_footer ul li a").each(function() {	
		$(this).before("&#8250; ");
	});	
 	$("footer .blockcategories_footer ul li a").each(function() {	
		$(this).before("&#8250; ");
	});	
 	$("footer #links_block_footer ul li a").each(function() {	
		$(this).before("&#8250; ");
	});	
		
	// Cart
	$('#cart_block').hover(function() {
	$(this).find('.block_content').show();
	},function() {
	$(this).find('.block_content').hide();
	}); 
		
		
	$('.footer-navigation h3').click(function() {
		
		var element_index = $('.footer-navigation h3').index(this);
		var classe = $('.footer-navigation ul').eq(element_index).attr('class');
		
		if(classe == 'no-active') {
		
			$('.footer-navigation ul').eq(element_index).removeClass('no-active');
		
		} else {
		
			$('.footer-navigation ul').eq(element_index).addClass('no-active');
		
		}
	
	});

	$('.mobile-navigation .click-menu').click(function() {
		
		var classe = $('.categories-mobile-links > ul').attr('class');
						
		if(classe == 'active') {
		
			$('.mobile-navigation .categories-mobile-links > ul').removeClass('active');
		
		} else {
		
			$('.mobile-navigation .categories-mobile-links > ul').addClass('active');
		
		}
	
	});
	
	$('.mobile-navigation .plus').click(function() {
	
		var element_index = $('.mobile-navigation .plus').index(this);
		var classe = $('.categories-mobile-links ul ul').eq(element_index).attr('class');
		
		if(classe == 'active') {
			
			$(this).removeClass('minus');
			$('.categories-mobile-links ul ul').eq(element_index).removeClass('active');
		
		} else {
		
			$(this).addClass('minus');
			$('.categories-mobile-links ul ul').eq(element_index).addClass('active');
		
		}
	
	});

		
	/* products hover */
	
	$(".products-grid > div").hover(function () {
		
		$(this).find(".on-hover").show();
		$(this).find(".off-hover").hide();
	
	},function () {
	
		$(this).find(".on-hover").hide();
		$(this).find(".off-hover").show();

	}); 
	
	/* Ajax Cart */
	$('#cart_block .cart-heading').live('click', function() {
	
		$('#cart_block .content').show();
				
		$('#cart_block').live('mouseleave', function() {
			$('#cart_block .content').hide();
		});
	});
	
	/* autoclear function for inputs */
	$('.autoclear').click(function() {
	if (this.value == this.defaultValue) {
	this.value = '';
	}
	});

	$('.autoclear').blur(function() {
	if (this.value == '') {
	this.value = this.defaultValue;
	}
	});
	
	$(function() { $(window).scroll(function() {
			if($(this).scrollTop() > 300) {
				$('#toTop').fadeIn();	
			} else {
				$('#toTop').stop().fadeOut();
			}
		});
	 
		$('#toTop').click(function() {
			$('body,html').animate({scrollTop:0},800);
		});	
	});

	$('#q_up').click(function(){var q_val_up=parseInt($("input#quantity_wanted").val());if(isNaN(q_val_up)){q_val_up=0;}
	$("input#quantity_wanted").val(q_val_up+1).keyup(); return false; });$('#q_down').click(function(){var q_val_up=parseInt($("input#quantity_wanted").val());if(isNaN(q_val_up)){q_val_up=0;}
	if(q_val_up>1){$("input#quantity_wanted").val(q_val_up-1).keyup();;} return false; });
	
	$('.close').live('click', function() {
		$(this).parent().fadeOut('slow', function() {
			$(this).remove();
		});
	});	
	
});


function paginacja(id) {

	var width_module = $('#'+ id +'').width()+20;
	var width_body = $('body').width();
	var pozwolenie = true;
	var aktualny_left = 0;
			
	if(width_body > 960 && (width_module == 285 || width_module == 240)) {  
		
		var liczba_produktow = $('#'+ id +' .products-grid > div').length;
		var active = 0;
		var products = 3;
		$('#'+ id +' .products-grid > div').hide();
		$('#'+ id +' .products-grid > div').slice(0, products).show();	
		
		$('#'+ id +'_prev').click(function() {
			
			var poczatek = 0;
			
			if(active >= products) {
			
				poczatek = active-products;
			
			} else {
			
				return false;
			
			}
		
			$('#'+ id +' .products-grid > div').hide();	
			$('#'+ id +' .products-grid > div').slice(poczatek, poczatek+products).show();	
			
			if (te.browser.msie && (te.browser.version == 8 || te.browser.version == 7 || te.browser.version == 6)) {
			} else {
				 
				$('#'+ id +' .products-grid > div').slice(poczatek, poczatek+products).css("opacity", "0.3");  
				$('#'+ id +' .products-grid > div').slice(poczatek, poczatek+products).animate({opacity: 1}, 800);  

			}
			
			active = poczatek;
		
			return false;
		
		});
		
		$('#'+ id +'_next').click(function() {
			
			var koniec = 0;
			
			if(active+products < liczba_produktow) {
			
				koniec = active+products;
			
			} else {
			
				return false;
			
			}
		
			$('#'+ id +' .products-grid > div').hide();	
			$('#'+ id +' .products-grid > div').slice(koniec, koniec+products).show();	
			
			if (te.browser.msie && (te.browser.version == 8 || te.browser.version == 7 || te.browser.version == 6)) {
			} else {
				 
				$('#'+ id +' .products-grid > div').slice(koniec, koniec+products).css("opacity", "0.3");  
				$('#'+ id +' .products-grid > div').slice(koniec, koniec+products).animate({opacity: 1}, 800);  

			}
			
			active = koniec;
		
			return false;
		
		});
	
	} else {
		
		$('#'+ id +'').css("overflow", "hidden").css("width", "100%").css("position", "relative");
		$('#'+ id +' .products-grid').css("width", "9999999px");
		
		$('#'+ id +'_prev').click(function() {
		
			if(pozwolenie == true && aktualny_left > 0) {
				
				pozwolenie = false;
				
				width_module = $('#'+ id +'').width()+20;
				width_body = $('body').width();
				
				if(width_body > 960) {
				
		  			$('#'+ id +' .products-grid').animate({'left': '+='+width_module+'px'}, 700, function() { pozwolenie = true; } );
		  			aktualny_left = aktualny_left - width_module;
		  		
		  		} else {
		  		
		  			$('#'+ id +' .products-grid').animate({'left': '+=284px'}, 700, function() { pozwolenie = true; } );
		  			aktualny_left = aktualny_left - 284;
		  		
		  		}
	  		
	  		}
	  		
	  		return false;
		
		});
		
		$('#'+ id +'_next').click(function() {
		
			if(pozwolenie == true) {
			
				pozwolenie = false;
			
				width_module = $('#'+ id +'').width()+20;
				width_body = $('body').width();
				
				if(width_body > 960) {
					
					var all_width = 0;
					$('#'+ id +' .products-grid > div').each(function(index){
						
						all_width = all_width + $(this).width() + 62;
					
					});
					
					if(aktualny_left + width_module < all_width) {
									
			  	  		$('#'+ id +' .products-grid').animate({'left': '-='+width_module+'px'}, 700, function() { pozwolenie = true; } );
			  	  		aktualny_left = aktualny_left + width_module;
		  	  		
		  	  		} else {
		  	  		
		  	  			pozwolenie = true;
		  	  		
		  	  		}
		  		
		  		} else {
		  		
					var all_width = 0;
					$('#'+ id +' .products-grid > div').each(function(index){
						
						all_width = all_width + $(this).width() + 62;
					
					});
					
					if(aktualny_left + 350 < all_width) {
			  		
			  	  		$('#'+ id +' .products-grid').animate({'left': '-=284px'}, 700, function() { pozwolenie = true; } );
			  	  		aktualny_left = aktualny_left + 284;
		  	  		
		  	  		} else {
		  	  		
		  	  			pozwolenie = true;
		  	  		
		  	  		}
		  		
		  		}
	  		
	  		}
	  		
	  		return false;
		
		});
	
	}
	

}
