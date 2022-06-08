<?php

class Ship extends AbstractShip
{
  private $jediFactor = 0;

  private $isReadyToFlight;

  public function __construct($shipName)
  {
    parent::__construct($shipName);

    $this->isReadyToFlight = 30 < mt_rand(1, 100);
  }

  /**
   * @return int
   */
  public function getJediFactor()
  {
    return $this->jediFactor;
  }

  /**
   * @param int $jediFactor
   */
  public function setJediFactor($jediFactor)
  {
    $this->jediFactor = $jediFactor;
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