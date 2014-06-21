jQuery(document).ready(function() {
	// Add Fancybox
	var imgSelect = 'a[href*=".jpg"]:not(.nofancybox), a[href*=".jpeg"]:not(.nofancybox), a[href*=".png"]:not(.nofancybox), a[href*=".gif"]:not(.nofancybox)';
	jQuery(imgSelect).addClass("fancybox");
	
	jQuery(".fancybox").fancybox({
		loop : false,
		nextEffect : 'fade',
		prevEffect : 'fade',
		afterLoad : function() {
			if (this.group.length > 1) {
				this.title = (this.index + 1) + ' / ' + this.group.length + (this.title ? ' - ' + this.title : '');
			}
		}
	});
	// Add effects
	var linkSelect = '.article-content a:not([href*=".jpg"], [href*=".jpeg"], [href*=".png"], [href*=".gif"], .btn)';
	
	jQuery(linkSelect).css("border-bottom", "2px solid #eaeaea");
	
	jQuery(linkSelect).hover(function () {
		jQuery(this).css("border-bottom", "2px solid #2a6496");	
	}, function () {
    	jQuery(this).css("border-bottom", "2px solid #eaeaea");
	});
	
	// Comments UI
	jQuery(".comment-metadata").addClass("hidden-xs");
	
	jQuery('.comment-body').hover(function() {
		jQuery(this).find(".reply").fadeIn(200);
	}, function() {
		jQuery(this).find(".reply").stop().fadeOut(200);
	});
	
	jQuery("#author, #email, #comment").blur(function() {
		if (jQuery(this).val() == "") {
			jQuery(this).parent().addClass("has-error");
		} else {
			jQuery(this).parent().removeClass("has-error");
		}
	});
	
	// Gotop
	jQuery(function() {
		jQuery(window).bind("resize scroll", function() {
			var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
			if (scrollTop > 700 && window.innerWidth > 1200) {
				jQuery("#gotop").fadeIn(200);
			} else {
				jQuery("#gotop").stop().fadeOut(200);
			}
		});
		
		jQuery(window).scroll();
		
		jQuery("#gotop").click(function() {
			jQuery("html,body").animate({
				scrollTop : 0
			}, 500);
			return false;
		});
	});
	
});