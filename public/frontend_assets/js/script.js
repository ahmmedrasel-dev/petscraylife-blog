$(function () {

  // Slider For Post

  $('.slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    autoplay: true,
    prevArrow: '<i class="fas fa-chevron-left prevArrow"></i>',
    nextArrow: '<i class="fas fa-chevron-right nextArrow"></i>',
    autoplaySpeed: 2000,
  });

  // Back to Top Button Fade In and Fade Out
  $(window).scroll(function () {
    let scrolling = $(this).scrollTop();

    if (scrolling > 300) {
      $('.backToTop').fadeIn();
    } else {
      $('.backToTop').fadeOut();
    }
  });

  // Back to bottom Button Action.

  $('.backToTop').click(function () {
    $('html, body').animate({
      scrollTop: 0,
    }, 2000)
  })

})