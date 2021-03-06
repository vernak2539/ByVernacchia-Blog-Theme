$(function() {

  // initializing pretty print for entire site
  window.prettyPrint && prettyPrint(); 

  // defining variables for later use since they will be hoisted anyway because they aren't inside a function
  var topOffset = parseInt($('.main-logo').css('marginTop')) + parseInt($('.main-logo').css('marginBottom')) + parseInt($('.main-logo img').attr('height')),
        $window = $(window),
      $stickyEl = $('.navbar');

  // giving content padding when navbar changes to fixed and loses height  
  var elTop = $stickyEl.offset().top;

  $window.scroll(function() {
    var navBarTop = $window.scrollTop();
    $('.navbar').next().toggleClass('content-fixed-padding', navBarTop > topOffset);
    $('body').toggleClass('scroll-shadow', navBarTop > topOffset);
  });

  // bootstrap fixing top nav when offset is higher than topOffset
  $('.navbar').affix({ offset: { top: topOffset } });

  // tooltip sstuff
  $('a[rel=tooltip]').tooltip();

  $('.form-search').submit(function() {
    if($(this).find('input[type=text]').val() === "") {
      return false;
    }
  });

  // popovers 
  $('a[rel=popover]').popover({
    delay: { 
      show: 100, 
      hide: 0 
    },
    trigger: 'hover',
    placement: function() {
      if($(window).scrollTop() > 120) {
        return "bottom";
      } else {
        return "top";
      }
    },
    animation: true,
    html: true
  });

  // making links unclickable
  $('.unclickable').css({'cursor': 'default'});
  $('.unclickable').click(function(e) {
    e.preventDefault();
    return false;
  });

  // TAKE OUT IF USING REAL NAV
  $('.nav > li > a').click(function() {
    if($(this).attr('href') === "#") {
      $('#not-blog-alert').show();
      return false;
    }
  });

});

