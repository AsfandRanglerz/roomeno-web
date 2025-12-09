$(document).ready(function () {

    function toggleDollarButtons() {
        let width = $(window).width();

        if (width <= 991) {
            $('.get-dollor-link-collapse').show();   // mobile/tablet
            $('.header-get-dollar-anchor').hide();
        } else {
            $('.get-dollor-link-collapse').hide();   // desktop
            $('.header-get-dollar-anchor').show();
        }
    }

    // Page load par run
    toggleDollarButtons();

    // Resize par bhi run
    $(window).resize(function () {
        toggleDollarButtons();
    });

});
$(document).ready(function () {

    const video = $(".story-video").get(0); 
    const speakerBtn = $("#speakerToggle");
    const speakerIcon = $("#speakerToggle i");

    speakerBtn.on("click", function () {

        video.muted = !video.muted;

        if (video.muted) {
            speakerIcon.removeClass("bi-volume-up").addClass("bi-volume-mute");
        } else {
            speakerIcon.removeClass("bi-volume-mute").addClass("bi-volume-up");
        }

    });

});
$(document).ready(function () {

    $(".story-video-wrapper").on("mouseenter", function () {
        const video = $(this).find(".story-video").get(0);
        video.muted = false;
        video.play();
    });

    $(".story-video-wrapper").on("mouseleave", function () {
        const video = $(this).find(".story-video").get(0);
        video.pause();
        video.currentTime = 0; // start se
    });

});
$(document).ready(function() {

    // Generic dropdown item click handler
    $('.drop-down-item-for-languge, .dropdown-item').on('click', function(e) {
        e.preventDefault();  // prevent default button behavior

        // Get the text of the clicked item
        var selectedText = $(this).contents().get(0).nodeValue.trim();

        // Find the parent dropdown toggle button
        var dropdownToggle = $(this).closest('.dropdown').find('.dropdown-toggle');

        // Update the button text
        dropdownToggle.text(selectedText);

        // Optional: close the dropdown
        dropdownToggle.dropdown('hide');
    });

});
$(document).ready(function () {

    $('#slideLeft').on('click', function () {
        $('.content-container-for-stories .d-flex').animate({
            scrollLeft: "-=300"
        }, 400);
    });

    $('#slideRight').on('click', function () {
        $('.content-container-for-stories .d-flex').animate({
            scrollLeft: "+=300"
        }, 400);
    });

});
$(document).ready(function() {
    $('#dealsortBy').select2({
        width: '14rem', // fixed width
        minimumResultsForSearch: Infinity,
        templateSelection: function(data) {
            if (!data.id) return "Sort By:";
            return "Sort By: " + data.text;
        },
        templateResult: function(data) {
            return data.text;
        },
        dropdownCssClass: 'deals-select2-dropdown'
    });
});
$(document).ready(function(){
    let scale = 1;

    $('#zoom-in').click(function(){
        scale += 0.1; // increase scale
        $('#zoom-target').css('transform', 'scale(' + scale + ')');
    });

    $('#zoom-out').click(function(){
        scale -= 0.1; // decrease scale
        if(scale < 0.1) scale = 0.1; // minimum scale
        $('#zoom-target').css('transform', 'scale(' + scale + ')');
    });
});