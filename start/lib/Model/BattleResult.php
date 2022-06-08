<?php

class BattleResult
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


}