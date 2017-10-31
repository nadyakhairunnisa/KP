/*var i=0;

$(document).ready(function () {
	$('.slidertitle, #slider img').hide();
	showNextImage();
	setInterval('showNextImage()', 3000);
});

function showNextImage() {
	i++;
	$('#sliderImage' + i).appendTo('#slider').fadeIn(1100).delay(1100).fadeOut(1100);
    $('#title' + i).appendTo('#slider').fadeIn(1100).delay(1100).fadeOut(1100);
  	if(i==3){
   		i=0;
  	}
};*/

$(function(){
	setInterval("rotateImages()", 2000);
});

function rotateImages(){
	var oCurPhoto = $('#photoshow div.current');
	var oNxtPhoto = oCurPhoto.next();
	if(oNxtPhoto.length==0){
		oNxtPhoto = $('#photoshow div:first')
	};

	oCurPhoto.removeClass('current').addClass('previous');
	oNxtPhoto.css({opacity:0.0}).addClass('current').animate({opacity:1.0},1000,
	function(){
		oCurPhoto.removeClass('previous');
	});
}


