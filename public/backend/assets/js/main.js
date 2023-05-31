  $(document).ready(function(){
      $('.carousel_testimonial .owl-carousel').owlCarousel({
          loop: true,
          dots: true,
          nav: false,
          smartSpeed: 500,
          autoHeight: false,
          autoplay: true,
          responsive: {
              0: {
                  items: 1,
                  autoplay: true,
              }
          }
      });
   });