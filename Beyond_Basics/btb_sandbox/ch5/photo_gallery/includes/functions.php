<?php 

function strip_zeros_from_date( $marked_string="" ) {
    // first remove the marked zeros
    $no_zeros = str_replace('*0', '', $marked_string);
    // then remove any remaining marks
    $cleaned_string = str_replace('*', '', $no_zeros);
    return $cleaned_string;
  }

  function redirect_to( $location = NULL ) {
    if ($location != NULL) {
      header("Location: {$location}");
      exit;
    }
  }

  function output_message($message="") {
    if (!empty($message)) { 
      return "<p class=\"message\">{$message}</p>";
    } else {
      return "";
    }
  }

  spl_autoload_register(function($class_name){

    $class_name = strtolower($class_name);
    $path = INCLUDES_PATH.DS."/{$class_name}.php";
    if(file_exists($path)){
        require_once($path);
    }
    else
    {
        die("The file {$class_name}.php could not be found.");
    }
  });

  function u($string="") {
    return urlencode($string);
  }
  
  function raw_u($string="") {
    return rawurlencode($string);
  }
  
  function h($string="") {
    return htmlspecialchars($string);
  }

  function include_layout_template($template=""){
    include(PUBLIC_PATH.DS.'layouts'.DS.$template);
  }
  

?>