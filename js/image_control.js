// JavaScript Document

var images = ['durango_bg2.jpg', 'durango_bg3.jpg', 'durango_bg4.jpg', 'durango_bg5.jpg'];
var logos = ['images/logo_white.png', 'images/logo_green.png', 'images/logo_red.png', 'images/logo_ochra.png'];

jQuery('body').css({'background-image': 'url(images/' + images[Math.floor(Math.random() * images.length)] + ')'});

jQuery('.header-logo').attr("src",logos[Math.floor(Math.random() * logos.length)] );