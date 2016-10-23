jQuery(document).ready(function(){

$('div.message').slideDown("slow");
$('div.message').delay(4000).slideUp("slow");
jQuery('.link-toggle-1').click(function(){
        $('.toggle-1').slideToggle();

    });
jQuery('.link-toggle-3').click(function(){
        $('.secondHeader').slideToggle();

    });
// $(window).resize(function() {
//     $width = $(window).width();
//     if($width<480){
//         $('div.mainHeader').hidden();
//         $('div.secondHeader').hidden();
//         $('div.secondHeader').hidden();

//         $('span.link-toggle-1').css('display','block');
//         $('div.link-toggle-2').css('display','block');
//         $('div.link-toggle-3').css('display','block');
//     }
//     $('div.link-toggle-1').click(function(){
//         $('toggle-1').slideToggle();

//     });
//     $('div.link-toggle-3').click(function(){
//         $('toggle-3').slideToggle();

//     });

//     });
});