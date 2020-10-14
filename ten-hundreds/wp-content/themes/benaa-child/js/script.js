/* Javascript */
const $ = jQuery;
$(document).ready(function (){
  //pp
  //$("body > *:last-child").after('<div class="pixel-perfect" style="background-image: url(wp-content/themes/benaa-child/screen/main.png);"></div>');
  $("body > *:last-child").after('<div class="pixel-perfect"></div>');

  //header-parallax wrap
  $('.header-parallax').wrapAll('<div class="header-parallax-wrap"></div>');

  //sInfastructura wrap
  $('.sIfrastructura__left-col-js').parent().addClass('sIfrastructura__row');

  //junk
  let smth = document.querySelectorAll('.show-itself-js');
  console.log(smth);

  //tabs
  let tab = 'tabs';
  $('.' + tab + '__caption').on('click', '.' + tab + '__btn', function (e) {
    //console.log(this);
    if ($(this).hasClass('active')) return
  	$(this)
  		.addClass('active').siblings().removeClass('active')
  		.closest('.' + tab).find('.' + tab + '__content').hide().removeClass('active')
  		.eq($(this).index()).fadeIn().addClass('active');
  });

});
/*
* sPlanBaner__consult-btn
* */

