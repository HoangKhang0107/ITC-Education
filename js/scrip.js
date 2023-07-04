$(document).ready(function() {
$(".owl-carousel").owlCarousel({
    autoplay : true,
    autoplayTimeout: 2200,
    loop : true,
    margin : 10,
    autoHeight : true,
    responsiveClass : true,
    responsive:{
        0:{
            items:1
        },
        680:{
            items:1
        },
        960:{
            items:1
        },
    }
});
});