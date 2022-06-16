<?php

namespace Model;

class BattleResult implements \ArrayAccess
{

  private $winningShip;

  private $losingShip;

  private $usedJediPowers;

  public function __construct(AbstractShip $winningShip = null, AbstractShip $losingShip = null, $usedJediPowers)
  {
    $this->winningShip = $winningShip;
    $this->losingShip = $losingShip;
    $this->usedJediPowers = $usedJediPowers;
  }

  /**
   * @return AbstractShip|null
   */
  public function getWinningShip()
  {
    return $this->winningShip;
  }

  /**
   * @return AbstractShip|null
   */
  public function getLosingShip()
  {
    return $this->losingShip;
  }

  /**
   * @return boolean
   */
  public function whereJediPowersUsed()
  {
    return $this->usedJediPowers;
  }

  public function isThereAWinner()
  {
    return $this->getWinningShip() !== null;
  }

  // Treat your objects like an array
  public function offsetExists($offset)
  {
    return property_exists($this, $offset);
  }

  public function offsetGet($offset)
  {
    return $this->$offset;
  }

  public function offsetSet($offset, $value)
  {
    $this->$offset = $value;
  }

  public function offsetUnset($offset)
  {
    unset($this->$offset);
  }


}