(function( $ ) {
    
	function doAnimations( elems ) {
		var animEndEv = 'webkitAnimationEnd animationend';		
		elems.each(function () {
			var $this = $(this),
				$animationType = $this.data('animation');
			$this.addClass($animationType).one(animEndEv, function () {
				$this.removeClass($animationType);
			});
		});
	}
		
	var $myCarousel = $('#carousel-top'),
		$firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
		
	$myCarousel.carousel();
	doAnimations($firstAnimatingElems);
	
	//Pause carousel  
	$myCarousel.carousel('pause');
	
	
	//Other slides to be animated on carousel slide event 
	$myCarousel.on('slide.bs.carousel', function (e) {
		var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
		doAnimations($animatingElems);
	});  
    $('#carousel-top').carousel({
        interval:3000,
        pause: "false"
    });
	
})(jQuery);	



// Navigation Bar Background-color Setting
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});



// Panel Service Setting
$(document).on('click', '.panel-heading span.clickable', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('click', '.panel div.clickable', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).ready(function () {
    $('.panel-heading span.clickable').click();
    $('.panel div.clickable').click();
});


// Progress Bar
 $(document).ready(function() {
      $('.progress .progress-bar').css("width",
                function() {
                    return $(this).attr("aria-valuenow") + "%";
                }
        )
    });


// Owl Slider Setting for Blog

$(document).ready(function() {
 
  $("#owl-demo").owlCarousel({
    items :3, //3 Item For Blog

    itemsDesktop: [1400, 3],
    itemsDesktopSmall: [1100, 3],
    itemsTablet: [700, 2],
    itemsMobile: [500, 1],
    navigation : false,
    lazyLoad : true,        
    autoPlay:3000 //autoPlay    
  }); 
});


// Owl Slider Setting for Testimoni Client

$(document).ready(function() {
    
    $(".client").owlCarousel({              
    items :1, // 1 Item For Testimony
    itemsDesktop: [1400, 1],
    itemsDesktopSmall: [1100, 1],
    itemsTablet: [700, 1],
    itemsMobile: [500, 1],
    lazyLoad : true,    
    navigation : false,
    autoPlay:2500,        

    });

});

// This is For Counting Number
$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 40000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});


// This is for smooth scrolling Style 1
$(".navbar-nav li a[href^='#']").on('click', function(e) {   
   e.preventDefault();
   var hash = this.hash;

   $('html, body').animate({
       scrollTop: $(this.hash).offset().top
       // you can change the speed here
     }, 1000, function(){   

       // when done, add hash to url
       // (default click behaviour)
       window.location.hash = hash;
     });
});


// This is for smooth scrolling Style 2
$(".nav li a[href^='#']").on('click', function(e) {
   e.preventDefault();   
   var hash = this.hash;

   $('html, body').animate({
       scrollTop: $(this.hash).offset().top
       // you can change the speed here
     }, 1100, function(){   

       // when done, add hash to url
       // (default click behaviour)
       window.location.hash = hash;
     });
});


// This is For Background Video
$( document ).ready(function() {

    // Resive video
    scaleVideoContainer();

    initBannerVideoSize('.video-container .poster img');
    initBannerVideoSize('.video-container .filter');
    initBannerVideoSize('.video-container video');
        
    $(window).on('resize', function() {
        scaleVideoContainer();
        scaleBannerVideoSize('.video-container .poster img');
        scaleBannerVideoSize('.video-container .filter');
        scaleBannerVideoSize('.video-container video');
    });

});

function scaleVideoContainer() {

    var height = $(window).height();
    var unitHeight = parseInt(height) + 'px';
    $('.homepage-hero-module').css('height',unitHeight);

}

function initBannerVideoSize(element){
    
    $(element).each(function(){
        $(this).data('height', $(this).height());
        $(this).data('width', $(this).width());
    });

    scaleBannerVideoSize(element);

}

function scaleBannerVideoSize(element){

    var windowWidth = $(window).width(),
        windowHeight = $(window).height(),
        videoWidth,
        videoHeight;
    
    console.log(windowHeight);

    $(element).each(function(){
        var videoAspectRatio = $(this).data('height')/$(this).data('width'),
            windowAspectRatio = windowHeight/windowWidth;

        if (videoAspectRatio > windowAspectRatio) {
            videoWidth = windowWidth;
            videoHeight = videoWidth * videoAspectRatio;
            $(this).css({'top' : -(videoHeight - windowHeight) / 2 + 'px', 'margin-left' : 0});
        } else {
            videoHeight = windowHeight;
            videoWidth = videoHeight / videoAspectRatio;
            $(this).css({'margin-top' : 0, 'margin-left' : -(videoWidth - windowWidth) / 2 + 'px'});
        }

        $(this).width(videoWidth).height(videoHeight);

        $('.homepage-hero-module .video-container video').addClass('fadeIn animated');
        

    });
}


    // This is for Project Slider

    (function( $ ) {

      //Function to animate slider captions 
      function doAnimations( elems ) {
        //Cache the animationend event in a variable
        var animEndEv = 'webkitAnimationEnd animationend';
        
        elems.each(function () {
          var $this = $(this),
            $animationType = $this.data('animation');
          $this.addClass($animationType).one(animEndEv, function () {
            $this.removeClass($animationType);
          });
        });
      }
      
      //Variables on page load 
      var $myCarousel = $('#carousel-project'),
        $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
        
      //Initialize carousel 
      $myCarousel.carousel();
      
      //Animate captions in first slide on page load 
      doAnimations($firstAnimatingElems);
      
      //Pause carousel  
      $myCarousel.carousel('pause');
      
      
      //Other slides to be animated on carousel slide event 
      $myCarousel.on('slide.bs.carousel', function (e) {
        var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
        doAnimations($animatingElems);
      });  
      
    })(jQuery);