<?php $nid = $output;?>
<?php $node = node_load($nid);
echo $node->field_popover_embed['und'][0]['value'];

?>