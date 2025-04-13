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
        $('#hero-title').text(lang === 'fa' ? 'سادگی تکنولوژی برای سالمندان و کسب و کارهای کوچک' : 'Simplifying Tech for Seniors & Small Businesses');
        $('#hero-text').text(lang === 'fa' ? 'پشتیبانی آی تی قابل اعتماد، دوستانه و آسان.' : 'Reliable, friendly, and easy IT support.');
        $('#hero-btn').text(lang === 'fa' ? 'دریافت پشتیبانی آی تی' : 'Get IT Support Now');
        $('#hero-subtext').text(lang === 'fa' ? 'من اینجا هستم تا تکنولوژی را برای سالمندان و کسب‌وکارهای کوچک آسان و بدون استرس کنم.' : 'I’m here to make technology easy and stress-free for seniors and small businesses.');
        $('#services-title').text(lang === 'fa' ? 'خدمات' : 'Our Services');
        $('#contact-title').text(lang === 'fa' ? 'تماس با ما' : 'Contact Us');
        $('#community-title').text(lang === 'fa' ? 'پرسش و پاسخ جامعه' : 'Community Q&A');
        $('#social-title').text(lang === 'fa' ? 'شبکه‌های اجتماعی' : 'Social');
        $('#blog-title').text(lang === 'fa' ? 'وبلاگ' : 'Blog');
        $('#subscribe-title').text(lang === 'fa' ? 'اشتراک' : 'Subscribe');
        $('#community-form input[name="submitter_name"]').attr('placeholder', lang === 'fa' ? 'نام' : 'Name');
        $('#community-form input[name="submitter_email"]').attr('placeholder', lang === 'fa' ? 'ایمیل (اختیاری)' : 'Email (optional)');
        $('#community-form input[name="submitter_phone"]').attr('placeholder', lang === 'fa' ? 'تلفن (اختیاری)' : 'Phone (optional)');
        $('#community-form textarea[name="question"]').attr('placeholder', lang === 'fa' ? 'سوال خود را اینجا بپرسید...' : 'Ask your question here...');
        $('#submit-question').text(lang === 'fa' ? 'ارسال سوال' : 'Submit Question');
        $('#youtube-popup p').text(lang === 'fa' ? 'برای به‌روز ماندن با آخرین ویدیوهای ما اشتراک کنید!' : 'Subscribe to stay updated with our latest videos!');
        $('#subscribe-now').text(lang === 'fa' ? 'اکنون اشتراک کنید' : 'Subscribe Now');
        $('#subscribe-prompt p').text(lang === 'fa' ? 'لطفاً ابتدا در کانال یوتیوب ما اشتراک کنید!' : 'Please subscribe to our YouTube channel first!');
        $('#subscribe-prompt .subscribe-button').text(lang === 'fa' ? 'اکنون اشتراک کنید' : 'Subscribe Now');
        $('#prompt-close').text(lang === 'fa' ? 'بستن' : 'Close');
        $('.nav-button .nav-text').text(lang === 'fa' ? 'بخش بعدی' : 'Next Section'); // Initial text
        $('.home-button').text(lang === 'fa' ? 'خانه' : 'Home');
        setCookie('language', lang, 30);
    }

    var lang = getCookie('language') || (window.location.search.includes('lang=fa') ? 'fa' : 'en');
    switchLang(lang);

    $('.lang-flag-link').on('click', function(e) {
        e.preventDefault();
        var lang = $(this).data('lang');
        switchLang(lang);
    });

    // --- Smooth Scrolling for Desktop Menu ---
    function bindSmoothScroll() {
        var $links = $('.nav-menu .nav-menu-items a');
        console.log('Binding smooth scroll to desktop menu links:', $links.length);

        $links.off('click').on('click', function(e) {
            e.preventDefault();
            var target = $(this).attr('href');
            console.log('Clicked desktop menu link target:', target);

            if (target && $(target).length) {
                var langFlagsHeight = $('.lang-flags').outerHeight(true) || 0;
                var navMenuHeight = $('.nav-menu').outerHeight(true) || 0;
                var totalHeaderHeight = langFlagsHeight + navMenuHeight;
                var targetPosition = $(target).offset().top - totalHeaderHeight;

                console.log('Lang flags height:', langFlagsHeight, 'Nav menu height:', navMenuHeight, 'Total header height:', totalHeaderHeight, 'Target position:', targetPosition);

                $('html, body').stop().animate({
                    scrollTop: targetPosition
                }, 800);
            } else {
                console.log('Target not found:', target);
            }
        });
    }

    bindSmoothScroll();
    setTimeout(bindSmoothScroll, 1000);

    // --- Mobile Navigation ---
    var sections = [
        { id: '#hero', name_en: 'Home', name_fa: 'خانه' },
        { id: '#subscribe', name_en: 'Subscribe', name_fa: 'اشتراک' },
        { id: '#services', name_en: 'Services', name_fa: 'خدمات' },
        { id: '#blog', name_en: 'Blog', name_fa: 'وبلاگ' },
        { id: '#community', name_en: 'Community', name_fa: 'جامعه' },
        { id: '#contact', name_en: 'Contact', name_fa: 'تماس' },
        { id: '#social', name_en: 'Social', name_fa: 'اجتماعی' },
        { id: '.site-footer', name_en: 'Footer', name_fa: 'پاورقی' }
    ];
    var currentSectionIndex = 0;

    $('.nav-button').on('click', function() {
        var langFlagsHeight = $('.lang-flags').outerHeight(true) || 0;
        var navMenuHeight = $('.nav-menu').outerHeight(true) || 0;
        var totalHeaderHeight = langFlagsHeight + navMenuHeight;
        var homeButtonHeight = $('.home-button').outerHeight(true) || 0;

        currentSectionIndex = (currentSectionIndex + 1) % sections.length;
        var target = sections[currentSectionIndex].id;
        var targetPosition;

        if (target === '.site-footer') {
            targetPosition = $(target).offset().top - totalHeaderHeight;
        } else {
            targetPosition = $(target).offset().top - totalHeaderHeight;
        }

        // Update button text (only .nav-text, arrow stays)
        var newText = lang === 'fa' ? sections[currentSectionIndex].name_fa : sections[currentSectionIndex].name_en;
        $(this).find('.nav-text').text(newText);

        console.log('Navigating to:', target, 'Position:', targetPosition, 'New button text:', newText);

        $('html, body').stop().animate({
            scrollTop: targetPosition
        }, 800);
    });

    $('.home-button').on('click', function() {
        var langFlagsHeight = $('.lang-flags').outerHeight(true) || 0;
        var navMenuHeight = $('.nav-menu').outerHeight(true) || 0;
        var totalHeaderHeight = langFlagsHeight + navMenuHeight;

        currentSectionIndex = 0; // Reset to Home
        var targetPosition = $('#hero').offset().top - totalHeaderHeight;

        // Reset Navigate button text
        $('.nav-button .nav-text').text(lang === 'fa' ? 'بخش بعدی' : 'Next Section');

        console.log('Scrolling to Home, Position:', targetPosition);

        $('html, body').stop().animate({
            scrollTop: targetPosition
        }, 800);
    });

    // --- Sticky Navigation ---
    $(window).on('scroll', function() {
        var $navMenu = $('.nav-menu');
        var scrollThreshold = 10;
        if ($(window).scrollTop() > scrollThreshold) {
            $navMenu.addClass('nav-scrolled');
        } else {
            $navMenu.removeClass('nav-scrolled');
        }
    });
    $(window).trigger('scroll');

    // --- YouTube Popup ---
    if (!getCookie('youtube_popup_dismissed')) {
        $('#youtube-popup').fadeIn();
    }
    $('#popup-close').on('click', function() {
        $('#youtube-popup').fadeOut();
        setCookie('youtube_popup_dismissed', 'true', 30);
    });
    $('#subscribe-now').on('click', function() {
        setCookie('youtube_popup_dismissed', 'true', 30);
    });
    $(document).on('click', function(e) {
        if ($(e.target).hasClass('youtube-popup')) {
            $('#youtube-popup').fadeOut();
            setCookie('youtube_popup_dismissed', 'true', 30);
        }
    });

    // --- Service Description Expand ---
    $('.service-link').on('click', function(e) {
        e.preventDefault();
        var $desc = $(this).next('.service-desc');
        $('.service-desc').not($desc).slideUp();
        $desc.slideToggle();
    });

    // --- Community Question Submission ---
    $('#submit-question').on('click', function() {
        if (!getCookie('youtube_subscribed')) {
            $('#subscribe-prompt').fadeIn();
        } else {
            submitQuestion();
        }
    });
    $('#prompt-close').on('click', function() {
        $('#subscribe-prompt').fadeOut();
    });
    $('.subscribe-prompt .subscribe-button').on('click', function() {
        setCookie('youtube_subscribed', 'true', 30);
        $('#subscribe-prompt').fadeOut();
        submitQuestion();
    });

    function submitQuestion() {
        var $form = $('#community-form');
        $.ajax({
            url: callamirAjax.ajaxurl,
            type: 'POST',
            data: $form.serialize() + '&action=submit_community_question',
            success: function(response) {
                if (response.success) {
                    alert('Question submitted successfully!');
                    $form[0].reset();
                    location.reload();
                } else {
                    alert('Error submitting question: ' + (response.data || 'Unknown error'));
                }
            },
            error: function(xhr, status, error) {
                alert('AJAX error: ' + error);
            }
        });
    }

    console.log('jQuery loaded:', typeof jQuery !== 'undefined' ? 'Yes' : 'No');
    console.log('Initial desktop menu links found:', $('.nav-menu .nav-menu-items a').length);
});