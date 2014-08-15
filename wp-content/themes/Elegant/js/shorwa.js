// Javascrip Hover Effect

$(document).ready(function(){
$(".portfolio-contenta img, .portfolio-content.port-thumba img, .port-thumb2a img, .port-thumb3a img, .latest-itema img, .latest-item img, .footer-ttba img, .footer-ttb img, .footer-social-icona img, .footer-social-icon img").fadeTo("slow", 1.0);
$(".portfolio-contenta img, .portfolio-content img,.port-thumba img, .port-thumb img, .port-thumb2a img, .port-thumb2 img, .port-thumb3a img, .port-thumb3 img, .latest-itema img, .latest-item img, .footer-ttba img, .footer-ttb img, .footer-social-icona img, .footer-social-icon img").hover(function(){
$(this).fadeTo("fast", 0.5);
},function(){
$(this).fadeTo("slow", 1.0);
});
});









