$(document).ready(function () {
    const wordLimit = $('.wordCountLimit').text();
    const BASE_URL = window.location.origin;

    const TextToSpeech = (e) => {
        e.preventDefault();
        const Content = $('#content').val();
        const language = $('.SelectedLanguage').data('lang');
        var count = getWordCount(Content);
        if (count == 0) {
            showModal('limit_exceed.svg', 'No Content', 'Content Required');
            return;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });        

        const data = {
            content: Content,
            language: language,
        };

        $.ajax({
            url: BASE_URL + '/TextToSpeech',
            type: 'POST',
            data: data,
            success: function (response) {
                $('.clear').show();
                $('.wordCount').css("display", "flex");
                var error = $('.error');
                $('#content').val(response.content);
                var count = getWordCount(response.content);
                $(".wordCountSpan").text(count);
                $('#SubmitBtn').attr('disabled', false).css('cursor', 'pointer');

                if (count > wordLimit) {
                    $('#SubmitBtn').attr('disabled', true).css('cursor', 'not-allowed');
                    error.css('display', 'flex');
                    error.find('span').text("Word Limit Exceed");
                }
                hideModel();
            },
            error: function () {
                showModal('invalid_file.svg', 'Invalid File', 'File Format Not Supported');
            }
        });

    }
    // language selector
    $("#typeSelectors").click(function (e) {
        e.stopPropagation();
        $("#typeItem").slideToggle();
    });
    $("#typeItem li").click(function () {
        const selectedLanguage = $(this).text();
        const selectedLangCode = $(this).data('lang');
        $(".SelectedLanguage").text(selectedLanguage).attr('data-lang', selectedLangCode);
        $("#typeSelectedInput").val(selectedLanguage);
        $("#typeItem").slideUp();
    });
    $(document).click(function () {
        $("#typeItem").slideUp();
    });
    // File upload logic
    const allowedExtensions = ['txt', 'doc', 'docx'];
    $(".uploadData").click(function () {
        $("#fileUpload").click();
    });
    $("#fileUpload").change(function () {
        const file = this.files[0];
        if (file) {
            const fileName = file.name;
            const fileExtension = fileName.split('.').pop().toLowerCase();
            if (allowedExtensions.includes(fileExtension)) {
                const formData = new FormData();
                formData.append('file', file);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: BASE_URL + '/uploadFile',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        $('.clear').show();
                        $('.wordCount').css("display", "flex");
                        var error = $('.error');
                        $('#content').val(response.content);
                        var count = getWordCount(response.content);
                        $(".wordCountSpan").text(count);
                        $('#SubmitBtn').attr('disabled', false).css('cursor', 'pointer');

                        if (count > wordLimit) {
                            $('#SubmitBtn').attr('disabled', true).css('cursor', 'not-allowed');
                            error.css('display', 'flex');
                            error.find('span').text("Word Limit Exceed");
                        }
                        hideModel();
                    },
                    error: function () {
                        showModal('invalid_file.svg', 'Invalid File', 'File Format Not Supported');
                    }
                });
            } else {
                showModal('invalid_file.svg', 'Invalid File', 'File Format Not Supported');
            }
        }
    });
    $("#TextToSpeech").on('submit', TextToSpeech);

    $('.clear').click(function () {
        $('#content').val('');
        $('.wordCount').hide();
        $('.error').hide();
        $('.clear').hide();
    });

    $('#content').on('input', function () {
        $('.wordCount').css("display", "flex");
        $('.clear').show();
        var count = getWordCount($(this).val());
        $(".wordCountSpan").text(count);
        $('#SubmitBtn').attr('disabled', false).css('cursor', 'pointer');
        $('.error').hide();
        if (count == 0) {
            $('.error').hide();
            $('.clear').hide();
            $('.wordCount').hide();
        }
        if (count > wordLimit) {
            $('.error').css('display', 'flex');
            $('.error').find('span').text("Word Limit Exceed");
            $('#SubmitBtn').attr('disabled', true).css('cursor', 'not-allowed');
        }
    });

    const showModal = (image, title, content) => {
        $('.overlay').fadeIn();
        $('.Popup').fadeIn();
        var selector = $('.popup-content ');
        const source = BASE_URL + "/assets/frontend/image/" + image;
        selector.find('img').attr('src', source);
        selector.find('span').text(title);
        selector.find('p').text(content);
    }

    function getWordCount(content) {
        const wordCount = content.length > 0 ? content.split(/\s+/).length : 0;
        return wordCount;
    }
});

const hideModel = () => {
    $('.overlay').fadeOut();
    $('.Popup').fadeOut();
}
