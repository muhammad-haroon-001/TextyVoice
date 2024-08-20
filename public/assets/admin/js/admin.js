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

    // Character count (excluding leading and trailing spaces)
    var charCount = text.trim().length;

    // Word count
    var wordCount = text.trim() ? text.trim().split(/\s+/).length : 0;

    // Extra spaces count (spaces between words)
    var spaceCount = text.length - text.trim().length + (text.split(/\s+/).length - 1);

    // Update the counts in the DOM
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
});
