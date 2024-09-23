$(document).ready(() => {
    const BASE_URL = window.location.origin;
    $("a.features").click(() => {
        $("html, body").animate({ scrollTop: $("#features").offset().top }, 1000);
    });
    const $mobileDropdown = $(".mobile-dropdown");
    $("#dropdown_bar").click(function () {
        $mobileDropdown.toggleClass("d-block");
        $(this).attr("src", $mobileDropdown.hasClass("d-block") ? "assets/frontend/image/close_icon.svg" : "assets/frontend/image/dropdown_bar.svg");
    });
    $(".dropDownIcon").click(function () {
        const dropdownId = $(this).attr("id").split("_")[1];
        const dropdownContent = $(`#show_dropDownIcon_${dropdownId}`);
        const icon = $(`#icon_dropDownIcon_${dropdownId}`);
        const questionDiv = $(`#dropDownIcon_${dropdownId}`);
        $(".dropdown-content").not(dropdownContent).slideUp(200);
        $(".drop-icon img").not(icon).removeClass("rotate-icon");
        $(".question-div").not(questionDiv).removeClass("rounded-border");
        dropdownContent.slideToggle(200);
        icon.toggleClass("rotate-icon");
        questionDiv.toggleClass("rounded-border");
    });

    $('.language-dropdown li').on('click', function () {
        var selectedLang = $(this).data('lang');
        var selectedText = $(this).find('span').text();
        
        $('#selected-language').text(selectedText);
        var currentUrl = window.location.href;
        var slug = currentUrl.split('/').pop();
        if (!slug || slug === '') {
            slug = 'text-to-speech';
        }
        $.ajax({
            url: '/language-switch',
            method: 'POST',
            data: {
                lang: selectedLang,
                slug: slug,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.status === 'success') {
                    var lang = response.lang;
                    var slug = response.slug;
                    if(response.is_home == 0){
                        window.location.href = `${BASE_URL}/${lang}/${slug}`;   
                    }else{
                        if(slug == 'text-to-speech'){
                            window.location.href = `${BASE_URL}`;
                        }else if(slug == 'speech-to-text'){
                            window.location.href = `${BASE_URL}/speech-to-text`;
                        }
                    }
                }
            },
            error: function (error) {
                console.log('Language switch error:', error);
            }
        });
        $('.language-dropdown').hide();
    });
});