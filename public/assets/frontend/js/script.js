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
});