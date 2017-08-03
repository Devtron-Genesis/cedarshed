<?php 
module_load_include('inc', 'node', 'node.pages');

$form = node_add('second_hand_item');
$output = drupal_render($form);

print $output;

?>