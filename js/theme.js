/*=============================================
Wordpress Bootstrap Theme
Designed By Crexyer
=============================================*/

var config = {
	"fadeTime": 200,
	"linkNormal": "2px solid #eaeaea",
	"linkHover": "2px solid #2a6496",
	"linkSelect": '.article-content p a:not([href*=".jpg"], [href*=".jpeg"], [href*=".png"], [href*=".gif"], .btn)',
	"imgSelect": 'a[href*=".jpg"]:not(.nofancybox), a[href*=".jpeg"]:not(.nofancybox), a[href*=".png"]:not(.nofancybox), a[href*=".gif"]:not(.nofancybox)'
};

jQuery(document).ready(function() {
	// Add fancybox
	jQuery(config["imgSelect"]).addClass("fancybox");
	jQuery(".fancybox").fancybox({
		loop: false,
		nextEffect: 'fade',
		prevEffect: 'fade',
		afterLoad: function() {
			if (this.group.length > 1) {
				this.title = (this.index + 1) + ' / ' + this.group.length + (this.title ? ' - ' + this.title : '');
			}
		}
	});

	// Add link effects
	jQuery(config["linkSelect"]).css("border-bottom", config["linkNormal"]);
	jQuery(config["linkSelect"]).hover(function() {
		jQuery(this).css("border-bottom", config["linkHover"]);
	}, function() {
		jQuery(this).css("border-bottom", config["linkNormal"]);
	});

	// Add comments CSS styles
	jQuery(".comment-metadata").addClass("hidden-xs");
	jQuery('.comment-body').hover(function() {
		jQuery(this).find(".reply").fadeIn(config["fadeTime"]);
	}, function() {
		jQuery(this).find(".reply").stop().fadeOut(config["fadeTime"]);
	});

	// Check blanks
	jQuery("#author, #email, #comment").blur(function() {
		if (jQuery(this).val() == "") {
			jQuery(this).parent().addClass("has-error");
		} else {
			jQuery(this).parent().removeClass("has-error");
		}
	});

	// Gotop Button function
	jQuery(function() {
		jQuery(window).bind("resize scroll", function() {
			var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
			if (scrollTop > 700 && window.innerWidth > 1200) {
				jQuery("#gotop").fadeIn(config["fadeTime"]);
			} else {
				jQuery("#gotop").stop().fadeOut(config["fadeTime"]);
			}
		});
		var animateFinish = true;
		jQuery("#gotop").click(function() {
			if (animateFinish == false) {
				return false;
			} else {
				animateFinish = false;
			}

			// Clicked Styles
			jQuery("#rocket").attr("class", "clicked");
			jQuery("html,body").animate({
				scrollTop: 0
			}, 500, "swing", function() {
				animateFinish = true;
				setTimeout(function() {
					jQuery("#rocket").removeAttr("class");
				},config["fadeTime"]);
			});

		});
	});

});