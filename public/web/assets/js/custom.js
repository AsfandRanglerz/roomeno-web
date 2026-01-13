$(document).ready(function () {

    function toggleDollarButtons() {
        let width = $(window).width();
        if (width <= 991) {
            $('.get-dollor-link-collapse').show();
            $('.header-get-dollar-anchor').hide();
        } else {
            $('.get-dollor-link-collapse').hide();
            $('.header-get-dollar-anchor').show();
        }
    }

    toggleDollarButtons();

    $(window).on('resize', function () {
        toggleDollarButtons();
    });

    $('.speaker-btn').on('click', function () {
        const video = $(this).closest('.story-video-wrapper').find('.story-video').get(0);
        const icon = $(this).find('i');

        video.muted = !video.muted;

        if (video.muted) {
            icon.removeClass('bi-volume-up').addClass('bi-volume-mute');
        } else {
            icon.removeClass('bi-volume-mute').addClass('bi-volume-up');
        }
    });

    $('.story-video-wrapper')
        .on('mouseenter', function () {
            const video = $(this).find('.story-video').get(0);
            video.muted = false;
            video.play();
        })
        .on('mouseleave', function () {
            const video = $(this).find('.story-video').get(0);
            video.pause();
            video.currentTime = 0;
        });

    $('.drop-down-item-for-languge, .dropdown-item').on('click', function (e) {
        e.preventDefault();
        var selectedText = $(this).contents().get(0).nodeValue.trim();
        var dropdownToggle = $(this).closest('.dropdown').find('.dropdown-toggle');
        dropdownToggle.text(selectedText);
        dropdownToggle.dropdown('hide');
    });

    $('#slideLeft').on('click', function () {
        $('.content-container-for-stories .d-flex').animate({ scrollLeft: '-=300' }, 400);
    });

    $('#slideRight').on('click', function () {
        $('.content-container-for-stories .d-flex').animate({ scrollLeft: '+=300' }, 400);
    });

    $('#dealsortBy').select2({
        width: '14rem',
        minimumResultsForSearch: Infinity,
        templateSelection: function (data) {
            if (!data.id) return 'Sort By:';
            return 'Sort By: ' + data.text;
        },
        templateResult: function (data) {
            return data.text;
        },
        dropdownCssClass: 'deals-select2-dropdown'
    });

    let scale = 1;

    $('#zoom-in').on('click', function () {
        scale += 0.1;
        $('#zoom-target').css('transform', 'scale(' + scale + ')');
    });

    $('#zoom-out').on('click', function () {
        scale -= 0.1;
        if (scale < 0.1) scale = 0.1;
        $('#zoom-target').css('transform', 'scale(' + scale + ')');
    });

    $('.select2-country').select2({
        placeholder: 'Select Country',
        allowClear: false,
        width: '100%',
        minimumResultsForSearch: 5
    });

    $('.check-in-datepicker').datepicker({
        dateFormat: 'dd M yy',
        minDate: 0,
        onSelect: function (selectedDate) {
            $('.check-out-datepicker').datepicker('option', 'minDate', selectedDate);
        }
    });

    $('.check-out-datepicker').datepicker({
        dateFormat: 'dd M yy',
        minDate: 0
    });

    $('.checkin')
        .on('focus', function () {
            $(this).attr('type', 'date');
        })
        .on('blur', function () {
            if (!$(this).val()) $(this).attr('type', 'text');
        });

    $('.checkout')
        .on('focus', function () {
            $(this).attr('type', 'date');
        })
        .on('blur', function () {
            if (!$(this).val()) $(this).attr('type', 'text');
        });

    $('.ua-menu li').on('click', function () {
        if ($(window).width() <= 575) {
            $('.user-account-sidebar').addClass('show');
            $('.ua-overlay').addClass('show');
        }
    });

    $('.ua-overlay').on('click', function () {
        $('.user-account-sidebar').removeClass('show');
        $(this).removeClass('show');
    });

    $(document).on('click', '.toggle-password', function () {
        let input = $($(this).attr('toggle'));
        let text = $(this).find('.toggle-text');

        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
            $(this).addClass('show-icons').removeClass('hide-icons');
            text.text('Show');
        } else {
            input.attr('type', 'password');
            $(this).addClass('hide-icons').removeClass('show-icons');
            text.text('Hide');
        }
    });

});