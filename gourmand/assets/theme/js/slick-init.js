jQuery(function(){

    /**
     *  Init Slick Slideshow
     */
     
     jQuery( 'div.gourmand-banner-wrapper' ).slick({
         centerMode: false,
         focusOnSelect: false,
         initialSlide: 0,
         speed: 200,
         infinite: true,
         autoplay: true,
         autoplaySpeed: 2000,
         centerPadding: '0px',
         slidesToShow: 1,
         arrows: false,
         dots : true,
         adaptiveHeight: true,
         responsive: [{
             breakpoint: 1099,
             settings: {
                 slidesToShow: 1
             }
         }]
     });
});
