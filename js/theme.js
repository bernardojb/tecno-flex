;(function($){
    "use strict"


    var nav_offset_top = $('header').height() + 10; 
/*-------------------------------------------------------------------------------
Navbar 
-------------------------------------------------------------------------------*/

//* Navbar Fixed  
function navbarFixed(){
    if ( $('.header_area').length ){ 
        if($('.home').length){}else{$('.logoHeader').attr('src','img/logo.svg')}
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();   
            if (scroll >= nav_offset_top ) {
                $(".header_area").addClass("navbar_fixed");
                if($('.home').length){
                    $('.logoHeader').attr('src','img/logo.svg')
                }
            } else {
                $(".header_area").removeClass("navbar_fixed");
                if($('.home').length){
                    $('.logoHeader').attr('src','img/logo-branco.svg')
                }else{
                    $('.logoHeader').attr('src','img/logo.svg')
                }
            }
        });
    };
    
};
navbarFixed();





/*----------------------------------------------------*/
/*  Parallax Effect js
/*----------------------------------------------------*/
function parallaxEffect() {
    $('.bg-parallax').parallax();
}
parallaxEffect();




if(document.getElementById("number-section")){
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });
}


//------- Owl Carusel  js --------//




$(document).ready(function() {


/*-------------------------------------------------------------------------------
Testimonial Slider 
-------------------------------------------------------------------------------*/

$('.testi_slider').owlCarousel({
    loop: true,
    margin: 30,
    items: 1,
    nav: false,
    autoplay: 2500,
    smartSpeed: 1500,
    dots: true,
    responsiveClass: true
})


/*-------------------------------------------------------------------------------
Brand Slider 
-------------------------------------------------------------------------------*/
$(".brand-carousel").owlCarousel({
    items: 1,
    autoplay:true,
    loop:true,
    nav:false,
    margin: 30,
    dots:false,
    responsive: {
        0: {
            items: 1,
        },
        420: {
            items: 1,
        },
        480: {
            items: 3,
        },
        768: {
            items: 3,
        },
        992: {
            items: 4,
        }
    }
});

// Search Toggle
$("#search_input_box").hide();
$("#search").on("click", function () {
    $("#search_input_box").slideToggle();
    $("#search_input").focus();
});
$("#close_search").on("click", function () {
    $('#search_input_box').slideUp(500);
});

});




//------- mailchimp --------//  
function mailChimp() {
    $('#mc_embed_signup').find('form').ajaxChimp();
}
mailChimp();

//-------- Counter js --------//
$(window).on("load", function() {


    $('.portfolio-filter ul li').on('click', function () {
        $('.portfolio-filter ul li').removeClass('active');
        $(this).addClass('active');

        var data = $(this).attr('data-filter');
        $workGrid.isotope({
            filter: data
        });
    });

    if (document.getElementById('portfolio')) {
        var $workGrid = $('.portfolio-grid').isotope({
            itemSelector: '.all',
            percentPosition: true,
            masonry: {
                columnWidth: '.grid-sizer'
            }
        });
    }
});


})(jQuery)