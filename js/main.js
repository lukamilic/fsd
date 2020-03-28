jQuery(document).ready(function($) {
    $('.owl-carousel').owlCarousel({
        loop: true,
		margin:10,
        nav:true,
        pagination: true,
        dots: true,
		items: 1,
		navText : ["<div class='arrow-right'></div>","<div class='arrow-left'></div>"]
    })

    $('.owl-carousel1').owlCarousel({
        loop: true,
		margin:10,
        nav:true,
        pagination: true,
        dots: true,
		items: 1      
    })

    $('#nav-icon1').click(function(){
        $(this).toggleClass('open');
        if ($('.show').hasClass('d-md-none')) {
            $('.show').removeClass('d-md-none')
        } else {
            // $('.show').addClass('d-md-none')
        }
        $('.show').toggle('fast');
    });
    
    var distance = $('.site-header').offset().top;
    $window = $(window);
    $window.scroll(function () {
        var windowWith = window.innerWidth;
        if ($window.scrollTop() >= distance + 1 && windowWith > 992) {
            $('.site-header').addClass('sticky-nav');
        } else {
            $('header.site-header').removeClass('sticky-nav');
        }
    });
});
