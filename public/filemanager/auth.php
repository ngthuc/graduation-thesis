<?php
// Start session
session_start();

/*
STATUS CODE
* 200 -> Success
* 404 -> Failure
* 500 -> Error
*/

$base_url = 'http://spsimct594.tk';

if(isset($_GET['method'])) {
  if($_GET['method'] == 'get') {
    // code...
    if(!isset($_SESSION["subfolder"])) {
      echo json_encode(array("CODE"=>"404"));
    } else {
      echo json_encode(array("CODE"=>"200"));
    }
  } else if($_GET['method'] == 'post') {
    // code...
    if(isset($_POST['subfolder'])) {
      $_SESSION["subfolder"] = $_POST['subfolder'];
      echo json_encode(array("CODE"=>"200"));
    } else {
      echo json_encode(array("CODE"=>"500"));
    }
  } else if($_GET['method'] == 'delete') {
    // code...
    if(isset($_SESSION["subfolder"])) {
      unset($_SESSION["subfolder"]);
      echo json_encode(array("CODE"=>"200"));
    } else {
      echo json_encode(array("CODE"=>"500"));
    }
  } else {
    echo json_encode(array("CODE"=>"200","MESSAGE"=>"Access Denied!"));
  }
} else {
  echo json_encode(array("CODE"=>"200","MESSAGE"=>"Access Denied!"));
}
?>
