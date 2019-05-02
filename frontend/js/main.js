jQuery(document).ready(function($) {

  // maintenance of slide Lising
  ;(function(){

      // functions for slider Calculate Lising Dates  ***********************  
    function sliderLoad(){
        // define variables
      var slides = sliderLch.querySelectorAll('.item-slide');

        // in mobile version we should make width for el 'item-slide'
      if(checkWidth() < 768){
        var slWidth = sliderLch.offsetWidth;
        var i;
        for (i = 0; i < slides.length; i++) {
          slides[i].style.width = slWidth + 'px';
        }
      }

        // check width of window
      function checkWidth(){
        var elWidth = Math.max(
        document.body.scrollWidth, document.documentElement.scrollWidth,
        document.body.offsetWidth, document.documentElement.offsetWidth,
        document.body.clientWidth, document.documentElement.clientWidth
        )
        return elWidth;
      };

      var currentSlide = 0;
        // define width of window
      var scrollWidth = checkWidth();
        // get buttons
      var next = document.getElementById('rightCtrl');
      var prev = document.getElementById('leftCtrl');

        //change width of window on resize window
      document.body.onresize = function(){
        scrollWidth = checkWidth();
      }

        // main function that move slides with css property left
      function goToSlide(n, winWidth) {
          // change class name in item-slide
        slides[currentSlide].className = 'item-slide';
        currentSlide = (n+slides.length)%slides.length;
        slides[currentSlide].className = 'item-slide showing';
        var slOffset = 0;
    
        if(winWidth > 1200) {
          slOffset = 820;
        } else if(winWidth >= 992 && winWidth < 1200){
          slOffset = 820;
        } else if(winWidth >= 768 && winWidth < 992){
          slOffset = 690;
        } else if(winWidth >= 576 && winWidth < 768){
          slOffset = 480;
        } else {
          slOffset = winWidth - 20;
        }
        //define styles and classes for buttons and sliderInner block
        switch(currentSlide) {
          case 0:
          sliderInner.style.left = (slOffset * currentSlide) + "px";
          leftCtrl.className = 'control-slider left-ctrl dis';
          rightCtrl.className = 'control-slider right-ctrl';
          break;

          case 1:
          sliderInner.style.left = "-" + (slOffset * currentSlide) + "px";
          leftCtrl.className = 'control-slider left-ctrl';
          rightCtrl.className = 'control-slider right-ctrl dis';
          break;

        }
      }

      function nextSlide() {
        goToSlide(currentSlide+1, scrollWidth);
      }
    
      function previousSlide() {
          goToSlide(currentSlide-1, scrollWidth);
      }

      next.onclick = function(){
        nextSlide();
      };
    
      prev.onclick = function(){
        previousSlide();
      };
    

    }

    if(location.pathname == '/') {
      window.onload = sliderLoad;
    }

  })();

    // make mask for input in forms (plugin maskedinput)
  $(".wpcf7-tel").mask("+7 (999) 999-99-99");

    // call first carousel ********************** &rarr;
  $('.slider-main').slick({
    autoplay: false,
    autoplaySpeed: 3000,
    speed: 600,
    arrows: true,
    prevArrow: '<div class="icon-arleft"><span class="icon-vector"></span></div>',
    nextArrow: '<div class="icon-arright"><span class="icon-vector"></span></div>',
    dots: false,
    infinite: false,
  });

    // sticky header, Mobile menu code *********************/
  (function($){
    $(window).resize(function() {
      $(window).scroll(function(){
        if( $(window).scrollTop() > 40 ) {
          $('header').addClass("sticky ");
        } else {
          $('header').removeClass("sticky");
        }
      });
    }).resize();

      //  Mobile menu code   ***********************/
    $('.m-button').on('click', function(){
      $(this).toggleClass('open');
      $('.nav-holder').slideToggle(650);
      $('.top-nav').toggleClass('open');
    });
    
    $('#primary-menu').on('click', function(){
        $('.m-button').toggleClass('open');
        $('.nav-holder').slideToggle(650);
        $('.top-nav').toggleClass('open');
    });
  })(jQuery);

    // animation of auto *********************/
  (function(){
    var wow = new WOW(
      {
        animateClass: 'anime', // default
        offset:       0,          // default
        mobile:       false,       // default
      }
    )
    wow.init()
  })();

    // make accordion ***********************/
  (function(){
    var i, acc, panel;
    acc = document.getElementsByClassName("accordion");

      for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            /* Toggle between adding and removing the "active" class,
            to highlight the button that controls the panel */
            this.classList.toggle("active");

            /* Toggle between hiding and showing the active panel */
            panel = this.nextElementSibling;
            if (panel.style.maxHeight){
              panel.style.maxHeight = null;
            } else {
              panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
      }
  })();

});