<?php

class ConverterTest extends PHPUnit_Framework_TestCase
{

  public function testHandlesNullInputUnit()
  {
    $inputUnit = null;
    $converter = new Converter();
    $this->assertEquals(
      "Error: No input unit provided",
      $converter->convert($inputUnit, 1, "b"));
  }

  public function testHandlesNullInputQuantity()
  {
    $inputQuantity = null;
    $converter = new Converter();
    $this->assertEquals(
      "Error: No quantity provided",
      $converter->convert("a", $inputQuantity, "b"));
  }

  public function testHandlesNullOutputUnit()
  {
    $outputUnit = null;
    $converter = new Converter();
    $this->assertEquals(
      "Error: No output unit provided",
      $converter->convert("a", 1, $outputUnit));
  }

  public function testConvertsToItself()
  {
    $converter = new Converter();
    $this->assertEquals(1, $converter->convert("mm", 1, "mm"));
  }

  public function testConvertsDownwards()
  {
    $converter = new Converter();
    $this->assertEquals(10, $converter->convert("cm", 1, "mm"));
  }

  public function testConvertsUpwards()
  {
    $converter = new Converter();
    $this->assertEquals(0.1, $converter->convert("mm", 1, "cm"));
  }

}
