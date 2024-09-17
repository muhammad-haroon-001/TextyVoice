$(document).ready(() => {
    const inputContentDiv = $(".input-content-div");
    const wordCountDisplay = $(".counter .word_count");
    const clearButton = $(".clear");
    const essaySubmitButton = $("#EssaySubmit");
    const errorDiv = $(".error");
    const editableDiv = $("#editableDiv");
    const allow_word = $(".allowed_word").val();
    const updateButtonState = () => {
        const textareaContent = inputContentDiv.val();
        const wordCount = textareaContent
            .trim()
            .split(/\s+/)
            .filter((word) => word.length > 0).length;
        wordCountDisplay.text(wordCount);
        if (wordCount === 0) {
            setButtonState(!1, "not-allowed");
            clearButton.hide();
            resetInputStyles();
            hideError();
        } else if (wordCount > allow_word) {
            showError(limit_exceed);
        } else {
            hideError();
            setButtonState(!0, "pointer");
            clearButton.show();
        }
    };
    const setButtonState = (isEnabled, cursorStyle) => {
        essaySubmitButton.prop("disabled", !isEnabled).css("cursor", cursorStyle);
    };
    const resetInputStyles = () => {
        editableDiv.css("border", "1px solid rgb(229, 229, 229)");
    };
    const showError = (message) => {
        setButtonState(!1, "not-allowed");
        errorDiv.css("display", "flex");
        clearButton.hide();
        errorDiv.find("span").text(message);
        editableDiv.css("border", "1px solid red");
    };
    const hideError = () => {
        errorDiv.hide();
        resetInputStyles();
    };
    clearButton.on("click", () => {
        inputContentDiv.val("");
        updateButtonState();
    });
    $("#typeItem li").on("click", function () {
        const selectedValue = $(this).text();
        $("#typeSelectors").text("");
        $("#typeSelectors").append(`
    <span>${selectedValue}</span>
    <div class="g-1">
        <img src="assets/image/select_icon.svg" alt="select_icon">
        <img src="assets/image/arrows_down.svg" alt="arrows">
    </div>
`);
        $("#typeSelectedInput").val(selectedValue);
    });
    $("#longItem li").on("click", function () {
        const selectedValue = $(this).text();
        $("#longSelectors").text("");
        $("#longSelectors").append(`
    <span>${selectedValue}</span>
    <div class="g-1">
        <img src="assets/image/select_icon.svg" alt="select_icon">
        <img src="assets/image/arrows_down.svg" alt="arrows">
    </div>
`);
        $("#longSelected").val(selectedValue);
    });
    inputContentDiv.on("input", updateButtonState);
    updateButtonState();
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