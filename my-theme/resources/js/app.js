import $ from 'jquery';
import 'slick-slider';
import {WOW} from 'wowjs';

$(document).ready(function() {
    /*** INITIALIZE WOW JS ***/
    const wow = new WOW()
    wow.init();
    /*** END INITIALIZE WOW JS ***/
    /*** GLOBAL ***/
    const overlay = $('.overlay')
    const loader = $('.loader')

    function toggleLoading() {
        overlay.toggleClass('active')
        loader.toggleClass('active')
    }

    function toggleOverlay() {
        overlay.toggleClass('active')
    }
    /*** Project Slider ***/
    function initializeProjectItemSlider() {
        const projectSlider = $('.project-item__slider:not(.slick-initialized)')

        projectSlider.slick({
            arrows: false,
            dots: true,
            infinite: false,
            slidesToShow: 1,
            lazyLoad: 'ondemand',
        })
    }

    if($('.project-item__slider').length) {
        initializeProjectItemSlider()
    }
    /*** End Project Slider ***/

    /*** Ajax Projects ***/
    const ajaxBtn = $('.projects__show-more')

    ajaxBtn.on('click', function() {
        const currentPage = ajaxBtn.attr('data-current-page')
        const maxPage = ajaxBtn.attr('data-max-page')

        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                page: currentPage,
                action: 'projects',
            },
            beforeSend : function( ) {
               toggleLoading()
            },
            success: function(data) {
                ajaxBtn.attr('data-current-page', +currentPage + 1)
                ajaxBtn.before(data)
                initializeProjectItemSlider()
                $('.project-item.d-none').removeClass('d-none')

                if(+currentPage + 1 == maxPage) {
                    ajaxBtn.remove()
                }
            },
        }).always(function() {
            toggleLoading()
        })
    })
    /*** End Ajax Projects ***/

    /*** MOBILE MENU ***/
    const hamburgerBtn = $('.hamburger-btn')
    const closeMenuBtn = $('.mobile-menu__close-btn')
    const mobileMenu = $('.mobile-menu')

    function openMenu() {
        toggleOverlay()
        mobileMenu.addClass('active')
    }

    function closeMenu() {
        toggleOverlay()
        mobileMenu.removeClass('active')
    }

    hamburgerBtn.on('click', openMenu)
    closeMenuBtn.on('click', closeMenu)

    overlay.on('click', function() {
        if($('*.active:not(.overlay)').length) {
            $('*.active').toggleClass('active')
        }
    })
    /*** END MOBILE MENU ***/
})