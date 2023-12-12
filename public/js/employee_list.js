$(function() {
    $('.toggle-pass').on('mousedown', function() {
      $(this).toggleClass('bi-eye bi-eye-slash');
      var input = $(this).prev('input');
      if (input.attr('type') == 'text') {
        input.attr('type','password');
      } else {
        input.attr('type','text');
      }
    })
});