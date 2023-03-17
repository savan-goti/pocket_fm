$(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
        $('.navbar').addClass('navbar-shrink');
        $('.navbar-brand').addClass('navbar-brand-shrink');
        $('.nav-link').addClass('nav-link-shrink');
    } else {
        $('.navbar').removeClass('navbar-shrink');
        $('.navbar-brand').removeClass('navbar-brand-shrink');
        $('.nav-link').removeClass('nav-link-shrink');
    }
});
