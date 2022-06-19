<?php

namespace Model;

class Ship extends AbstractShip
{
  private $isReadyToFlight;

  use SettableJediFactorTrait;

  public function __construct($shipName)
  {
    parent::__construct($shipName);

    $this->isReadyToFlight = 30 < mt_rand(1, 100);
  }

  /**
   * @return boolean
   */
  public function isReadyToFlight() {
    return $this->isReadyToFlight;
  }

  /**
   * @return string
   */
  public function getType()
  {
    return 'Empire';
  }

}