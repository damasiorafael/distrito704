// Javascrip Hover Effect

$(document).ready(function(){
$(".portfolio-contenthma img, .portfolio-contenthm img").fadeTo("slow", 1.0);
$(".portfolio-contenthma img, .portfolio-contenthm img").hover(function(){
$(this).fadeTo("slow", 0.5);
},function(){
$(this).fadeTo("slow", 1.0);
});
});









