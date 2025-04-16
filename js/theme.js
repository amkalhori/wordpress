jQuery(document).ready(function($) {
    // --- Cookie Functions ---
    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    // --- Language Switching ---
    function switchLang(lang) {
        document.body.dir = lang === 'fa' ? 'rtl' : 'ltr';
        var text = callamirText.text[lang];
        // Update Hero Section
        $('#hero-title').text(text.hero_title);
        $('#hero-text').text(text.hero_text);
        $('#hero-btn').text(text.hero_btn);
        $('#hero-subtext').text(text.hero_subtext);
        // Update Section Titles
        $('#services-title').text(text.services_title);
        $('#contact-title').text(text.contact_title);
        $('#community-title').text(text.community_title);
        $('#blog-title').text(text.blog_title);
        $('#subscribe-title').text(text.subscribe_title);
        // Update Popups
        $('#youtube-popup p').text(text.youtube_popup);
        $('#subscribe-now').text(text.subscribe_now);
        $('#subscribe-prompt p').text(text.subscribe_prompt);
        $('#subscribe-prompt .subscribe-button').text(text.subscribe_now);
        $('#prompt-close').text(text.prompt_close);
        // Update Navigation Buttons
        $('.nav-button .nav-text').text(text.nav_button);
        $('.home-button').text(text.home_button);
        // Update Menu Items
        $('.nav-home').text(text.menu_home);
        $('.nav-subscribe').text(text.menu_subscribe);
        $('.nav-services').text(text.menu_services);
        $('.nav-blog').text(text.menu_blog);
        $('.nav-community').text(text.menu_community);
        $('.nav-contact').text(text.menu_contact);
        // Update Language Flags
        $('.lang-flags .flag-text').text(text.flag_text);
        // Update Contact Links
        $('.contact-link.whatsapp').contents().last().replaceWith(' ' + text.whatsapp_text);
        $('.contact-link.cellphone').contents().last().replaceWith(' ' + text.cellphone_text);
        $('.contact-link.telegram').contents().last().replaceWith(' ' + text.telegram_text);
        $('.contact-link.sms').contents().last().replaceWith(' ' + text.sms_text);
        $('.contact-link.messenger').contents().last().replaceWith(' ' + text.messenger_text);
        $('.contact-link.instagram').contents().last().replaceWith(' ' + text.instagram_text);
        $('.contact-link.snapchat').contents().last().replaceWith(' ' + text.snapchat_text);
        // Update Footer Social Links
        $('.social-link[title="Facebook"]').attr('title', text.facebook_text);
        $('.social-link[title="Twitter"]').attr('title', text.twitter_text);
        $('.social-link[title="Instagram"]').attr('title', text.instagram_text);
        $('.social-link[title="LinkedIn"]').attr('title', text.linkedin_text);
        setCookie('language', lang, 30);
    }

    // Initialize language
    var lang = callamirText.lang;
    switchLang(lang);

    // Handle language flag clicks
    $('.lang-flag-link').on('click', function(e) {
        e.preventDefault();
        var lang = $(this).data('lang');
        $.ajax({
            url: callamirAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'callamir_switch_language',
                lang: lang
            },
            success: function(response) {
                if (response.success) {
                    switchLang(lang);
                    location.reload(); // Reload to ensure server-side changes apply
                } else {
                    console.error('Language switch failed');
                }
            },
            error: function() {
                console.error('AJAX error during language switch');
            }
        });
    });

    // --- Smooth Scrolling for Desktop Menu ---
    $('.nav-menu .nav-menu-items a').on('click', function(e) {
        e.preventDefault();
        var target = $(this).attr('href');
        if (target && $(target).length) {
            $('html, body').animate({
                scrollTop: $(target).offset().top - 100
            }, 800);
        }
    });

    // --- Blog Pagination Scrolling ---
    $('.blog-pagination a').on('click', function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        $.ajax({
            url: href,
            success: function(data) {
                var $newContent = $(data).find('.blog-list').html();
                var $newPagination = $(data).find('.blog-pagination').html();
                $('.blog-list').html($newContent);
                $('.blog-pagination').html($newPagination);
                $('html, body').animate({
                    scrollTop: $('#blog').offset().top - 100
                }, 800);
                history.pushState(null, null, href);
            }
        });
    });

    // --- Mobile Navigation Button ---
    var sections = ['#hero', '#subscribe', '#services', '#blog', '#community', '#contact'];
    var currentSection = 0;

    $('.nav-button').on('click', function() {
        currentSection = (currentSection + 1) % sections.length;
        $('html, body').animate({
            scrollTop: $(sections[currentSection]).offset().top - 100
        }, 800);
    });

    // --- Home Button ---
    $('.home-button').on('click', function() {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        currentSection = 0; // Reset to hero section
    });

    // --- Navigation Scroll Effect ---
    var nav = $('.nav-menu');
    var navOffset = nav.offset().top;

    $(window).on('scroll', function() {
        if ($(window).scrollTop() > navOffset) {
            nav.addClass('nav-scrolled');
        } else {
            nav.removeClass('nav-scrolled');
        }
    });

    // --- YouTube Popup ---
    var $youtubePopup = $('#youtube-popup');
    var youtubeShown = getCookie('youtube_popup_shown');

    if (!youtubeShown) {
        setTimeout(function() {
            $youtubePopup.fadeIn();
            setCookie('youtube_popup_shown', 'true', 7); // Show again after 7 days
        }, 5000); // Show after 5 seconds
    }

    $('.popup-close').on('click', function() {
        $youtubePopup.fadeOut();
    });

    $(document).on('click', function(e) {
        if ($(e.target).hasClass('youtube-popup')) {
            $youtubePopup.fadeOut();
        }
    });

    // --- Subscribe Prompt ---
    var $subscribePrompt = $('#subscribe-prompt');
    var subscribePromptShown = getCookie('subscribe_prompt_shown');

    $('.subscribe-button').on('click', function(e) {
        if (!subscribePromptShown) {
            e.preventDefault();
            $subscribePrompt.fadeIn();
            setCookie('subscribe_prompt_shown', 'true', 1); // Show again after 1 day
        }
    });

    $('#prompt-close').on('click', function() {
        $subscribePrompt.fadeOut();
    });

    $(document).on('click', function(e) {
        if ($(e.target).hasClass('subscribe-prompt')) {
            $subscribePrompt.fadeOut();
        }
    });

    // --- Service Description Toggle ---
    $('.service-link').on('click', function(e) {
        e.preventDefault();
        var $desc = $(this).siblings('.service-desc');
        $('.service-desc').not($desc).slideUp();
        $desc.slideToggle();
    });
});