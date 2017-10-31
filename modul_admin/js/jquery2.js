$(document).ready(function(){

	$("#show-button").click(function(){
		$("#section-kiri").show();
		// $("#section-kiri").show(1000);
	});

	$("#hide-button").click(function(){
		$("#section-kiri").hide(function(){
			alert('the form is now hidding');
		});           
		// $("#section-kiri").hide(1000);
	});

	$("#fadein-button").click(function(){
		// $("#section-kiri").fadeIn();
		$("#section-kiri").fadeIn();
		// $("#section-kiri").fadeIn(3000);
	});

	$("#fadeout-button").click(function(){
		$("#section-kiri").fadeOut();
		// $("#section-kiri").fadeOut("slow");
		// $("#section-kiri").fadeOut(3000);
	});

	$("#slidedown-button").click(function(){
		$("#section-kiri").slideDown();
	});

	$("#slideup-button").click(function(){
		$("#section-kiri").slideUp();
	});

	$("#chaining-button").click(function(){
		$("#header-top").css({'background-color':'#BA4A5B'});
	});

	$("#judul-artikel").mouseenter(function(){           
		$(this).animate({'width':'495px'},300);
	});

	$("#judul-artikel").mouseleave(function(){           
		$(this).animate({'width':'200px'},300);
	});

	$("#konten-artikel").focus(function(){
		$(this).animate({
			'width':'495px'
		},300);
		$(this).animate({
			'height':'500px'
		},300);          
	});

});