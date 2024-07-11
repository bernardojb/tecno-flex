
// --------------------------------------------------
// Load combobox
// --------------------------------------------------
$(document).ready(function()
{
  $('#cat_id').on('change',function()
  {
    var catID = $(this).val();
    if(catID)
    {
      $.ajax({
        type : 'POST',
        url  : 'combobox',
        data : 'cat_id='+catID,
        success:function(html){$('#subcat_id').html(html);}
        });
    }
    else
    {
      $('#subcat_id').html('<option value="">Selecione a Categoria primeiro</option>');
    }
  });
});