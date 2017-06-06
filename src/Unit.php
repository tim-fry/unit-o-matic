<?php

class Unit
{

  public $name;
  public $conversion;
  public $root;

  function __construct($name, $conversion, $root)
  {
    $this->name = $name;
    $this->conversion = $conversion;
    $this->root = $root;
  }

}
