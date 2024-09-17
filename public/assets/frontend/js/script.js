$(document).ready(() => {
    const $body = $("body");
    $("a.features").click(() => {
        $("html, body").animate({ scrollTop: $("#features").offset().top }, 1000);
    });
    const $editableDiv = $("#editableDiv");
    $editableDiv
        .on("input", function () {
            $(this).attr("data-placeholder", $(this).text().trim().length ? "" : $(this).data("placeholder"));
        })
        .trigger("input");
    const toggleDropdown = ($item, $otherItem, $icon, $otherIcon) => {
        $item.slideToggle();
        $otherItem.slideUp();
        $icon.toggleClass("rotate-180");
        $otherIcon.removeClass("rotate-180");
    };
    const handleDropdownClick = ($selector, $item, $otherItem, $icon, $otherIcon) => {
        $selector.click((e) => {
            e.stopPropagation();
            toggleDropdown($item, $otherItem, $icon, $otherIcon);
        });
        $item.find("li").click(function () {
            const selectedOption = $(this).text();
            $selector.text(selectedOption);
            $selector.siblings(".selected-value").text(selectedOption);
            $item.slideUp();
            $icon.removeClass("rotate-180");
        });
    };
    const $typeSelectors = $("#typeSelectors");
    const $longSelectors = $("#longSelectors");
    const $typeItem = $("#typeItem");
    const $longItem = $("#longItem");
    handleDropdownClick($typeSelectors, $typeItem, $longItem, $typeSelectors.find(".g-1 img:last-child"), $longSelectors.find(".g-1 img:last-child"));
    handleDropdownClick($longSelectors, $longItem, $typeItem, $longSelectors.find(".g-1 img:last-child"), $typeSelectors.find(".g-1 img:last-child"));
    $(document).click(() => {
        $typeItem.add($longItem).slideUp();
        $(".g-1 img:last-child").removeClass("rotate-180");
    });
    const $mobileDropdown = $(".mobile-dropdown");
    $("#dropdown_bar").click(function () {
        $mobileDropdown.toggleClass("d-block");
        $(this).attr("src", $mobileDropdown.hasClass("d-block") ? "assets/image/close_icon.svg" : "assets/image/dropdown_bar.svg");
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