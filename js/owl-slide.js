
jQuery(function($){
    $('.owl-carousel').owlCarousel({
        loop: true,
        lazyLoad: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        center: true,
        stagePadding: 20,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            768: {
                items: 2
            },
            1000: {
                items: 3
            },
        }
    })
});