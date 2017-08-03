<?php

  function tvn_block_get_image_slider() {
    return node_load_multiple(array(),array('type'=>'slider'));
  }
  function tvn_block_get_news_slider() {
    return node_load_multiple(array(),array('type'=>'news'));
  }
  

  function tvn_block_get_lastest_product() {
    $query = db_select('node', 'n');
    $query->leftJoin('field_data_field_product_image', 'i', 'i.revision_id = n.vid');
    $query->leftJoin('file_managed', 'f', 'f.fid = i.field_product_image_fid');
    $query->leftJoin('url_alias', 'u', "u.source = CONCAT('node/', n.nid)");
    $query->fields('n');
    $query->addField('f', 'uri', 'image');
    $query->addField('u', 'alias', 'link');
    $query->orderBy('n.created', 'DESC');
    $query->condition('n.type', 'product');
    $query->range(0, 1);
    return $query->execute();
  }