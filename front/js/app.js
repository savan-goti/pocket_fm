$(document).ready(() => {
    $('#hamburger-menu').click(() => {
        $('#hamburger-menu').toggleClass('active')
        $('#nav-menu').toggleClass('active')
    })

    // setting owl carousel

    let navText = ["<i class='bx bx-chevron-left'></i>", "<i class='bx bx-chevron-right'></i>"]

    $('.hero-slider').owlCarousel({
        loop: false,
        margin: 0,
        dots: true,
        nav: true,
        autoplay: false,
        items: 1,
        video: true
    });
    $(".owl-carousel").owlCarousel({
        loop: true,
        dots:false,
        margin: 0,
        nav: false,
        autoWidth:225,
        // autoWidth:true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

    $('.hero-carousel').owlCarousel({
        items: 1,
        dots: false,
        loop: true,
        nav:true,
        // navText: navText,
        autoplay: true,
        autoplayHoverPause: true
    })

    $('.top-movies-slide').owlCarousel({
        items: 2,
        dots: false,
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
            500: {
                items: 3
            },
            600: {
                items: 4
            },
            1280: {
                items: 5
            },
            1600: {
                items: 6
            }
        }
    })

    $('.movies-slide').owlCarousel({
        items: 2,
        dots: false,
        nav:true,
        navText: navText,
        margin: 15,
        responsive: {
            500: {
                items: 3
            },
            600: {
                items: 4
            },
            1280: {
                items: 5
            },
            1600: {
                items: 6
            }
        }
    })
})