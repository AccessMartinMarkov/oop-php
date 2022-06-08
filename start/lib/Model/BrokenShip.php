<?php

class BrokenShip extends AbstractShip
{
  public function getJediFactor()
  {
    return 0;
  }
  public function getType()
  {
    return 'Broken';
  }

  public function isReadyToFlight()
  {
    return false;
  }
}