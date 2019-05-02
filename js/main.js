jQuery(document).ready(function($) {

  // maintenance of slide Lising
  ;(function(){

      // functions for slider Calculate Lising Dates  ***********************  
    function sliderLoad(name){
      elem = document.getElementById(name);

      // define variables
      var slides = elem.querySelectorAll('.item-slide');
      var currentSlide = 0;
        // define width of slider
      var scrollWidth = checkWidth(name);
      var next = document.getElementById('rightCtrl');
      var prev = document.getElementById('leftCtrl');
      var qtyElem = slides.length;
      var lenOfInner = scrollWidth * qtyElem;
      sliderInner.style.width = lenOfInner + "px";

        // in mobile version we should make width for el 'item-slide'
      if(checkWidth(name) < 768){

        for (var i = 0; i < slides.length; i++) {
          slides[i].style.width = scrollWidth + 'px';
        }

      } else {

        for (var i = 0; i < slides.length; i++) {
          slides[i].style.width = scrollWidth + 'px';
        }

      }

        // check width of slider
      function checkWidth(name){
        var elWidth = Math.max(
          document.getElementById(name).offsetWidth, document.getElementById(name).clientWidth
          );
        return elWidth;
      };

        //change width of window on resize window
      document.body.onresize = function(){
        scrollWidth = checkWidth(name);
      }

        // main function that move slides with css property left
      function goToSlide(n, winWidth) {
          // change class name in item-slide
        slides[currentSlide].className = 'item-slide';
        currentSlide = (n + slides.length)%slides.length;
        slides[currentSlide].className = 'item-slide showing';
        var slOffset = 0;
        var ctrlBut = document.getElementById('ctrlSlider');

        slOffset = winWidth;
        //define styles and classes for buttons and sliderInner block
        // the first slide
        if( currentSlide == 0 ) {
          if ( name == 'sliderEight') {
            ctrlBut.querySelector('.paging span').textContent = currentSlide + 1;
          }
          sliderInner.style.left = (slOffset * currentSlide) + "px";
          leftCtrl.setAttribute("disabled", "disabled");
          leftCtrl.className = 'slide-control left-ctrl dis';
          rightCtrl.className = 'slide-control right-ctrl';
          // the last slide
        } else if( currentSlide == qtyElem -1 ) {

          if( name != 'sliderLch' ) {
            wrResp.classList.add('resp-open');
            setTimeout(function(){
              wrResp.classList.remove('resp-open');
            }, 6000);
          }

          if ( name == 'sliderEight') {
            ctrlBut.classList.add('lasty');
          }

          sliderInner.style.left = "-" + (slOffset * currentSlide) + "px";
          leftCtrl.className = 'slide-control left-ctrl';
          rightCtrl.className = 'slide-control right-ctrl dis';
          rightCtrl.setAttribute("disabled", "disabled");
          // other slides
        } else {
          if ( name == 'sliderEight') {
            ctrlBut.querySelector('.paging span').textContent = currentSlide + 1;
          }
          sliderInner.style.left = "-" + (slOffset * currentSlide) + "px";
          leftCtrl.removeAttribute("disabled");
          rightCtrl.removeAttribute("disabled");
          leftCtrl.className = 'slide-control left-ctrl';
          rightCtrl.className = 'slide-control right-ctrl';

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
      sliderLoad('sliderLch');
    } else if(location.pathname == '/for-4-steps/') {
      sliderLoad('sliderFour');
    } else if(location.pathname == '/for-8-steps/') {
      sliderLoad('sliderEight');
    }

  })();

    // make mask for input in forms (plugin maskedinput)
  $(".wpcf7-tel").mask("+375 (99) 999-99-99");

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

    // sticky header, Mobile menu code and other *********************/
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

      // change value of input in calculator Summ of Credit
    $('#priceAuto').on('change', function(){
      var prAuto = $('#priceAuto');
      var maxAuto = +prAuto.attr('max');
      var minAuto = +prAuto.attr('min');
      var val = +prAuto.val();
      var sl = $('#costAuto');

      sl.slider('value', val);
      sl.find('.slider-tooltip').text(val);

      if( val > maxAuto ) {
        prAuto.val(maxAuto);
        $('#costAuto').slider('option', maxAuto);
      } else if( val < minAuto ) {
        prAuto.val(minAuto);
      }
    });

      // change value of input if we change slider
    $('#costAuto').on('slidechange', function(e, ui){
      var cost = ui.value;
      $('#priceAuto').val(cost);
    });

      // change value of input in calculator Your Age
    $('#yourAge').on('change', function(){
      var yoAge = $('#yourAge');
      var maxAge = +yoAge.attr('max');
      var minAge = +yoAge.attr('min');
      var val = +yoAge.val();
      var sl = $('#yourAgeSl');

      sl.slider('value', val);
      sl.find('.slider-tooltip').text(val);

      if( val > maxAge ) {
        yoAge.val(maxAge);
        $('#yourAgeSl').slider('option', maxAge);
      } else if( val < minAge ) {
        yoAge.val(minAge);
      }
    });

      // change value of input if we change slider
    $('#yourAgeSl').on('slidechange', function(e, ui){
      var cost = ui.value;
      $('#yourAge').val(cost);
    });

    // change value of input in calculator level Profit
    $('#levelProfit').on('change', function(){
      var yoProf = $('#levelProfit');
      var maxProf = +yoProf.attr('max');
      var minProf = +yoProf.attr('min');
      var val = +yoProf.val();
      var sl = $('#levelProfitSl');

      sl.slider('value', val);
      sl.find('.slider-tooltip').text(val);

      if( val > maxProf ) {
        yoProf.val(maxProf);
        $('#levelProfitSl').slider('option', maxProf);
      } else if( val < minProf ) {
        yoProf.val(minProf);
      }
    });

      // change value of input if we change slider
    $('#levelProfitSl').on('slidechange', function(e, ui){
      var prof = ui.value;
      $('#levelProfit').val(prof);
    });

      // don`t send form on push enter
      $('#cf-8steps').keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
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

    // maintenance of popup
  (function(){
      // open popup link   ***********************/
    var bopy = $('.bibop');
    $('#pop-js').on('click touchend', function(e) {
      bopy.css('display', 'block').show().animate({ opacity: 1 }, 350);
      e.preventDefault(); 
    });
  
    // popUp with form   ***********************/
    $('#blanket').on('click touchend', function() {
      bopy.animate({ opacity: 0 }, 350);
      setTimeout(function() {
        bopy.css('display', 'none');
      }, 350);
    });
    $('.close').on('click touchend', function() {
      bopy.animate({ opacity: 0 }, 350);
      setTimeout(function() {
        bopy.css('display', 'none');
      }, 350);
    });
  })();

    // smoth scrolling *************************/
  (function(){
    if(location.pathname == '/') {
      $("#top_nav").on("click","a", function (e) {
        var h = $('#masthead').height();
        e.preventDefault();
        var ido  = $(this).attr('href'), topo = $(ido).offset().top - h;
        $('body,html').animate({scrollTop: topo}, 1500);   
      });
    } else {
      var origo = location.origin;
      $("#top_nav").on("click","a", function (e) {
        var hasho  = $(this).attr('href');
        location.href = origo + hasho;
      });
    }
  })();

    // fire plugin esqu *************/
  new ScrollFlow();

    // maintenance of jqueryUI ranges ***********************/
  (function(){
    var sliderAuto, costAuto, camin, camax,
    sliderAvans, avansAuto, aamin, aamax, percent;

    function init(){
      percent = 4;
      sliderAuto = $('#costAuto');
      sliderAvans = $('#avansAuto');

      sliderAuto.on('slidecreate', function(e, ui){
        camin = sliderAuto.slider('option', 'min');
        camax = sliderAuto.slider('option', 'max');
        costAuto = sliderAuto.slider('option', 'value');
      });

      sliderAvans.on('slidecreate', function(e, ui){
        aamin = sliderAvans.slider('option', 'min');
        aamax = sliderAvans.slider('option', 'max');
        avansAuto = sliderAvans.slider('option', 'value');
      });
      
      changeAuto();
      changeAvans();
    }

    function changeAuto(){
      sliderAuto.on('slidechange', function(e, ui){
        var tav;  // tmp var for val of sliderAvans
        tav = ui.value/percent;
        
        sliderAvans.slider("value", tav);
        sliderAvans.find('.slider-tooltip').text(tav);
      });
    }

    function changeAvans() {
      sliderAvans.on('slidechange', function(e, ui){
        var ta;  // minimal avans for this car
        var t;  // cost of auto from sliderAuto
        t = sliderAuto.slider('value');
        ta = t / percent;

        if(ui.value < ta) {
          sliderAvans.slider('value', ta);
          sliderAvans.find('.slider-tooltip').text(ta);
        }

        if(ui.value > t) {
          sliderAvans.slider('value', t);
          sliderAvans.find('.slider-tooltip').text(t);
        }
      });
    }

    init();

  })();

});