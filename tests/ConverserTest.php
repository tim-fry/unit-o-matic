<?php

class ConverserTest extends PHPUnit_Framework_TestCase
{

  public function testHandlesNullCommand()
  {
    $command = null;
    $converser = new Converser();
    $this->assertEquals(
      "You'll need to ask for a conversion from something to something else. Try again...",
      $converser->convert($command));
  }

  public function testWrongFormat()
  {
    $converser = new Converser();
    $this->assertEquals(
      "Try asking 'what is...'",
      $converser->convert("what fish 1 cm in cm"));
  }

  public function testBasicConversion()
  {
    $converser = new Converser();
    $this->assertEquals(
      1,
      $converser->convert("what is 1 cm in cm"));
  }

  public function testAlternativeFormat1()
  {
    $converser = new Converser();
    $this->assertEquals(
      100,
      $converser->convert("what's 10 cm in mm"));
  }

  public function testAlternativeFormat2()
  {
    $converser = new Converser();
    $this->assertEquals(
      4.2,
      $converser->convert("42 mm in cm"),
      '', 0.1);
  }

}
