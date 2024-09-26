$(document).ready(() => {
    $("#form-element").on("submit", (event) => {
        event.preventDefault();
        const name = $("#name").val().trim();
        const email = $("#email").val().trim();
        const message = $("#message").val().trim();
        let isValid = !0;
        if (name.length === 0 || email.length === 0 || message.length === 0) {
            isValid = !1;
            showError("#fail", "Validation Error!", "All fields are required.");
        } else if (name.length < 3) {
            isValid = !1;
            showError("#fail", "Validation Error!", "The name must be at least 3 characters long.");
        } else if (email.length < 3) {
            isValid = !1;
            showError("#fail", "Validation Error!", "The email must be at least 3 characters long.");
        } else if (message.length < 3 || message.length > 500) {
            isValid = !1;
            showError("#fail", "Validation Error!", "The message must be between 3 and 500 characters long.");
        }
        if (!isValid) return;
        $.ajax({
            type: $("#form-element").attr("method"),
            url: $("#form-element").attr("action"),
            data: $("#form-element").serialize(),
            headers: { "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content") },
            success: (response) => {
                console.log(response);
                if (response.type === "success") {
                    $("input, textarea").val("");
                    $(".success_data").text("Success!");
                    $(".success_message").text(response.message);
                    $("#success").fadeIn("slow");
                    $("#contactus").prop("disabled", !0).css("cursor", "not-allowed");
                    setTimeout(() => {
                        $("#contactus").prop("disabled", !1).css("cursor", "pointer");
                        $("#success").fadeOut("slow");
                    }, 1000);
                } else if (response.type === "error") {
                    showError("#fail", "Validation Error!", response.message);
                }
            },
            error: () => {
                showError("#fail", "Error!", "Something went wrong");
            },
        });
    });
    const showError = (id, type, message) => {
        $(".fail_error").text(type);
        $(".fail_message").text(message);
        $(id).fadeIn("slow");
        setTimeout(() => {
            $(id).fadeOut("slow");
        }, 1000);
    };
});
