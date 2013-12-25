jQuery(document)
		.ready(
				function() {
					// Add Fancybox
					jQuery(".fancybox").fancybox();
					var img_select = 'a[href*=".jpg"]:not(.nofancybox), area[href*=".jpg"]:not(.nofancybox), a[href*=".jpeg"]:not(.nofancybox), area[href*=".jpeg"]:not(.nofancybox), a[href*=".png"]:not(.nofancybox), area[href*=".png"]:not(.nofancybox)';
					jQuery(img_select).addClass("fancybox");
					// Comments UI
					jQuery("#submit").addClass("btn btn-primary");
					jQuery(".comment-form").addClass("form-horizontal");
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
					jQuery(function() {
						jQuery(window).scroll(function() {
							var scrollt = document.documentElement.scrollTop;
							if (scrollt > 700) {
								jQuery("#gotop").fadeIn(300);
							} else {
								jQuery("#gotop").stop().fadeOut(300);
							}
						});
						jQuery("#gotop").click(function() {
							jQuery("html,body").animate({
								scrollTop : 0
							}, 500);
							return false;
						});
					});
					if (Modernizr.canvas == false) {
						jQuery("#alert-HTML5").removeClass("hide");
					}
				});