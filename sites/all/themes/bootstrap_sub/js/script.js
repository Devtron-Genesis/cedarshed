(function($) {
  $(document).mouseup(function(e) {
    console.log('mouseup');
  });
  $(window).load(function(e) {
    console.log('Load Completed');
  });
  $(document).ready(function() {
    $('.field-name-commerce-price .commerce-price-savings-formatter-list .price-label').text('Price Starting at:');
    $('.field-name-commerce-price .commerce-price-savings-formatter-price .price-label').text('Price Online Starting at:');
    $('select[id*="edit-attributes-field-product-colour"]').parent().append("<span class='selected-colour'></span>");
    $('.form-item-attributes-field-product-colour .selected-colour').css('background', $('select[id*="edit-attributes-field-product-colour"] option:selected').val());
    $(".col-md-2.col-sm-4.col-xs-6.box").matchHeight();
    $(".view-taxonomy-term .views-row .views-field-body").matchHeight();
    $(".field-name-field-gallery-image .field-item img").matchHeight();
    if($('div.form-item[class*="window"]').length != 0){
      $('<div class="product-windows"><h3>Additional Windows:</h3><select name="windows-seletctor" class="form-control form-select ajax-processed"><option selected="selected">No Additional Windows</option></select></div>').insertBefore('.commerce-add-to-cart .shipping');
    }
    $('div.form-item[class*="window"]').each(function(e){
      $(this).hide();
      var text = $(this).find('.commerce-product-title').text().replace('Title:', '').trim() + ' - ' + $(this).find('.field-name-commerce-price').text().trim();
      var value = $(this).find('input').attr('name');
      $('select[name="windows-seletctor"]').append('<option value="'+value+'">'+text+'</option>');
      if($(this).find('input').is(':checked')) {
        $('select[name="windows-seletctor"]').val($(this).find('input').attr('name'));
      }
    });
    $('select[name="windows-seletctor"]').change(function(e){
      var selected = $(this).val();
      $('div.form-item[class*="window"] input').each(function(e){
        if($(this).attr('name') == selected) {
          $(this).prop('checked', true);
        } else {
          $(this).prop('checked', false);
        }
      });
    });
    console.log('Document Ready');
  });
  $(document).ajaxComplete(function(e) {
    $('.field-name-commerce-price .commerce-price-savings-formatter-list .price-label').text('Price Starting at:');
    $('.field-name-commerce-price .commerce-price-savings-formatter-price .price-label').text('Price Online Starting at:');
    $('select[id*="edit-attributes-field-product-colour"]').parent().append("<span class='selected-colour'></span>");
    $('.form-item-attributes-field-product-colour .selected-colour').css('background', $('select[id*="edit-attributes-field-product-colour"] option:selected').val());

    if($('div.form-item[class*="window"]').length != 0){
      $('<div class="product-windows"><h3>Windows:</h3><select name="windows-seletctor"><option selected="selected">No Additional Windows</option></select></div>').insertBefore('.commerce-add-to-cart .shipping');
    }
    $('div.form-item[class*="window"]').each(function(e){
      $(this).hide();
      var text = $(this).find('.commerce-product-title').text().replace('Title:', '').trim() + ' - ' + $(this).find('.field-name-commerce-price').text().trim();
      var value = $(this).find('input').attr('name');
      $('select[name="windows-seletctor"]').append('<option value="'+value+'">'+text+'</option>');
      if($(this).find('input').is(':checked')) {
        $('select[name="windows-seletctor"]').val($(this).find('input').attr('name'));
      }
    });
    $('select[name="windows-seletctor"]').change(function(e){
      var selected = $(this).val();
      $('div.form-item[class*="window"] input').each(function(e){
        if($(this).attr('name') == selected) {
          $(this).prop('checked', true);
        } else {
          $(this).prop('checked', false);
        }
      });
    });
    console.log('Ajax Completed');
  });
  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
    sURLVariables = sPageURL.split('&'),
    sParameterName,
    i;
    for (i = 0; i < sURLVariables.length; i++) {
      sParameterName = sURLVariables[i].split('=');
      if (sParameterName[0] === sParam) {
        return sParameterName[1] === undefined ? true : sParameterName[1];
      }
    }
  };
})(jQuery);

