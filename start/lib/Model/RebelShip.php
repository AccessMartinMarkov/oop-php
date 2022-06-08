<?php

class RebelShip extends AbstractShip
{
  /**
   * @return string
   */
  public function getType()
  {
    return 'Rebel';
  }

  /**
   * @return boolean
   */
  public function isReadyToFlight() {
    return true;
  }

  public function getNameAndSpecs($useShortFormat = false)
  {
    $value = parent::getNameAndSpecs($useShortFormat);
    $value .= ' (Rebel)';

    return $value;
  }

  /**
   * @return int
   */
  public function getJediFactor()
  {
    return rand(10, 30);
  }
}