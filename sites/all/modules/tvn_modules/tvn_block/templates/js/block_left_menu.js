jQuery(function(){
  jQuery('#block-tz-block-left-menu li.expanded a').attr('href', 'javascript:;');
  jQuery('#block-tz-block-left-menu li.expanded').addClass('collapsed').removeClass('expanded');
  jQuery('#block-tz-block-left-menu li').click(function(){
    if (jQuery(this).hasClass('expanded')) {
      jQuery(this).addClass('collapsed').removeClass('expanded');
      jQuery(this).children('ul').animate({
        "max-height" : 0
      });
    }
    else if (jQuery(this).hasClass('collapsed')) {
      jQuery(this).addClass('expanded').removeClass('collapsed');
      jQuery(this).children('ul').animate({
        "max-height" : 300
      });
    }
  });
});