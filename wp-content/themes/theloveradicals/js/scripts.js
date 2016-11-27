(function ($, root, undefined) {

	$(function () {

		'use strict';

		// setup some additional Bootstrap CSS classes
    $('.aside-block .link-icons').addClass('pull-right');
    $('.mapi.edit-link').addClass('text-right');
    $('.wp-caption-text, .gfield_description').addClass('text-muted');
    $('.button, .button-primary, .field input[type="submit"], #wp-submit').addClass('btn');
    $('.login p.error').addClass('alert alert-error');
    $('.login p.message').addClass('alert alert-info');

    // tables
    $('#main table, .form-table').addClass('table table-hover');

    // wordpress classes
    $('.alignleft').addClass('text-left');
    $('.alignright').addClass('text-right');
    $('.aligncenter').addClass('text-center');

    // here for each comment reply link of wordpress
    $('.comment-reply-link').addClass('btn btn-primary');

    // here for the submit button of the comment reply form
    $('#commentsubmit').addClass('btn btn-primary');
    $('#commentform').addClass('form-inline');
    $('#comments').find('input').addClass('form-control');

    // the search widget
    $('input.search-field, .textwidget select, .widget_archive select').addClass('form-control');

    $('.post-template-sticky .sticky').addClass('jumbotron');
    $('.widget_rss ul').addClass('media-list');
    $('.widget_rss li').addClass('media');
    $('.widget_rss li a.rsswidget').addClass('media-heading');

		$('table#wp-calendar').addClass('table table-striped');


		function setSize() {
	    var windowHeight = $(window).innerHeight();
				$('.left-head').css('height', windowHeight);
        $('.featured-images').css('height', windowHeight);
        $('.slick-slider').css('height', windowHeight);
	  };
	  setSize();

		$(window).scroll(function(){
		    $(".fade-scroll").css("opacity", 1 - $(window).scrollTop() / 250);
		});


	  $(window).resize(function() {
	    setSize();
	  });

		$(document).ready(function(){
		  $('.side-image').slick({
		    autoplay: true,
				infinite: true,
			  speed: 500,
			  fade: true,
			  cssEase: 'linear'

		  });
		});






	});





})(jQuery, this);
