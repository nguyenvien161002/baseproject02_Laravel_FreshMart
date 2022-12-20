// <!-- Initialize Swiper -->
var cateSwiper = new Swiper(".cateSwiper", {
    loop: true,
    slidesPerView: 2,
    spaceBetween: 10,
    breakpoints: {
        450: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 6,
            spaceBetween: 24,
        },
    },
});

var steightSwiper = new Swiper(".steightSwiper", {
    slidesPerView: 2,
    spaceBetween: 10,
    loop: true,
    breakpoints: {
        640: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 3,
            
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 24,
        },
    },
});
