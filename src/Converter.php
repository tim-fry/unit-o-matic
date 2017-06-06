<?php

include 'Unit.php';

class Converter
{

  private $units = array();

  function __construct()
  {
    $this->units[] = new Unit("mm", 1, "mm");
    $this->units[] = new Unit("cm", 10, "mm");
    $this->units[] = new Unit("m", 1000, "mm");
  }

  public function convert($inputunit, $inputquantity, $outputunit)
  {
    // TODO Error Check
    if (is_null($inputunit)) {
      return "Error: No input unit provided";
    }
    if (is_null($inputquantity)) {
      return "Error: No quantity provided";
    }
    if (is_null($outputunit)) {
      return "Error: No output unit provided";
    }
    // TODO Handle Quantity = 0;
    $inputobject = null;
    $outputobject = null;
    // Look for units
    foreach ($this->units as $u) {
      if (strcasecmp($u->name, $inputunit) == 0) {
        $inputobject = $u;
      }
      if (strcasecmp($u->name, $outputunit) == 0) {
        $outputobject = $u;
      }
    }
    if (is_null($inputobject)) {
      // TODO
      return "Error: No input unit provided";
    }
    if (is_null($outputobject)) {
      // TODO
      return "Error: No output unit provided";
    }
    // TODO Check units have common root unit
    if (strcasecmp($inputobject->root, $outputobject->root)) {
      // TODO proper Error
      return "I'm sorry, I have no idea!";
    } else {
      // TODO math
      $outputquantity = ($inputquantity * $inputobject->conversion) /
        $outputobject->conversion;
      return $outputquantity;
    }

  }

}
