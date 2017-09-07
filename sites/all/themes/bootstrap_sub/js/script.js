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
    console.log('Document Ready');
  });
  $(document).ajaxComplete(function(e) {
    $('.field-name-commerce-price .commerce-price-savings-formatter-list .price-label').text('Price Starting at:');
    $('.field-name-commerce-price .commerce-price-savings-formatter-price .price-label').text('Price Online Starting at:');
    $('select[id*="edit-attributes-field-product-colour"]').parent().append("<span class='selected-colour'></span>");
    $('.form-item-attributes-field-product-colour .selected-colour').css('background', $('select[id*="edit-attributes-field-product-colour"] option:selected').val());
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

