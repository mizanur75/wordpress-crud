<?php
add_action('wp_ajax_wqnew_entry', 'wqnew_entry_callback_function');
add_action('wp_ajax_nopriv_wqnew_entry', 'wqnew_entry_callback_function');

function wqnew_entry_callback_function() {
  global $wpdb;
  $wpdb->get_row( "SELECT * FROM `wp_crud` WHERE `name` = '".$_POST['wname']."' AND `phone` = '".$_POST['wphone']."' AND `email` = '".$_POST['wemail']."' ORDER BY `id` DESC" );
  if($wpdb->num_rows < 1) {
    $wpdb->insert("wp_crud", array(
      "name" => $_POST['wname'],
      "phone" => $_POST['wphone'],
      "email" => $_POST['wemail'],
      "created_at" => time(),
      "updated_at" => time()
    ));

    $response = array('message'=>'Data Has Inserted Successfully', 'rescode'=>200);
  } else {
    $response = array('message'=>'Data Has Already Exist', 'rescode'=>404);
  }
  echo json_encode($response);
  exit();
  wp_die();
}



add_action('wp_ajax_wqedit_entry', 'wqedit_entry_callback_function');
add_action('wp_ajax_nopriv_wqedit_entry', 'wqedit_entry_callback_function');

function wqedit_entry_callback_function() {
  global $wpdb;
  $wpdb->get_row( "SELECT * FROM `wp_crud` WHERE `name` = '".$_POST['wname']."' AND `phone` = '".$_POST['wphone']."' AND `email` = '".$_POST['wemail']."' AND `id`!='".$_POST['wqentryid']."' ORDER BY `id` DESC" );
  if($wpdb->num_rows < 1) {
    $wpdb->update( "wp_crud", array(
      "name" => $_POST['wname'],
      "phone" => $_POST['wphone'],
      "email" => $_POST['wemail'],
      "updated_at" => time()
    ), array('id' => $_POST['wqentryid']) );

    $response = array('message'=>'Data Has Updated Successfully', 'rescode'=>200);
  } else {
    $response = array('message'=>'Data Has Already Exist', 'rescode'=>404);
  }
  echo json_encode($response);
  exit();
  wp_die();
}
