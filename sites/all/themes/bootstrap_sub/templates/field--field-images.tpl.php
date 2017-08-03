<?php

/**
 * @file field.tpl.php
 * Default template implementation to display the value of a field.
 *
 * This file is not used and is here as a starting point for customization only.
 * @see theme_field()
 *
 * Available variables:
 * - $items: An array of field values. Use render() to output them.
 * - $label: The item label.
 * - $label_hidden: Whether the label display is set to 'hidden'.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - field: The current template type, i.e., "theming hook".
 *   - field-name-[field_name]: The current field name. For example, if the
 *     field name is "field_description" it would result in
 *     "field-name-field-description".
 *   - field-type-[field_type]: The current field type. For example, if the
 *     field type is "text" it would result in "field-type-text".
 *   - field-label-[label_display]: The current label position. For example, if
 *     the label position is "above" it would result in "field-label-above".
 *
 * Other variables:
 * - $element['#object']: The entity to which the field is attached.
 * - $element['#view_mode']: View mode, e.g. 'full', 'teaser'...
 * - $element['#field_name']: The field name.
 * - $element['#field_type']: The field type.
 * - $element['#field_language']: The field language.
 * - $element['#field_translatable']: Whether the field is translatable or not.
 * - $element['#label_display']: Position of label display, inline, above, or
 *   hidden.
 * - $field_name_css: The css-compatible field name.
 * - $field_type_css: The css-compatible field type.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess_field()
 * @see theme_field()
 *
 * @ingroup themeable
 */
?>
<!--
THIS FILE IS NOT USED AND IS HERE AS A STARTING POINT FOR CUSTOMIZATION ONLY.
See http://api.drupal.org/api/function/theme_field/7 for details.
After copying this file to your theme's folder and customizing it, remove this
HTML comment.
-->
<div class="<?php print $classes; ?>"<?php print $attributes; ?>>
	<div class="bigimage">
	<?php $count= 0; foreach ($items as $delta => $item): ?>
		<?php if($count == 0){?> 
			<div class="field-item <?php print $delta % 2 ? 'odd' : 'even'; ?>"<?php print $item_attributes[$delta]; ?>><?php print render($item); ?></div>
		<?php }?>
    <?php $count++;endforeach; ?>
	</div>
 
  <?php 
  	$itemsCarol = array();
  	$haveSlide = 0;
  	$count= 0;
  	foreach ($items as $delta => $item):
  		
  	
  		$item_name = $item['#item']['filename'];
  		$url = image_style_url('product_thumb',$item['#item']['uri']);
  		$urlbig = image_style_url('product_image',$item['#item']['uri']);
  		$image = '<img class="img-responsive" src="'.$url.'" typeof="foaf:Image">';
  		$bigimage = '<img class="img-responsive" src="'.$urlbig.'" typeof="foaf:Image">';
  		if($item_name != 'no_photo_icon.png'){
  			$haveSlide = 1;
  			//if($count > 0){
  				$itemsCarol[] = '<div class="getHtmlThis" big="'.$count.'">'.$image.'</div><div class="bigImageget" get="'.$count.'">'.$bigimage.'</div>';
  			//}
  		}
  		
  		$count ++;
   ?>
  <?php endforeach;?>
   <?php
   if($haveSlide > 0 ){
  	$options = array (
	  'wrap' => 'last',
	  'visible' => 3,
	  'scroll' => 1, 
	  'rtl' => true,
	);
	$itemsCarol = array_reverse($itemsCarol);
	
	if(count($itemsCarol)>1){
		print theme('jcarousel', array('items' => $itemsCarol, 'options' => $options));
	}
}
   ?>
</div>
<script type="text/javascript">
	(jQuery)(function(){
		(jQuery)('.getHtmlThis').click(function(){
			(jQuery)('.getHtmlThis').removeClass('active');
			(jQuery)(this).addClass('active');
			var html = '';
			var get = (jQuery)(this).attr('big');
			(jQuery)('.bigImageget').each(function(){
				if((jQuery)(this).attr('get') == get){
					html = (jQuery)(this).html();
				}
				
			});
			
			(jQuery)('.bigimage').html(html);
		});
		(jQuery)('.jcarousel-item-1 .getHtmlThis').trigger('click');
		
	});
</script>

 
