<?php

use PHPUnit\Framework\TestCase;

class UnitTest extends TestCase
{

  public function testAssignsVariablesCorrectly()
  {
    $unit = new Unit("cm", 1, "mm");
    $this->assertEquals("cm", $unit->name);
    $this->assertEquals(1, $unit->conversion);
    $this->assertEquals("mm", $unit->root);
  }

}
