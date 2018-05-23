<?php

/**
 * @file
 * template.php
 */
  drupal_add_js(drupal_get_path('theme', 'bootstrap_sub').'/js/main.js');
  
  function bootstrap_sub_preprocess_page(&$variables) {
  // Add information about the number of sidebars.
  if (!empty($variables['page']['sidebar_first']) && !empty($variables['page']['sidebar_second'])) {
    $variables['content_column_class'] = ' class="col-sm-4"';
  }
  elseif (!empty($variables['page']['sidebar_first']) || !empty($variables['page']['sidebar_second'])) {
    $variables['content_column_class'] = ' class="col-sm-8"';
  }
  else {
    $variables['content_column_class'] = ' class="col-sm-12"';
  }
}
function bootstrap_sub_form_alter(&$form, &$form_state, $form_id) {
	if($form_id =='commerce_checkout_form_checkout'){
		//$form['customer_profile_shipping']['commerce_customer_address']['und'][0]['phone_block']['phone_number']['phone_number']['#require'] = 'true';
	}
	
}
