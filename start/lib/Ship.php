<?php

class Ship
{

  private $name;

  private $weaponPower = 0;

  private $jediFactor = 0;

  private $strength = 0;

  private $isReadyToFlight;

  /**
   * @param string $shipName
   */
  public function __construct($shipName)
  {
    $this->name = $shipName;
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
  public function getName()
  {
    return $this->name;
  }

  /**
   * @param string $name
   */
  public function setName($name)
  {
    $this->name = $name;
  }

  /**
   * @return int
   */
  public function getWeaponPower()
  {
    return $this->weaponPower;
  }

  /**
   * @param int $weaponPower
   */
  public function setWeaponPower($weaponPower)
  {
    $this->weaponPower = $weaponPower;
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
   * @return int
   */
  public function getStrength()
  {
    return $this->strength;
  }

  /**
   * @param int $strength
   * @throws Exception
   */
  public function setStrength($strength)
  {
    if (!is_numeric($strength)) {
      throw new Exception('Invalid strength passed ' . $strength);
    } else {
      $this->strength = $strength;
    }
  }

  public function getNameAndSpecs($useShortFormat = false)
  {
    if ($useShortFormat) {
      return sprintf(
        '%s: %s/%s/%s',
        $this->name,
        $this->weaponPower,
        $this->jediFactor,
        $this->strength
      );
    }
    else {
      return sprintf(
        '%s: w:%s, j:%s, s:%s',
        $this->name,
        $this->weaponPower,
        $this->jediFactor,
        $this->strength
      );
    }
  }

  public function doesGivenShipHaveMoreStrength($givenShip) {
    return $givenShip->strength > $this->strength;
  }
}