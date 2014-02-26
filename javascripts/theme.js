jQuery(document).ready(function() {
	// Add Fancybox
	jQuery(".fancybox").fancybox();
	var img_select = 'a[href*=".jpg"]:not(.nofancybox), area[href*=".jpg"]:not(.nofancybox), a[href*=".jpeg"]:not(.nofancybox), area[href*=".jpeg"]:not(.nofancybox), a[href*=".png"]:not(.nofancybox), area[href*=".png"]:not(.nofancybox)';
	jQuery(img_select).addClass("fancybox");
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
	function getCookie(c_name) {
		if (document.cookie.length > 0) {
			c_start=document.cookie.indexOf(c_name + "=");
		if (c_start!=-1){ 
			c_start=c_start + c_name.length+1;
			c_end=document.cookie.indexOf(";",c_start);
			if (c_end==-1) c_end=document.cookie.length;
			return unescape(document.cookie.substring(c_start,c_end));
			}
		}
		return "";
	}
	// SyntaxHighlighter
	function getPath() {
		var args = arguments,
		result = [];
		for(var i = 0; i < args.length; i++)
			result.push(args[i].replace('@', getCookie("theme-path") + "/syntaxhighlighter/scripts/"));
		return result;
	}
	SyntaxHighlighter.autoloader.apply(null, getPath(
		'applescript            @shBrushAppleScript.js',
		'actionscript3 as3      @shBrushAS3.js', 
		'bash shell             @shBrushBash.js', 
		'coldfusion cf          @shBrushColdFusion.js',
		'cpp c                  @shBrushCpp.js',
		'c# c-sharp csharp      @shBrushCSharp.js', 
		'css                    @shBrushCss.js', 
		'delphi pascal          @shBrushDelphi.js', 
		'diff patch pas         @shBrushDiff.js', 
		'erl erlang             @shBrushErlang.js',
		'groovy                 @shBrushGroovy.js', 
		'java                   @shBrushJava.js',
		'jfx javafx             @shBrushJavaFX.js', 
		'js jscript javascript  @shBrushJScript.js',
		'perl pl                @shBrushPerl.js',
		'php                    @shBrushPhp.js', 
		'text plain             @shBrushPlain.js', 
		'py python              @shBrushPython.js',
		'ruby rails ror rb      @shBrushRuby.js',
		'sass scss              @shBrushSass.js',
		'scala                  @shBrushScala.js',
		'sql                    @shBrushSql.js', 
		'vb vbnet               @shBrushVb.js',
		'xml xhtml xslt html    @shBrushXml.js'
	));
	SyntaxHighlighter.defaults['smart-tabs'] = true;
	SyntaxHighlighter.defaults['tab-size'] = 4;
	SyntaxHighlighter.all();
});