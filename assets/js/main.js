"use strict";

$(document).ready(function () {
  setTimeout(hidePreloader, 500);
  offerSliderInit();
  portfolioSliderInit();
  singlePortfolioSlider();
  sertificateSlider();
});

function hidePreloader() {
  var loader = $('.loader');
  var leftBgPart = $('.screen-bg__left');
  var rightBgPart = $('.screen-bg__right');
  var loaderElement = $('.loader__elems');
  loaderElement.hide(500);
  leftBgPart.addClass('screen-bg__left--loaded');
  rightBgPart.addClass('screen-bg__right--loaded');
  setTimeout(function () {
    loader.css('display', 'none');
  }, 3000);
}
/*Show Top Menu*/


$('.top-nav-icon').on('click', function () {
  var nav = $('.top-nav');
  $(this).toggleClass('active');
  nav.toggleClass('active');
});
/*Hide top menu*/

$(window).scroll(function () {
  var menuIcon = $('.top-nav-icon');
  var nav = $('.top-nav');

  if (nav.length !== 0) {
    var posY = nav.offset().top;

    if (posY > 20 && nav.hasClass('active')) {
      nav.toggleClass('active');
      menuIcon.toggleClass('active');
    }
  }
});
/*show/hide popup form*/

$('.offer__btn').on('click', function () {
  var modal = $('.modal-wrapper');
  modal.fadeIn();
});
$('.contact-form__close').on('click', function () {
  var modal = $('.modal-wrapper');
  modal.fadeOut();
});
/*Owl carousel init*/

function offerSliderInit() {
  $('#offer-slider').owlCarousel({
    loop: false,
    margin: 10,
    nav: true,
    items: 1,
    dots: true,
    animateOut: 'fadeOut'
  });
}

function portfolioSliderInit() {
  $('#portfolio-slider').owlCarousel({
    loop: false,
    margin: 10,
    nav: true,
    items: 1,
    dots: true
  });
}

function singlePortfolioSlider() {
  $('#singPortfolio').owlCarousel({
    items: 1,
    dots: false,
    thumbs: true,
    thumbsPrerendered: true
  });
}

function sertificateSlider() {
  $('#sertif-slider').owlCarousel({
    loop: false,
    margin: 10,
    nav: false,
    items: 1,
    dots: true
  });
}
/*Portfolio filter*/


$('#filter li').on('click', function () {
  var listItems = $('#filter li');
  var activeCat = $(this).text();
  var liItems = $('[data-cat]');
  listItems.each(function () {
    $(this).removeClass('active');
  });
  $(this).addClass('active');

  if (activeCat === 'Все') {
    liItems.each(function () {
      $(this).show();
    });
  } else {
    liItems.each(function () {
      var attrArray = $(this).attr('data-cat').split('_');

      if (!attrArray.includes(activeCat)) {
        $(this).hide();
      } else {
        $(this).show();
      }
    });
  }
});
/*Show / Hide search modal*/

$('#search-modal').on('click', function () {
  var searchModal = $('.search-modal');
  searchModal.show(300);
  searchModal.addClass('in');
});
$(document).on('click', function (e) {
  var searchIcon = $('.search__icon');
  var searchModal = $('.search-modal');
  var searchInput = $('.search-form__input');

  if (!searchModal.is(e.target) && !searchIcon.is(e.target) && !searchInput.is(e.target)) {
    searchModal.hide(300);
  }
});
