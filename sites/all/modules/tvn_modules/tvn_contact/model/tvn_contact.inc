<?php
  function insert_contact($name, $phone, $mail, $message) {
    $query = db_insert('tvn_contact');
    $query->fields(array('full_name', 'phone', 'mail', 'message', 'timespan'));
    $time_now = time();
    $query->values(array(
                        'full_name' => $name,
                        'phone' => $phone,
                        'mail' => $mail,
                        'message' => $message,
                        'timespan' => $time_now
                   ));
    return $query->execute();
  }

  function get_data_contact($id = 0, $header = array(), $type='') {
    $query = db_select('tvn_contact', 'c')->extend('PagerDefault')->extend('TableSort');
    $query->leftJoin('users', 'f', 'f.uid = c.first_read');
    $query->leftJoin('users', 'l', 'l.uid = c.last_read');
    $query->leftJoin('users', 'cl', 'cl.uid = c.close');
    $query->fields('c', array('id', 'full_name', 'phone', 'mail', 'message', 'close_time', 'timespan'));
    $query->addField('f', 'uid', 'f_uid');
    $query->addField('f', 'name', 'f_name');
    $query->addField('l', 'uid', 'l_uid');
    $query->addField('l', 'name', 'l_name');
    $query->addField('cl', 'uid', 'cl_uid');
    $query->addField('cl', 'name', 'cl_name');
    if ($id) {
      $query->condition('c.id', $id, '=');
    }
    else {
      if ($type == 'close') {
        $query->condition('c.close', 0, '<>');
      }
      if ($type == 'open') {
        $query->condition('c.close', 0);
      }
      $query->limit(20);
      $query->orderByHeader($header);
    }
    return $query->execute();
  }

  function update_contact($data) {
    global $user;
    $query = db_update('tvn_contact');
    $arr['last_read'] = $user->uid;
    if (!$data->f_uid) {
      $arr['first_read'] = $user->uid;
    }
    $query->fields($arr);
    $query->condition('id', $data->id, '=');
    $query->execute();
  }

  function close_contact($id) {
    global $user;
    $query = db_update('tvn_contact');
    $arr['close'] = $user->uid;
    $arr['close_time'] = time();
    $query->fields($arr);
    $query->condition('id', $id, '=');
    $query->execute();
  }

  function delete_contact($id) {
    $query = db_delete('tvn_contact');
    $query->condition('id', $id, '=');
    $query->execute();
  }