<?php

include_once 'Converter.php';

class Converser
{

  public function convert($command)
  {

//    $command = null;
    $from_quantity = null;
    $from_unit = null;
    $to_unit = null;

//    if (isset($_GET["from"])) {
//      $command = htmlspecialchars($_GET["from"]);
//    } elseif (isset($_POST['text'])) {
//      $command = htmlspecialchars($_POST["text"]);
//    }

    if (is_null($command)) {
      $msg = "You'll need to ask for a conversion from something to something else. Try again...";
      return $msg;
    }

    // Split Command by Space
    $command = explode("%20", str_replace(" ", "%20", $command));

    // Remove 'What's or What is
    if (strcmp(strtolower($command[0]), "what's") == 0 ||
      strcmp(strtolower($command[0]), "whats") == 0) {
        array_shift($command);
    } else if (strcmp(strtolower($command[0]), "what") == 0 &&
      strcmp(strtolower($command[1]), "is") == 0) {
        array_shift($command);
        array_shift($command);
    }

    if (count($command) != 4) {
      // TODO if length is 3 check for concatenated quantityunit
      $msg = "Try asking 'what is...'";
      return $msg;
    }

    // assume next word is input quantity
    $from_quantity = array_shift($command);

    // assume next word is input Unit
    $from_unit = array_shift($command);

    // remove 'in'
    if (strcmp(strtolower($command[0]), "in") == 0) {
      array_shift($command);
    }

    // assume next word is output Unit
    $to_unit = array_shift($command);

    // Create Converter
    $converter = new Converter();

    // Return Conversion
    return $converter->convert($from_unit, $from_quantity, $to_unit);

  }

}
