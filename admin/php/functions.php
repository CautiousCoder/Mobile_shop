<?php
  //mysql database connection function

  function textBoxValue($con, $value){
    $text = mysqli_real_escape_string($con,trim($_POST[$value]));
    if (empty($text)) {
        return false;
    } else {
        return $text;
    }
  }

  function notification($styleClass, $msg){
    $ele = "<h6 class='$styleClass'>$msg</h6>";
    echo $ele;
  }
