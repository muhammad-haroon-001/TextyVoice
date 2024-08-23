$(document).ready(function () {
  $('#toolName').on('input', function () {
    var toolName = $(this).val();
    var toolSlug = toolName
      .toLowerCase()
      .replace(/ /g, '-')
      .replace(/[^\w-]+/g, '');
    $('#toolSlug').val(toolSlug);
  });

  $('#metaTitle').on('input', function () {
    var text = $(this).val();
    var charCount = text.trim().length;
    var wordCount = text.trim() ? text.trim().split(/\s+/).length : 0;
    var spaceCount = text.length - text.trim().length + (text.split(/\s+/).length - 1);
    $('.char-count-num').text(charCount);
    $('.word-count-num').text(wordCount);
    $('.char-extraspaces-num').text(spaceCount);
  });

  $('#metaDescription').on('input', function () {
    var text = $(this).val();
    var charCount = text.trim().length;
    var wordCount = text.trim() ? text.trim().split(/\s+/).length : 0;
    var spaceCount = text.length - text.trim().length + (text.split(/\s+/).length - 1);
    $('.desc-char-count-num').text(charCount);
    $('.desc-word-count-num').text(wordCount);
    $('.desc-char-extraspaces-num').text(spaceCount);
  });

  $('.js-tool-parent').on('change', function () {
    let val = parseInt($(this).val());
    if (val == 0) {
      $('.js-span-toggle-content').show();
    } else {
      $('.js-span-toggle-content').hide();
    }
  });

  $('#addMore').on('click', function (e) {
    e.preventDefault();
    var selectedValue = $('#add_more_type').val();
    var html =
      `<div class="row"><input type="hidden" value="` +
      selectedValue +
      `" name="contentType[]">
          <div class="col-md-3 mb-3">
              <input type="text" name="contentKey[]" class="form-control" placeholder="Key" value="">
          </div>
          <div class="col-md-9 mb-3">`;
    if (selectedValue == 'inputField') {
      html += `<input type="text" name="contentValue[]" class="form-control" placeholder="Value" value="">`;
    } else if (selectedValue == 'textarea') {
      html += `<textarea rows="3" name="contentValue[]" class="form-control" placeholder="Content" value=""></textarea>`;
    } else {
      html += `<input class="form-control tool_textarea" name="contentValue[]" />`;
    }
    html += `</div></div>`;
    $('.tool-content').append(html);
    init_tinymce();
  });


 
});
