
// --------------------------------------------------
// Loader
// --------------------------------------------------
$(window).on('load', function()
{
  $('#page-spinner').fadeOut();
  $('#page-loader').delay(400).fadeOut('slow');
  $('body').delay(400).css({'overflow': 'visible'})
});
// --------------------------------------------------
// Navbar
// --------------------------------------------------
$(window).on('load resize',function()
{
  var $navbar = $('.fixed-top');
  var $body   = $('body');
  $body.css('padding-top', $navbar.outerHeight());
});
// --------------------------------------------------
// External links > New window
// --------------------------------------------------
$('.external').on('click', function (e)
{
  e.preventDefault();
  window.open($(this).attr("href"));
});
// --------------------------------------------------
// Summernote
// // --------------------------------------------------
// $(document).ready(function()
// {
//   $('.summernote').summernote({
//     disableDragAndDrop: true,
//     height:    300,
//     lang:      'pt-BR',
//     maxHeight: 600,
//     minHeight: 300,
//     toolbar:   [
//       ['style',  ['bold', 'italic', 'underline', 'clear']],
//       ['font',   ['strikethrough', 'superscript', 'subscript']],
//       ['para',   ['ul', 'ol', 'paragraph']],
//       ['height', ['height']],
//       ['insert', ['table', 'hr']],
//       ['misc',   ['codeview', 'undo', 'redo']]
//   ]
//   });
// });

// --------------------------------------------------
$(document).ready(function()
{
  $('.summernote').summernote({
    height:    300,
    lang:      'pt-BR',
    maxHeight: 600,
    minHeight: 300
  });
});