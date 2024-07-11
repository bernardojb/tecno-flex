
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
// --------------------------------------------------
$(document).ready(function()
{
$('#summernote').summernote({
        tabsize: 1,
        height: 300,
        focus: true 
      });
    
$('#summernote2').summernote({
        tabsize: 1,
        height: 300,
        focus: true 
      });
    
$('#summernote3').summernote({
        tabsize: 1,
        height: 300,
        focus: true 
      });
});