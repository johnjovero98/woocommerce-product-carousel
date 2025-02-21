document.addEventListener("DOMContentLoaded", function() {
    new Swiper('.wc-product-slider', {
        slidesPerView: 4,
        spaceBetween: 20,
        loop: true,
        // autoplay: {
        //     delay: 3000,
        //     disableOnInteraction: false
        // },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        touchEventsTarget: 'container', // Ensure touch interactions are enabled
        simulateTouch: true, // Enable touch interactions on desktop
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 54
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 54
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 54
            }
        }
    });
});