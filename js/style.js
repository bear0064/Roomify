jQuery(document).ready(function ($) {
    //if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
    var MQL = 1170;

    //primary navigation slide-in effect
    if ($(window).width() > MQL) {
        var headerHeight = $('.cd-header').height();
        $(window).on('scroll', {
                previousTop: 0
            },
            function () {
                var currentTop = $(window).scrollTop();
                //check if user is scrolling up
                if (currentTop < this.previousTop) {
                    //if scrolling up...
                    if (currentTop > 0 && $('.cd-header').hasClass('is-fixed')) {
                        $('.cd-header').addClass('is-visible');
                    } else {
                        $('.cd-header').removeClass('is-visible is-fixed');
                    }
                } else {
                    //if scrolling down...
                    $('.cd-header').removeClass('is-visible');
                    if (currentTop > headerHeight && !$('.cd-header').hasClass('is-fixed')) $('.cd-header').addClass('is-fixed');
                }
                this.previousTop = currentTop;
            });
    }

    //open/close primary navigation
    $('.cd-primary-nav-trigger').on('click', function () {
        $('.cd-menu-icon').toggleClass('is-clicked');
        $('.cd-header').toggleClass('menu-is-open');

        //in firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
        if ($('.cd-primary-nav').hasClass('is-visible')) {
            $('.cd-primary-nav').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
                $('body').removeClass('overflow-hidden');
            });
        } else {
            $('.cd-primary-nav').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
                $('body').addClass('overflow-hidden');
            });
        }

        // primary navigation background fade
        if ($('.primary-nav-fade').hasClass('is-visible')) {
            $('.primary-nav-fade').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
                $('body').removeClass('overflow-hidden');
            });
        } else {
            $('.primary-nav-fade').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
                $('body').addClass('overflow-hidden');
            });
        }
    });

    $(function () {
        $(".btns").click(function () {
            $(".form-signin").toggleClass("form-signin-left");
            $(".form-signup").toggleClass("form-signup-left");
            $(".frame").toggleClass("frame-long");
            $(".signin-active").toggleClass("signin-inactive");

            $(".signup-inactive").toggleClass("signup-active");
            $(".forgot").toggleClass("forgot-left");
        });
    });

    var elements = $(".teamBox");
    var elementsInnerHtmls = [];
    var numberOfElements = elements.length;

    for (var i = 0; i < numberOfElements; i++) {
        elementsInnerHtmls.push(elements[i].innerHTML);
    }

    var checkedIndexes = [];
    for (var i = 0; i < numberOfElements; i++) {
        var randomIndex = Math.floor(Math.random() * 10) % numberOfElements;
        while (checkedIndexes[randomIndex] != undefined) {
            randomIndex = Math.floor(Math.random() * 10) % numberOfElements;
        }
        checkedIndexes[randomIndex] = true;
        elements[i].innerHTML = elementsInnerHtmls[randomIndex];
    }
});