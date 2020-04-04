$(document).ready(function(){
    $(".main-content .owl-carousel").owlCarousel({
        dots: false,
        loop: true,
        margin: 25,
        pagination: false,
        nav: true,
        navText: [
            '<i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>'
        ],
        navContainer: '.main-content .custom-nav',
        responsive:{
            0:{
                items:1
            },
            1000:{
                items:3
            },
        }
    });
});
